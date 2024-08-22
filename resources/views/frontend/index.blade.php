
@extends('frontend.index_master')
@section('frontend')



 @include('frontend.home.banner')
{{-- <section class="banner-sec">
    <div class="banner-grid">
        <div class="banner-right">
            <div class="flower-pattern-top">
                <img src="images/RED flower Hero.png" alt="">
            </div>
            <div class="right-logo">
                <div class="emblam">
                    <img src="{{ asset('frontend/logo/emblem-dark.png') }}" alt="">

                    <div class="logo-text">
                        <p>Government of Tripura</p>
                        <h6>Society for Management of Cultural Complex</h6>
                    </div>

                </div>
                <h2><span>Members</span>
                    <div class="dummy-box"></div>
                </h2>
                <div class="minister-sec">
                    <div class="minister">
                        <div class="minister-photo">
                            <img src="{{ asset('frontend/images/dummy.jpg') }}" alt="">
                        </div>
                        <div class="minister-des">
                            <p>Designation</p>
                            <h6>Member Name</h6>
                        </div>
                    </div>
                    <div class="minister cm">
                        <div class="minister-photo">
                            <img src="{{ asset('frontend/images/dummy.jpg') }}" alt="">
                        </div>
                        <div class="minister-des">
                            <p>Designation</p>
                            <h6>Member Name</h6>
                        </div>
                    </div>



                </div>
                <div class="flower-pattern">
                    <img src="{{ asset('frontend/images/RED flower Hero.png') }}" alt="">
                </div>
                <div class="rotate-text">
                    <p>More Than <span>54</span> Registrations Done</p>
                </div>
                <div class="bg-pattern">
                    <img src="{{ asset('frontend/images/Pattern Large.png') }}" alt="">
                </div>

                <div class="mobile-slide-down">
                    <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs"
                        type="module"></script>

                    <dotlottie-player src="https://lottie.host/08075ebc-3e42-49b1-a7aa-4481f1669851/WQWg0IgE6x.json"
                        background="transparent" speed="1" style="width: 36px; height: 36px;" loop autoplay>
                    </dotlottie-player>
                </div>

            </div>

        </div>
        <div class="banner-left">
            <div class="slider" id="slider1">
                <ul class="slideWrap" id="slideWrap1">
                    <li><img src="{{ asset('frontend/images/banner/pexels-gnasralla-3866658.jpg') }}" alt=""></li>
                    <li><img src="{{ asset('frontend/images/banner/pexels-leonardo-luncasu-1230168729-23812823.jpg') }}" alt="">
                    </li>
                    <li><img src="{{ asset('frontend/images/banner/pexels-vietfotos-18238104.jpg') }}" alt=""></li>
                </ul>
                <button class="prev" id="prev1"><i class="fa-solid fa-chevron-left"></i></button>
                <button class="next" id="next1">
                    <i class="fa-solid fa-chevron-right"></i>
                </button>
            </div>
            <div class="slider-layer">
                <div class="slider-con">
                    <h3>"</h3>
                    <h5>Join me our Cultuarl Society for unity and progress.</h5>
                    <h6> - Mr. Member Name </h6>
                    <h4>"</h4>
                    <p>
                        It is a long established fact that a reader will be distracted by the readable content of a
                        page when looking at its layout. The point of using Lorem Ipsum is that it has a
                        more-or-less normal distribution of letters, as opposed to using 'Content here, content
                        here', making it look like readable English. Many desktop publishing packages and web page
                        editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will
                        uncover many web sites still in their infancy. Various versions have evolved over the years,
                        sometimes by accident, sometimes on purpose (injected humour and the like).
                    </p>
                    <a href="book-auditorium.html"><button>Book Auditorium</button></a>
                </div>
            </div>
        </div>
    </div>

    <div class="scroll-sec">
            <div class="scroll-item">
                <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs"
                    type="module">
                </script>

                <a href="#about">
                    <dotlottie-player src="https://lottie.host/edb4f303-25eb-48c7-a73e-1bda81e2f327/tgElcBo5FC.json"
                        background="transparent" speed="1" style="width: 48px; height: 48px;" loop autoplay>
                    </dotlottie-player>
                </a>
            </div>
    </div>

</section> --}}

<!--------------------------------------------------------   About sec   ---------------------------------------------------------->
@include('frontend.home.aboutsection')

<!--------------------------------------------------------   Hero box sec   ---------------------------------------------------------->

<section class="hero-grid-sec">
    <!-- <div class="mobile-scroll-right">
            <img src="images/arrows.png" alt="">
        </div> -->
    <div class="hero-grid">

        <a href="services.html">
            <div class="hero-box">

                <div class="box-pattern-top">
                    <img src="{{ asset('frontend/images/boxtop.png') }}" alt="">
                </div>
                <div class="hero-container">
                    <div class="hero-container-text">
                        <h4>All</h4>
                        <h4>Services</h4>
                        <div class="card-line"></div>
                        <p>It is a long established fact that a reader will be distracted by the readable content.
                        </p>
                    </div>

                </div>
                <div class="box-arrow">
                    <img src="{{ asset('frontend/images/ARROW FOR CARD.png') }}" alt="">
                </div>
                <div class="hero-pattern">
                    <img src="{{ asset('frontend/images/boxbottom.png') }}" alt="">
                </div>
            </div>
        </a>
        <a href="/members">
            <div class="hero-box">
                <div class="box-pattern-top">
                    <img src="{{ asset('frontend/images/boxtop.png') }}" alt="">
                </div>
                <div class="box1-leaf">
                    <img src="{{ asset('frontend/images/box1.png') }}" alt="">
                </div>
                <div class="hero-container">
                    <div class="hero-container-text">
                        <h4>Our </h4>
                        <h4>Members</h4>
                        <div class="card-line"></div>
                        <p>t is a long established fact that a reader will be distracted by the readable content.
                        </p>
                    </div>
                </div>
                <div class="box-arrow">
                    <img src="{{ asset('frontend/images/ARROW FOR CARD.png') }}" alt="">
                </div>
                <div class="hero-pattern">
                    <img src="{{ asset('frontend/images/boxbottom.png') }}" alt="">
                </div>
            </div>
        </a>
        <a href="/events">
            <div class="hero-box">
                <div class="box-pattern-top">
                    <img src="{{ asset('frontend/images/boxtop.png') }}" alt="">
                </div>
                <div class="hero-container">
                    <div class="hero-container-text">
                        <h4>Our</h4>
                        <h4>Events</h4>
                        <div class="card-line"></div>
                        <p>t is a long established fact that a reader will be distracted by the readable content.
                        </p>
                    </div>
                </div>
                <div class="box-arrow">
                    <img src="{{ asset('frontend/images/ARROW FOR CARD.png') }}" alt="">
                </div>
                <div class="hero-pattern">
                    <img src="{{ asset('frontend/images/boxbottom.png') }}" alt="">
                </div>
            </div>
        </a>

        <a href="contact-us.html">
            <div class="hero-box">
                <div class="box-pattern-top">
                    <img src="{{ asset('frontend/images/boxtop.png') }}" alt="">
                </div>
                <div class="box4-leaf">
                    <img src="{{ asset('frontend/images/box4.png') }}" alt="">
                </div>
                <div class="hero-container">
                    <div class="hero-container-text">
                        <h4>Get </h4>
                        <h4>In Touch</h4>
                        <div class="card-line"></div>
                        <p>Your Feedback/Suggestions are welcome.</p>
                    </div>
                </div>
                <div class="box-arrow">
                    <img src="{{ asset('frontend/images/ARROW FOR CARD.png') }}" alt="">
                </div>
                <div class="hero-pattern">
                    <img src="{{ asset('frontend/images/boxbottom.png') }}" alt="">
                </div>
            </div>
        </a>

    </div>
</section>
<!--------------------------------------------------   Auditorium section   -------------------------------------------------------->
@include('frontend.home.auditorium')


<!----------------------------------------------------   Gallery Section   -------------------------------------------------------->

@include('frontend.home.indexgallery')


<!--------------------------------------------------   Subscribe section   -------------------------------------------------------->

<section class="section">

    <div class="subscribe-sec">
        <div class="subscribe">
            <img src="{{ asset('frontend/images/email.png') }}" alt="">
            <div>
                <h6>Click Here for Book an Auditorium</h6>
                <!-- <p>Give your business an edge with our leading industry insights.</p> -->
            </div>
            <a href="/book-auditorium"><button>Book</button></a>
        </div>
    </div>

</section>

@endsection
