@extends('frontend.index_master')
@section('frontend')
<section class="section other-page-sec">
    <div class="container">
        <div class="page-title">
            <div class="short-line"></div>

            <h2>Register
                <div class="breadcrumb">
                    <a href="index.html"><span>Home</span></a>
                    <span>/</span>
                    <span class="active">Register</span>

                </div>
            </h2>
            <!-- <p>Click to Visit our events</p> -->
        </div>
        <div class="bookAuditoriam loginForm">
            <form action="" method="post" id="myForm">
                @csrf
                <div class="formGrid2">
                    <div class="input-field">

                        <label>Enter Your Name</label>
                        <input name="" id="" type="text">
                    </div>
                    <div class="input-field">

                        <label>Enter Organization Name</label>
                        <input name="" id="" type="number">
                    </div>
                </div>

                <div class="formGrid2">
                    <div class="input-field">

                        <label>Enter Phone Number</label>
                        <input name="" id="" type="number">
                    </div>
                    <div class="input-field">

                        <label>Enter Your Email</label>
                        <input name="" id="name" type="text">
                    </div>

                </div>

                <div class="formGrid2">
                    <div class="input-field">

                        <label>Enter Password</label>
                        <input name="" id="name" type="password">
                    </div>
                    <div class="input-field">

                        <label>Confirm Password</label>
                        <input name="" id="name" type="password">
                    </div>
                </div>


                <input class="submit" type="submit" name="submit" value="Register">
            </form>
        </div>
    </div>
</section>






@endsection