@extends('layouts')
    @section('content')

    <div class="container signup-page">

        <div class="col-lg-12 col-md-12">
            @if(Session::has('saved_user_details')) 
                <div id="messages" class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div id="messages_content" >{{ Session::get('saved_user_details') }}</div>
                    @php Session::forget('saved_user_details'); @endphp
                </div>
            @elseif(Session::has('mble_num_exists')) 
                <div id="messages" class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div id="messages_content" >{{ Session::get('mble_num_exists') }}</div>
                    @php Session::forget('mble_num_exists'); @endphp
                </div>
            @endif 
        </div>
        <section id="checkout" style="height: 483px;margin-top: 30px;">
            <div class="container">
                <?php 
                    $user_id = session::get('user_id');
                ?>
                
                
                <div class="row" style="display: flex;justify-content: center;align-items: center;">     
                        
                    <div class="col-lg-6 col-md-6 register-form offset-md-3">
                        
                        <h2 style="text-align: center;">Checkout</h2>
                        <form action="{{ route('place.order') }}"  method="post" >
                            @csrf

                            <input type="hidden" id="user_id" name ="user_id" value="{{ $user_id }}">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Name" required>
                            </div>

                            <div class="form-group">
                                <label for="mobile_num">Mobile Number</label>
                                <input type="text" class="form-control" id="mobile_num" name="mobile_num" value="{{ old('mobile_num') }}" onkeyup="this.value=this.value.replace(/[^0-9]/g,'');"  placeholder="Mobile Number" required >
                            </div>

                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" placeholder="Address" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="payment_mode">Payment Mode</label>
                                <select class="form-control" id="payment_mode" name="payment_mode" required>
                                    <option value="">Select Payment Mode</option>
                                    <option value="1">Cash On Delivery</option>
                                    <option value="2">Online</option>
                                </select>
                            </div>

                            <div class="col-md-12 register-button" style="display: flex;align-items: center;justify-content: center;">
                                    <input type="submit"  name="submit" class="form-control" value="Order" style="width: 50%;">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @endsection
