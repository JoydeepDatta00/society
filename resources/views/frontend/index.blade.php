
@extends('frontend.index_master')
@section('frontend')



 @include('frontend.home.banner')


<!--------------------------------------------------------   About sec   ---------------------------------------------------------->
@include('frontend.home.aboutsection')

<!--------------------------------------------------------   Hero box sec   ---------------------------------------------------------->

<section class="hero-grid-sec">
    <!-- <div class="mobile-scroll-right">
            <img src="images/arrows.png" alt="">
        </div> -->
    <div class="hero-grid">

        <a href="/services">
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

        <a href="/feedback">
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
