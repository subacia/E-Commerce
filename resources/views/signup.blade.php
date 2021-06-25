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
        <section id="register" style="height: 480px;margin-top: 40px;">
            <div class="container">
                <div class="row" style="display: flex;justify-content: center;align-items: center;">     
                        
                    <div class="col-lg-6 col-md-6 register-form offset-md-3">
                        
                        <h2 style="text-align: center;">Register Here</h2>
                        <form action="{{ route('save.user.details') }}"  method="post" >
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Name" required>
                            </div>

                            <div class="form-group">
                                <label for="mobile_num">Mobile Number</label>
                                <input type="text" class="form-control" id="mobile_num" name="mobile_num" value="{{ old('mobile_num') }}" onkeyup="this.value=this.value.replace(/[^0-9]/g,'');"  placeholder="Mobile Number" required >
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="text" class="form-control" id="password" name="password"  value="{{ old('password') }}"  placeholder="Password" required>
                            </div>

                            <div class="col-md-12 register-button" style="display: flex;align-items: center;justify-content: center;">
                                    <input type="submit"  name="submit" class="form-control" value="REGISTER" style="width: 50%;">
                            </div>
                            
                               
                                <br><br><br>
                                <span style="color:black;margin-left:28%" >If already registered? Please login</span>
                                <br><br>
                                <div class="col-md-12 register-button" style="display: flex;align-items: center;justify-content: center;">
                                    <button style="background: white;border-radius: 100px;border: none;color: #ffffff;letter-spacing: 2px;"><a href="{{ route('login.view') }}" target="_blank" style="color:black">LOGIN</a></button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @endsection
