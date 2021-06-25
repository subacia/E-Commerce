@extends('layouts')
    @section('content')
       <div class="container cart-item-page" style="margin-bottom: 129px;margin-top: 53px;">

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    @if(Session::has('item_removed')) 
                        <div id="messages" class="alert alert-success alert-dismissible" role="alert">
                            
                            <div id="messages_content" >{{ Session::get('item_removed') }}</div>
                            @php 
                                Session::forget('item_removed'); 
                            @endphp
                        </div>
                    @endif 
                </div>
            </div>
            <div class="row">
                <h2 style="text-align: center;">Cart Items</h2>
            </div>
            <div class="row">
                
                <div class="col-lg-12 ">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <th scope="col">S.NO</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                
                                <th scope="col">Total</th>
                                <th scope="col">Remove Item</th>
                            </thead>
                            <?php
                                $i = 1;$total = 0;
                            ?>
                            <tbody>
                                <?php 
                                    $user_id = session::get('user_id');
                                ?>
                                <input type="hidden" id="user_id" name ="user_id" value="{{ $user_id }}">
                                @if(!empty($all_prods_in_cart))
                                @foreach($all_prods_in_cart as $each_item)
                                <tr class="each_row" id="row_each">
                                    <td>{{ $i }}</td>
                                    <td>{{ $each_item->prod_name }}</td>
                                    <td>{{ $each_item->price }}</td>
                                    <td><input type="number" class="form-control quantity" name="quantity_<?php echo $each_item->c_i_id; ?>" id="quantity_<?php echo $each_item->c_i_id; ?>" style="text-align: center;  width: 17%;" value="{{ $each_item->quantity }}" rel="<?php echo $each_item->c_i_id; ?>"> </td>
                                    
                                    <td class="total_price_<?php echo $each_item->c_i_id; ?>">{{ $each_item->total_price }}</td>

                                    <td>
                                        <a href=" {{ route('remove.an.item', ['c_i_id' => $each_item->c_i_id]) }}" name="remove_prod" id="remove_prod" onClick="return confirm('Are you sure d you want to remove this item?');"><i class="fa fa-trash"></i></a>
                                    </td>

                                    

                                    <input type="hidden" class="prod_id_cart" id="prod_id_cart_<?php echo $each_item->c_i_id; ?>" name="prod_id_cart" value="{{ $each_item->prod_id }}">
                                    
                                    <input type="hidden" class="price_val" id="price_val_<?php echo $each_item->c_i_id; ?>" name="price_val" value="{{ $each_item->price }}">

                                    <input type="hidden" class="c_i_id_val" id="c_i_id_val_<?php echo $each_item->c_i_id; ?>" name="c_i_id_val" value="{{ $each_item->c_i_id }}">
                                    

                                </tr>
                                
                                <?php
                                    $i++;
                                    $total = $total + $each_item->total_price;
                                ?>
                                @endforeach
                                @endif

                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="sub_total">Sub-Total</td>
                                    <td id="sub_total_val"><strong>Rs. {{ $total }}</strong></td>
                                    
                                </tr>
                                <input type="hidden" id="grand_total_val_1" name="grand_total_val_1" value="{{ $total }}">
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="grand_total">Grand Total</td>
                                    <td id="grand_total_val" ><strong>Rs. {{ $total }}</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row" style="float:right;">

                        <div class="col-md-6">
                            <a href="{{ route('checkout.view') }}" id="checkout_id" class="btn btn-primary" disabled style=" width: 500px;">Checkout</a>
                        </div>
                        
                    </div>

                </div>
            </div>
        </div>

        <script src="{{ asset('jss/jquery.js') }}"></script>
        <script>
            
            $(document).ready(function(){
                var grand_total_val_1 = $('#grand_total_val_1').val();

                if(grand_total_val_1 != '' && grand_total_val_1>0){
                   $('#checkout_id').removeAttr('disabled');
                }else{
                    $('#checkout_id').attr('disabled','disabled');
                }
            });

            $('.quantity').on("change", function(){
               
                var row = $(this).closest('tr');

                var c_i_id_val = row.find('.c_i_id_val').val();
                
                var qty = row.find('.quantity').val();
               
                var price_val = row.find('.price_val').val();

                var user_id = $('#user_id').val();

                $.ajax({
                    url : 'update_cart_item_qty',
                    method : 'post',
                    headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                    data : {
                        
                        c_i_id_val: c_i_id_val,
                        qty : qty,
                        price_val : price_val,
                        user_id : user_id
                    },
                    success:function(response){

                       resp = JSON.parse(JSON.stringify(response));
                        
                        var c_i_id_val_1 = resp.c_i_id_val;
                        var qty_1 = resp.qty;
                        var total_price_1 = resp.total_price;
                        var grand_total = resp.grand_total;

                        var total_price_id = '.total_price_' + c_i_id_val_1;

                        $(total_price_id).html(total_price_1);

                        $('#sub_total_val').html('<strong> Rs. ' + grand_total + '</strong>');

                        $('#grand_total_val').html('<strong> Rs. ' + grand_total + '</strong>');

                        $('#grand_total_val_1').val(grand_total);

                        var grand_total_val_1 = $('#grand_total_val_1').val();

                        if(grand_total_val_1 != ''){
                            $('#checkout_id').prop('disabled', false);
                        }else{
                            $('#checkout_id').prop('disabled', true);
                        }
                    }
                });
               
            });

        </script>
    @endsection
     
   

