@extends('frontend.index_master')
@section('frontend')
<section class="section other-page-sec">
    <div class="container">
        <div class="page-title">
            <div class="short-line"></div>

            <h2>Login
                <div class="breadcrumb">
                    <a href="index.html"><span>Home</span></a>
                    <span>/</span>
                    <span class="active">Login</span>

                </div>
            </h2>
            <!-- <p>Click to Visit our events</p> -->
        </div>
        <div class="bookAuditoriam">
            <form action="" method="post" id="myForm">
                @csrf



                <div class="input-field">

                    <label>Enter Your Email</label>
                    <input name="" id="name" type="text">
                </div>
                <br>
                <div class="input-field">

                    <label>Enter Password</label>
                    <input name="" id="name" type="password">
                </div>
                <br>
                <input class="submit" type="submit" name="submit" value="Login">
            </form>
        </div>
    </div>
</section>






@endsection