@extends('frontend.index_master')
@section('frontend')
<section class="section other-page-sec">
    <div class="container">
        <div class="page-title">
            <div class="short-line"></div>

            <h2>Profile / Historty
                <div class="breadcrumb">
                    <a href="index.html"><span>Home</span></a>
                    <span>/</span>
                    <span class="active">Profile</span>

                </div>
            </h2>
            <!-- <p>Click to Visit our events</p> -->
        </div>
        <div class="profileGrid">
            <div class="profileHistory">
                <div class="bookingHistory">
                    <h3 class="dotDate"><span class="approved statusDot"></span>10/08/2024</h3>
                    <h3>Auditorium ABC</h3>
                    <!-- <span class="status approved">Approved</span>
                    <span class="status pending">Pending</span> -->
                    <span class="status approved">Approved</span>
                    <div class="operation">
                        <a href="/full_booking_history"><button style="background:#000">Manage</button></a>
                    </div>


                </div>
                <div class="bookingHistory">
                    <h3 class="dotDate"><span class="pending statusDot"></span>10/08/2024</h3>
                    <h3>Auditorium ABC</h3>
                    <!-- <span class="status approved">Approved</span>
                    <span class="status pending">Pending</span> -->
                    <span class="status pending">Pending</span>
                    <div class="operation">
                        <a href="/full_booking_history"><button style="background:#000">Manage</button></a>
                    </div>


                </div>

                <div class="bookingHistory">
                    <h3 class="dotDate"><span class="rejected statusDot"></span>10/08/2024</h3>
                    <h3>Auditorium ABC</h3>
                    <!-- <span class="status approved">Approved</span>
                    <span class="status pending">Pending</span> -->
                    <span class="status rejected">Rejected</span>
                    <div class="operation">
                        <a href="/full_booking_history"><button style="background:#000">Manage</button></a>
                    </div>


                </div>
            </div>
            <div class="profileDetails">
                <h3>Bishal Acharjee</h3>
                <h5>Organization ABC</h5>
                <h5>8837314577</h5>
                <h5>bishal@gmail.com</h5>

                <!-- <a href=""><button>Edit Profile</button></a> -->
            </div>
        </div>
    </div>
</section>






@endsection