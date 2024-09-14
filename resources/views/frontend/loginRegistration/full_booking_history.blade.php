@extends('frontend.index_master')
@section('frontend')
    <section class="section other-page-sec">
        <div class="container">
            <div class="page-title">

                <button class="backBtn">Back</button>
                <script>
                    document.querySelector('.backBtn').addEventListener('click', function() {
                        window.history.back();
                    });
                </script>


                <div class="fullDetails">
                    <div class="fullDetailsBox" style="height:fit-content">


                        <h2>Booking Details </h2>
                        <div class="short-line"></div>
                        <br><br>
                        <div class="fullDetailsgrid">

                            <div class="fullDetailsLeft">
                                @if ($auditoriumBookingsData->allowed_status === 'Approved')
                                    <span class="status approved">Approved</span>
                                @elseif ($auditoriumBookingsData->allowed_status === 'Rejected')
                                    <span class="status rejected">Rejected</span>
                                @else
                                    <span class="status pending">Pending</span>
                                @endif

                                <br>
                                <br>
                                <br>
                                <p class="labal">Date</p>
                                <h4>{{ $auditoriumBookingsData?->created_at->format('d/m/y') }}</h4>

                                <p class="labal">Name</p>
                                <h4>{{ $auditoriumBookingsData?->name }}</h4>

                                <p class="labal">Organization Name</p>
                                <h4>{{ $auditoriumBookingsData?->organization_name }}</h4>

                                <p class="labal">Event Name</p>
                                <h4>{{ $auditoriumBookingsData?->event_name }}</h4>


                            </div>
                            <div class="fullDetailsRight">

                                <p class="labal">Url for webcasting</p>
                                <h4 style="font-size: 18px"><a
                                        href="{{ $auditoriumBookingsData?->url_for_webcasting }}">{{ $auditoriumBookingsData?->url_for_webcasting }}</a>
                                </h4>

                                <p class="labal">Auditorium</p>
                                <h4>{{ getByAuditoriumName($auditoriumBookingsData?->choose_auditorium) }}</h4>

                                <p class="labal">Hall</p>
                                <h4>{{ getHallsName($auditoriumBookingsData?->auditorium_hall) }}</h4>

                                <p class="labal">Slots</p>
                                <h4>{{ $auditoriumBookingsData?->choose_slots }}</h4>

                                <p class="labal">Service</p>
                                <h4><span>{{ $auditoriumBookingsData?->services }}</span></h4>
                            </div>
                        </div>
                        {{-- <img src="{{ url('storage/' . $auditoriumBookingsData->event_image) }}" alt=""
                            class="eventImage"> --}}
                        <img src="{{ Storage::url($auditoriumBookingsData->event_image) }}" alt="">
                    </div>
                    <div>
                        <div class="fullDetailsBox">
                            <h2>Url for webcasting</h2>
                            <div class="short-line"></div>
                            <br><br>
                            <form action="{{ route('update.webcastingurl') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $auditoriumBookingsData->id }}">
                                <div class="input-field">
                                    <input name="url_for_webcasting" id="url_for_webcasting" type="link"
                                        value="{{ $auditoriumBookingsData?->url_for_webcasting }}" required>
                                </div>
                                <br>
                                <input class="submit" type="submit" name="submit" value="Add / Update">
                            </form>

                        </div>
                        <br>
                        @if ($auditoriumBookingsData->allowed_status === 'Approved')
                            <div class="fullDetailsBox">
                                <h2>Add Promotions</h2>
                                <div class="short-line"></div>
                                <br><br>

                                <div class="promotionsTab">
                                    <button class="tablinks" onclick="openCity(event, 'Photo')"
                                        id="defaultOpen">Photo</button>
                                    <button class="tablinks" onclick="openCity(event, 'YoutubeURL')">YoutubeURL</button>
                                </div>

                                <div id="Photo" class="tabcontent">
                                    <form action="{{ route('store.promotionImage') }}" method="Post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="input-field">
                                            <input type="hidden" name="booking_id"
                                                value="{{ $auditoriumBookingsData->id }}">
                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                                            <label>Upload Photo (png/jpg/jpeg format)</label>
                                            <input name="promotion_image" id="promotion_image" type="file" required>
                                        </div>
                                        <br>
                                        <input class="submit" type="submit" name="submit" value="Submit">
                                    </form>
                                </div>

                                <div id="YoutubeURL" class="tabcontent">
                                    <form action="{{ route('store.promotionLink') }}" method="post">
                                        @csrf
                                        <div class="input-field">
                                            <input type="hidden" name="booking_id"
                                                value="{{ $auditoriumBookingsData->id }}">
                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                            <label>Youtube Video Url</label>
                                            <input name="promotion_link" id="promotion_link" type="link" required>
                                        </div>
                                        <br>
                                        <input class="submit" type="submit" name="submit" value="Submit">
                                    </form>
                                </div>
                            </div>
                        @else
                            <div></div>
                        @endif
                        <br>

                        <div class="fullDetailsBox">
                            <h2>Your Promotions</h2>
                            <div class="short-line"></div>
                            <br><br>
                            @foreach ($getPromotionData as $promotionData)
                                @if ($promotionData->promotion_link)
                                    <div class="myPromotion">
                                        <span class="date">{{ $promotionData->created_at->format('d/m/y') }}</span>
                                        <a href="{{ $promotionData->prmotion_link }}"
                                            target="blank">{{ $promotionData->promotion_link }}</a>
                                    </div>
                                @elseif ($promotionData->promotion_image)
                                    <div class="myPromotion">
                                        <span class="date">{{ $promotionData->created_at->format('d/m/y') }}</span>
                                        <img src="{{ Storage::url($promotionData->promotion_image) }}" alt=""
                                            class="eventImage">
                                    </div>
                                @else
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>



            </div>

        </div>
    </section>


    <script>
        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
    </script>
@endsection
