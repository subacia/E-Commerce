@extends('layouts')
    @section('content')

    <div class="container signup-page">

        <div class="col-lg-12 col-md-12">
            @if(Session::has('login_invalid')) 
                <div id="messages" class="alert alert-warning alert-dismissible" role="alert">
                    <div id="messages_content" >{{ Session::get('login_invalid') }}</div>
                    @php 
                        Session::forget('login_invalid'); 
                    @endphp
                </div>
            @elseif(Session::has('login_alert')) 
                <div id="messages" class="alert alert-warning alert-dismissible" role="alert">
                    <div id="messages_content" >{{ Session::get('login_alert') }}</div>
                    @php 
                        Session::forget('login_alert'); 
                    @endphp
                </div>
            @endif 
        </div>
        <section id="login" style="height: 446px;margin-top: 67px;">
            <div class="container">
                <div class="row" style="display: flex;justify-content: center;align-items: center;">     
                        
                    <div class="col-lg-6 col-md-6 register-form offset-md-3">
                        
                        <h2 style="text-align: center;">Login</h2>
                        <form action="{{ route('login.post') }}"  method="post" >
                            @csrf
                            

                            <div class="form-group">
                                <label for="mobile_num">Mobile Number</label>
                                <input type="text" class="form-control" id="mobile_num" name="mobile_num" value="{{ old('mobile_num') }}" onkeyup="this.value=this.value.replace(/[^0-9]/g,'');"  placeholder="Mobile Number" required >
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="text" class="form-control" id="password" name="password"  value="{{ old('password') }}"  placeholder="Password" required>
                            </div>

                            <div class="col-md-12 login-button" style="display: flex;align-items: center;justify-content: center;">
                                    <input type="submit"  name="submit" class="form-control" value="Login" style="width: 50%;">
                            </div>
                            
                               
                                <br><br><br>
                                <span style="color:black;margin-left:28%" >If not registered? Please register</span>
                                <br><br>
                                <div class="col-md-12 register-button" style="display: flex;align-items: center;justify-content: center;">
                                    <button style="background: white;border-radius: 100px;border: none;color: #ffffff;letter-spacing: 2px;"><a href="{{ route('sign.up.view') }}" target="_blank" style="color:black">Register</a></button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @endsection
