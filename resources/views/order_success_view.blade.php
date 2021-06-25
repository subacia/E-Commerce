@extends('layouts')
    @section('content')

    <div class="container signup-page">

        <div class="col-lg-12 col-md-12">
            @if(Session::has('order_success')) 
                <div id="messages" class="alert alert-success alert-dismissible" role="alert">
                    
                    <div id="messages_content" >{{ Session::get('order_success') }}</div>
                    @php 
                        Session::forget('order_success'); 
                    @endphp
                </div>
            @elseif(Session::has('mble_num_exists')) 
                <div id="messages" class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div id="messages_content" >{{ Session::get('mble_num_exists') }}</div>
                    @php Session::forget('mble_num_exists'); @endphp
                </div>
            @endif 
        </div>
        <section id="order_sucess_page" style="height:650px">
            <div class="container">
                <?php 
                    $user_id = session::get('user_id');
                ?>
                
                
                <div class="row" style="display: flex;justify-content: center;align-items: center;">     
                        
                    <div class="col-lg-6 col-md-6 register-form offset-md-3" style=" background-color: #f7efef;">
                        
                        <h3 style="text-align: center;"> Order Id: <strong>{{ $order_id  }}</strong> </h3>
                        <h3 style="text-align: center;"> Name: <strong>{{ $name }}</strong> </h3>
                        <h3 style="text-align: center;" > Mobile Number: <strong>{{ $mble_num  }}</strong> </h3>
                        <h3 style="text-align: center;"> Address: <strong>{{ $address  }}</strong> </h3>
                        
                    </div>
                </div>
            </div>
        </section>
    </div>

    @endsection
