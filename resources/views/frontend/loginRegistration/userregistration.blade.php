@extends('frontend.index_master')
@section('frontend')
    <section class="section other-page-sec">
        <div class="container">
            <div class="page-title">
                <div class="short-line"></div>

                <h2>Register
                    <div class="breadcrumb">
                        <a href="/"><span>Home</span></a>
                        <span>/</span>
                        <span class="active">Register</span>

                    </div>
                </h2>
                <!-- <p>Click to Visit our events</p> -->
            </div>
            <div class="bookAuditoriam loginForm">
                <form method="POST" action="{{ route('user.registration') }}" id="myForm">
                    @csrf

                    <div class="formGrid2">
                        <div class="input-field">

                            <label>Enter Your Name</label>
                            <input name="name" id="name" type="text">
                        </div>
                        <div class="input-field">
                            <label>Enter Organization Name</label>
                            <input name="organization_name" id="organization_name" type="text">
                        </div>
                    </div>

                    <div class="formGrid2">
                        <div class="input-field">

                            <label>Enter Phone Number</label>
                            <input name="phone_number" id="phone_number" type="number">
                        </div>
                        <div class="input-field">

                            <label>Enter Your Email</label>
                            <input name="email" id="email" type="text">
                        </div>

                    </div>

                    <div class="formGrid2">
                        <div class="input-field">

                            <label>Enter Password</label>
                            <input name="password" id="password" type="password">
                        </div>
                        {{-- <div class="input-field">

                            <label>Confirm Password</label>
                            <input name="password_confirmation" id="password_confirmation" type="password">
                        </div> --}}
                    </div>


                    <input class="submit" type="submit" name="submit" value="Register">
                    {{-- <button class="submit">{{ __('Register') }}</button> --}}
                </form>
            </div>
        </div>
    </section>
@endsection
