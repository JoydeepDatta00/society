<footer>
    <div class="footer-flower-top-pattern">
        <img src="{{ asset('frontend/images/Grey flower FOOTER.png') }}" alt="">
    </div>
    <div class="footer-layer">
        <div class="container">
            <div class="footer-main">
                <div class="left">
                    <div class="logo">
                        <div class="logo-icon">
                            <img src="{{ asset('frontend/logo/emblem-dark.png') }}" alt="">
                        </div>
                        <div class="logo-text">
                            <h2>Government of Tripura</h2>
                            <h6>Society for Management of Cultural Complex</h6>
                        </div>
                    </div>
                    <div class="social-foot">
                        <a href="#" target="_blank"><img src="{{ asset('frontend/images/fb.png') }}"
                                alt=""></a>
                        <a href="#" target="_blank"><img src="{{ asset('frontend/images/twitter.png') }}"
                                alt=""></a>
                        <a href="#" target="_blank"><img src="{{ asset('frontend/images/insta.png') }}"
                                alt=""></a>
                    </div>
                    <h5>Developed and Maintained By DIT, Tripura</h5>

                    <p>For any query regarding this website, please contact </p>
                    <p>Phone: <a href="#">1234567891</a></p>

                    <p>Email ID: <a href="#">societycultuaral@gmail.com</a></p>
                    @if (Auth::check())
                        @php
                            $roleType = Auth::user()->role_type;
                        @endphp

                        @if ($roleType === 'chairman')
                            <a href="{{ route('chairman.dashboard') }}" class="btn btn-primary">Dashboard</a>
                        @elseif ($roleType === 'user')
                            <a href="{{ route('user.profile') }}" class="btn btn-primary">Profile</a>
                        @elseif ($roleType === 'manager')
                            <a href="{{ route('manager.dashboard') }}" class="btn btn-primary">Dashboard</a>
                        @else
                            <a href="{{ url('/') }}" class="btn btn-primary">Home</a>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                    @endif

                    <!-- <h6>www.cmotripura.gov.in</h6> -->
                </div>
                <div class="center">
                    <h2>554</h2>
                    <h6>Registrations </h6>
                    <h6>Done</h6>
                </div>
                <div class="right">
                    <div class="foot-manu">
                        <ul>
                            <a href="/about-us">
                                <li>About Us</li>
                            </a>
                            <a href="/gallery">
                                <li>Gallery</li>
                            </a>
                            <a href="/events">
                                <li>Our Events</li>
                            </a>
                        </ul>
                        <ul>

                            <a href="/members">
                                <li>Members</li>
                            </a>

                            <a href="services.html">
                                <li>Services</li>
                            </a>

                            <a href="/feedback">
                                <li>Contact Us</li>
                            </a>
                        </ul>
                    </div>
                    <div class="foot-search">
                        <form action="">
                            <i class="fa-solid fa-magnifying-glass manuicon text-search-icon"></i>
                            <input type="search" name="" id="">
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="footer-flower-pattern">
        <img src="{{ asset('frontend/images/Grey flower FOOTER.png') }}" alt="">
    </div>
    <div class="footer-pattern">
        <img src="{{ asset('frontend/images/Footer pattern.png') }}" alt="">
    </div>
</footer>
