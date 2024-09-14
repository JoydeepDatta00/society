@extends('admin_master')
@section('title', 'Registrations-details')
@section('admin')

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">



                    <button class="btn btn-info mb-2">Back</button>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row p-4">
                                        <h2 class="mb-2 d-flex justify-content-between">Booking Details

                                            <div class="">
                                                @if ($getBookingDetails->allowed_status == 'Approved')
                                                    <span class="badge rounded-pill bg-success fs-6 text">Approved</span>
                                                @elseif($getBookingDetails->allowed_status == 'Rejected')
                                                    <span class="badge rounded-pill bg-danger fs-6 text">Rejected</span>
                                                @else
                                                    <span class="badge rounded-pill bg-warning fs-6 text">Pending</span>
                                                @endif

                                            </div>
                                        </h2>
                                        <hr>

                                        <div class="col-md-6">
                                            <p class="mb-0">Date</p>
                                            <h4 class="mb-4">{{ $getBookingDetails->date }}</h4>

                                            <p class="mb-0">Name</p>
                                            <h4 class="mb-4">{{ $getBookingDetails->name }}</h4>

                                            <p class="mb-0">Organization Name</p>
                                            <h4 class="mb-4">{{ $getBookingDetails->organization_name }}</h4>
                                            <p class="mb-0">Email</p>
                                            <h4 class="mb-4">{{ $getBookingDetails->email }}</h4>
                                            <p class="mb-0">Phone Number</p>
                                            <h4 class="mb-4">{{ $getBookingDetails->phone }}</h4>

                                            <p class="mb-0">Event Name</p>
                                            <h4 class="mb-0">{{ $getBookingDetails->event_name }}</h4>

                                        </div>
                                        <div class="col-md-6">
                                            <p class="mb-0">Url for webcasting</p>
                                            <h4 class="mb-4"><a
                                                    href="{{ $getBookingDetails->url_for_webcasting }}">{{ $getBookingDetails->url_for_webcasting }}</a>
                                            </h4>

                                            <p class="mb-0">Auditorium</p>
                                            <h4 class="mb-4">
                                                {{ getByAuditoriumName($getBookingDetails->choose_auditorium) }}</h4>

                                            <p class="mb-0">Hall</p>
                                            <h4 class="mb-4">
                                                {{ getHallsName($getBookingDetails->auditorium_hall) }}
                                            </h4>
                                            @php
                                                $slots = explode(',', $getBookingDetails->choose_slots);
                                            @endphp
                                            <p class="mb-0">Slots</p>
                                            <h5 class="mb-4">
                                                @foreach ($slots as $index => $slot)
                                                    <span>{{ $index + 1 }}.{{ trim($slot) }}</span>,<br>
                                                @endforeach
                                            </h5>
                                            {{-- <h4 class="mb-4">{{ $getBookingDetails->choose_slots }}</h4> --}}

                                            @php
                                                $services = explode(',', $getBookingDetails->services);
                                            @endphp

                                            <p class="mb-0">Service</p>
                                            <h5 class="mb-4">
                                                @foreach ($services as $index => $service)
                                                    <span>{{ $index + 1 }}.{{ trim($service) }}</span>,<br>
                                                @endforeach
                                                {{-- <span>{{ $getBookingDetails->services }}</span>, <span>Service B</span> --}}
                                            </h5>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="mb-0">Event Emage</p>
                                            <img src="{{ Storage::url($getBookingDetails->event_image) }}"
                                                class="img-fluid" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="card">
                                <div class="card-body">
                                    <h2 class="mb-2">Change Status</h2>
                                    <hr>
                                    <form action="{{ url('/update/booking-status') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="booking_id" value="{{ $getBookingDetails->id }}">
                                        <select class="form-select mb-3" aria-label="Default select example"
                                            name="allowed_status">
                                            <option value="Pending"
                                                {{ $getBookingDetails->allowed_status == 'Pending' ? 'selected' : '' }}>
                                                Pending
                                            </option>
                                            <option value="Approved"
                                                {{ $getBookingDetails->allowed_status == 'Approved' ? 'selected' : '' }}>
                                                Approved
                                            </option>
                                            <option value="Rejected"
                                                {{ $getBookingDetails->allowed_status == 'Rejected' ? 'selected' : '' }}>
                                                Rejected
                                            </option>
                                        </select>
                                        @if (Auth::user()->role_type === 'manager')
                                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                        @else
                                        @endif
                                    </form>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h2 class="mb-2">Promotions</h2>
                                    <hr>
                                    @foreach ($userPromotionalDetails as $promotionDetails)
                                        @if ($promotionDetails->promotion_link)
                                            <div class="border-bottom border-secondary mb-4">
                                                <span
                                                    class="badge badge-soft-dark mb-1">{{ $promotionDetails->created_at->format('d/m/y') }}</span>
                                                <h6><a href="{{ $promotionDetails->promotion_link }}"
                                                        target="_blank">{{ $promotionDetails->promotion_link }}</a></h6>

                                                <label for="example-text-input" class="col-sm-2 col-form-label"> promotion
                                                    link</label>
                                            </div>
                                        @elseif ($promotionDetails->promotion_image)
                                            <div class="border-bottom border-secondary mb-4">
                                                <span
                                                    class="badge badge-soft-dark mb-1">{{ $promotionDetails->created_at->format('d/m/y') }}</span>
                                                <img src="{{ Storage::url($promotionDetails->promotion_image) }}"
                                                    class="img-fluid" alt="...">

                                            </div>
                                        @else
                                        @endif
                                    @endforeach
                                    {{-- <div class="border-bottom border-secondary mb-4">
                                        <span class="badge badge-soft-dark mb-1">01/09/2024</span>
                                        <h6><a href="https://www.youtube.com/watch?v=dcadn-Wvwqo"
                                                target="_blank">https://www.youtube.com/watch?v=dcadn-Wvwqo</a></h6>

                                    </div> --}}



                                </div>
                            </div>
                        </div>
                    </div>

                </div>



            </div> <!-- end col -->
        </div>

    </div>
    </div>



@endsection
