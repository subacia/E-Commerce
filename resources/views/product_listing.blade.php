@extends('layouts')
    @section('content')
        
        <div class="container product-listing">

            <div class="col-lg-12 col-md-12">
                @if(Session::has('item_in_cart')) 
                    <div id="messages" class="alert alert-success alert-dismissible" role="alert">
                        
                        <div id="messages_content" >{{ Session::get('item_in_cart') }}</div>
                        @php 
                            Session::forget('item_in_cart'); 
                        @endphp
                    </div>
                @endif 
            </div>

            <div class="container">
                <div class="row" style="margin-top: 33px;margin-bottom: 21px;">
                    @foreach($category_list as $each_cat)
                        <a href="{{ route('categoy.wise.products', ['c_id' => $each_cat->c_id]) }}" style="background-color: #c1c7cc;    border-color: #c1c7cc;"class="btn btn-primary">{{ $each_cat->category_name }}</a>
                    @endforeach
                </div>
            </div>
            <hr>
            <div class="row" style="margin-top: -24px;">
                <?php 
                    $user_id = Session::get('user_id');
                ?>
                @foreach($all_products as $each_prod)
                <div class="col-md-3" style="margin-top:45px;">

                    <form action="{{ route('add.to.cart.items') }}" id="adding_to_cart" method="post"  >  
                    @csrf 
                        <div class="bbb_deals">
                            <div class="ribbon ribbon-top-right"><span><small class="cross">New</small></span></div>
                            <div class="">
                                <div class=" ">
                                   
                                    <div class="bbb_deals_image"><img src="{{ asset('images/' . $each_prod->image_url ) }}" style="height: 127px;width: 173px;" alt=""></div>
                                    <div class="">
                                    
                                        <div class="row">
                                            <div class="bbb_deals_item_category"><a href="#">Laptops</a></div>
                                            
                                        </div>
                                        <div class="row" style="display: flex;justify-content: center;">
                                            <div class="bbb_deals_item_name">{{ $each_prod->prod_name }}  ₹{{ $each_prod->price }}</div>
                                        </div>
                                        <div class="available row" style="display: flex;justify-content: center;">
                                            <div class="available_line d-flex flex-row justify-content-center">
                                                <div class="available_title">Available: <span>{{ ($each_prod->availability == 1)?'Instock':'Outofstock' }}</span></div>
                                            </div>
                                            <div class="available_bar"><span style="width:17%"></span></div>
                                        </div>

                                        <input type="hidden" id="prod_id" name="prod_id" value="{{ $each_prod->prod_id }}">

                                        <input type="hidden" id="price_val" name="price_val" value="{{ $each_prod->price }}">

                                        <input type="hidden" id="user_id" name="user_id" value="{{ $user_id }}">

                                        @if(in_array($each_prod->prod_id, $prod_id_array))
                                            
                                            <div class="row" style="display: flex;align-items: center;justify-content: center;margin-top: 23px;">
                                                <button class="btn btn-primary" value="adding" disabled>Added In Cart</button>
                                            </div>

                                        @else 
                                            <div class="row" style="display: flex;align-items: center;justify-content: center;margin-top: 23px;">
                                                <button class="btn btn-primary" type="submit" id="add_to_cart" name="add_to_cart" value="adding">Add To Cart</button>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    
                </div>
                @endforeach
                
            </div>
        </div>
        <br><br><br>

        <script src="{{ asset('jss/jquery.js') }}"></script>

    @endsection
     
   

