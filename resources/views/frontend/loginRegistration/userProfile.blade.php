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
                        <span>/</span>

                    </div>
                </h2>
                <!-- <p>Click to Visit our events</p> -->
            </div>
            <div class="profileGrid">
                <div class="profileHistory">
                    @foreach ($auditoriumBookingData as $data)
                        <div class="bookingHistory">
                            <h3 class="dotDate"><span
                                    class="approved statusDot"></span>{{ $data->created_at->format('d-m-y') }}</h3>
                            <h3>{{ $data->name }}</h3>
                            @if ($data->allowed_status === 'Approved')
                                <span class="status approved">Approved</span>
                            @elseif($data->allowed_status === 'Rejected')
                                <span class="status rejected">Rejected</span>
                            @else
                                <span class="status pending">Pending</span>
                            @endif

                            <div class="operation">
                                <a href="{{ '/get/booking-details/' . encryptId($data->id) }}"><button
                                        style="background:#000">Manage</button></a>
                            </div>
                        </div>
                    @endforeach
                    {{-- <div class="bookingHistory">
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


                    </div> --}}
                </div>
                <div class="profileDetails">
                    <h3><span>Name:</span>{{ Auth::user()->name }}</h3>
                    <h5><span>Organization name:</span>{{ Auth::user()->organization_name }}</h5>
                    <h5><span>Number:</span>{{ Auth::user()->phone_number }}</h5>
                    <h5><span>Email:</span>{{ Auth::user()->email }}</h5>
                    <button class="tablinks"><a href="/book-auditorium">Book Auditorium</a></button>
                    <button class="tablinks"><a href="/logout">Logout</a></button>

                    <!-- <a href=""><button>Edit Profile</button></a> -->
                </div>
            </div>
        </div>
    </section>
@endsection
