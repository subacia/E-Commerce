<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use App\Models\product;
use App\Models\cart_items;
use Redirect;
use Session;
use DB;
use App\Models\order_details;
use App\Models\ordered_items;
use Illuminate\Support\Facades\Auth;
use App\Models\category;


class LogicController extends Controller
{
    public function signup_view(Request $Request){
        return view('signup');
    }

    

    public function save_user_details(Request $Request){

        if($Request->submit == 'REGISTER'){

            $mble_num_check = user::select('mobile_num')->where(['mobile_num' => $Request->mobile_num])->count();

            if($mble_num_check == 0){
                user::insert([
                    'name'=> $Request->name,
                    'mobile_num' => $Request->mobile_num,
                    'password' => $Request->password,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]);
        
                session(['saved_user_details' => 'Registered successfully!']);

                return Redirect::Back();
                
            }else{

                session(['mble_num_exists' => 'This mobile number already exists.']);

                return redirect()->back()->withInput();
            }

            
        }else{
            return redirect()->route('product.listing.view');
        }

        
    }

    public function login_view(Request $Request){

        return view('login_view');

    }
    
    public function login_check(Request $Request){

        if($Request->submit == 'Login'){

            $user_details_match = user::select('*')
            ->where(['mobile_num' => $Request->mobile_num])
            ->where(['password' => $Request->password])
            ->first();

            if(!empty($user_details_match )){
                
                session(['user_id' => $user_details_match->id, 'user_name' => $user_details_match->name ]);

                return redirect()->route('product.listing.view');

            }else{

                session(['login_invalid' => 'Mobile number or password is incorrect']);

                return Redirect::Back();
            }
        }else{
            return redirect()->route('product.listing.view');
        }

    }

    public function products_listing_view(Request $Request){

        $user_id = Session::get('user_id');

        $category_list = category::select('*')->where('active_status', '=', '1')->get();

        $all_products = product::select('*')->where('active','=', '1')->get();

        $all_prods_in_cart = cart_items::select('prod_id')->where('user_id', '=', $user_id)->where('active_status', '=', '1')->get();

        $prod_id_array = array();

        foreach($all_prods_in_cart as $each_item_cart){
            $prod_id_array[] = $each_item_cart->prod_id;
        }
        
        return view('product_listing', ['all_products' => $all_products, 'prod_id_array' => $prod_id_array, 'category_list' => $category_list]);
    }

    public function category_wise_products(Request $Request){

        $c_id =$Request->c_id;

        $user_id = Session::get('user_id');

        $category_list = category::select('*')->where('active_status', '=', '1')->get();

        $all_products = product::select('*')->where('active','=', '1')->where('c_id','=', $c_id)->get();

        $all_prods_in_cart = cart_items::select('prod_id')->where('user_id', '=', $user_id)->where('active_status', '=', '1')->get();

        $prod_id_array = array();

        foreach($all_prods_in_cart as $each_item_cart){
            $prod_id_array[] = $each_item_cart->prod_id;
        }
        
        return view('product_listing', ['all_products' => $all_products, 'prod_id_array' => $prod_id_array, 'category_list' => $category_list]);
    }

    public function products_view(Request $Request){
        return view('product');
    }

    public function add_to_cart(Request $Request){

        $user_id = Session::get('user_id');

        if($user_id != ''){

            if($Request->add_to_cart == 'adding'){

                cart_items::insert([
                    'prod_id' => $Request->	prod_id,
                    'quantity' => 1,
                    'total_price' => $Request->price_val,
                    'user_id' => $Request->user_id,
                    'active_status' => '1',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]);

                session(['item_in_cart' => 'Item added to cart successfully']);

                return Redirect::Back();

            }else{
                return redirect()->route('product.listing.view');
            }
        }else{
            session(['login_alert' => 'Please login and add items to cart']);
            return redirect()->route('login.view');
        }
    }

    public function cart_items_listing(Request $Request){

        $user_id = Session::get('user_id');

        $all_prods_in_cart = cart_items::select('cart_items.*','product.prod_name', 'product.price')
        ->join('product', 'product.prod_id', '=', 'cart_items.prod_id')
        ->where('user_id', '=', $user_id)
        ->where('active_status', '=', '1')
        ->get();

        return view('cart_items_list',['all_prods_in_cart' => $all_prods_in_cart] );
    }

    public function checkout_view(Request $Request){

        $user_id = Session::get('user_id');

        $cart_items_check = cart_items::select('*')->where('user_id', '=', $user_id)->where('active_status', '=', '1')->where('quantity', '!=', 0)->count();

        if($cart_items_check > 0){
            return view('checkout_view');
        }else{
            return redirect()->route('product.listing.view');
        }
        

    }

    public function remove_an_cart_item(Request $Request){

        $c_i_id = $Request->c_i_id;

        $item_remove= cart_items::where('c_i_id', '=', $c_i_id)->update(['active_status' => '0']);

        session(['item_removed' => 'Item removed']);

        return Redirect::Back();
    }

    public function update_cart_item_qty(Request $Request){

        $c_i_id_val = $Request->c_i_id_val;
        $qty = $Request->qty;
        $price_val = $Request->price_val;

        $user_id = $Request->user_id;

        $total_price = $qty * $price_val;

        cart_items::where('c_i_id', '=', $c_i_id_val)->update(['quantity' => $qty, 'total_price' => $total_price]);

        $grand_total_q = DB::select("SELECT SUM(total_price) as grand_total FROM cart_items WHERE user_id='$user_id' AND active_status='1' ");

        $grand_total =  $grand_total_q[0]->grand_total;

        $response = array(
            'status' => 'success',
            'qty' => $qty,
            'total_price' => $total_price,
            'c_i_id_val' => $c_i_id_val,
            'grand_total' => $grand_total
        );
        return response()->json($response); 
    }

    public function place_order(Request $Request){

        $cart_items_check = cart_items::select('*')->where('user_id', '=', $Request->user_id)->where('active_status', '=', '1')->where('quantity', '!=', 0)->count();

        if($cart_items_check > 0){

            $data_avail = order_details::select('order_id')->orderby('o_d_id', 'DESC')->first();

            if($data_avail == ''){
                $order_id = 'OR_1000';
            }else{

                $last_order_id = $data_avail->order_id;

                $last_order_id_exp = explode('_', $last_order_id);

                $order_id_val = $last_order_id_exp[1];

                $order_id = 'OR_' . ($order_id_val + 1);

            }

            $user_id = $Request->user_id;

            $grand_total_q = DB::select("SELECT SUM(total_price) as grand_total FROM cart_items WHERE user_id='$user_id' AND active_status='1' ");

            $grand_total =  $grand_total_q[0]->grand_total;

            order_details::insert([
                'order_id' => $order_id,
                'user_id' => $Request->user_id,
                'paid_amount' => $grand_total,
                'payment_mode' => $Request->payment_mode,
                'name' => $Request->name,
                'mble_num' => $Request->mobile_num,
                'address' => $Request->address,
                'created_at' => date('Y-m-d H:i:s')
            ]);

            $cart_items = cart_items::select('*')->where('user_id', '=', $Request->user_id)->where('active_status', '=', '1')->where('quantity', '!=', 0)->get();

            foreach($cart_items as $each_item){
                ordered_items::insert([
                    'order_id' => $order_id,
                    'prod_id' => $each_item->prod_id,
                    'quantity' => $each_item->quantity,
                    'this_item_price' => $each_item->total_price,
                    'created_at' => date('Y-m-d H:i:s')
                ]);

                cart_items::where('c_i_id', '=', $each_item->c_i_id)->update(['active_status' => '0']);
            }

            session(['order_success' => 'Your order has been placed successfully']);
            return view('order_success_view', ['order_id' => $order_id, 'name'=> $Request->name, 'mble_num' => $Request->mobile_num, 'address' =>$Request->address  ]);
        }else{
            return redirect()->route('product.listing.view');
        }
    }

    public function logout(Request $Request){

        Auth::logout();

        session(['user_id' => '', 'user_name' => '']);

        return redirect()->route('product.listing.view');

    }
}
