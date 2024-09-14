<div class="search-form" action="" id="search-form">
    <form>
        <img src="{{ asset('frontend/images/search.png') }}" alt="">
        <input type="text" placeholder="Search here.......">
        <input type="submit" value="Submit" onclick="searchfunctionclose()">
        <img src="images/close.png" alt="" onclick="searchfunctionclose()" class="close">
    </form>
</div>
<div id="mySidepanel" class="sidepanel">
    <div class="close-sec" onclick="closeNav()"></div>
    <div class="side-menu">
        <div class="side-menu-con">
            <div class="side-menu-flex">
                <div class="logo">
                    <div class="logo-icon">
                        <img src="{{ asset('frontend/logo/emblem-dark.png') }}" alt="">
                    </div>
                    <div class="logo-text">
                        <h2>Government of Tripura </h2>
                        <h6>Society for Management of Cultural  Complex</h6>
                    </div>
                </div>
                <div class="close-btn-box" onclick="closeNav()">
                    <img src="{{ asset('frontend/images/close.png') }}" alt="">
                </div>
            </div>
            <div class="side-menu-home">
                <a href="/">
                    <img src="{{ asset('frontend/images/home.png') }}" alt="">
                </a>
                <a href="/">
                    HOME
                </a>
            </div>
            <ul>
                <a href="/about-us">
                    <li class="first-child">
                        <p>About Us</p>
                        <img src="{{ asset('frontend/images/less-then.png') }}" alt="">
                    </li>
                </a>
                <a href="/userprofile">
                    <li>
                        <p>Profile</p>
                        <img src="{{ asset('frontend/images/less-then.png') }}" alt="">
                    </li>
                </a>
                <a href="/members">
                    <li>
                        <p>Members</p>
                        <img src="{{ asset('frontend/images/less-then.png') }}" alt="">
                    </li>
                </a>
                <a href="/gallery">
                    <li>
                        <p>Gallery</p>
                        <img src="{{ asset('frontend/images/less-then.png') }}" alt="">
                    </li>
                </a>
                <a href="/events">
                    <li>
                        <p>Our Events</p>
                        <img src="{{ asset('frontend/images/less-then.png') }}" alt="">
                    </li>
                </a>
                <a href="/feedback">
                    <li>
                        <p>Contact Us</p>
                        <img src="{{ asset('frontend/images/less-then.png') }}" alt="">
                    </li>
                </a>
            </ul>
            <div class="sidepanel-foot">
                <a href="book-auditorium.html"><button>Book An Auditorium</button></a>
                <div class="social-links">
                    <a href="#" target="_blank"><img src="{{ asset('frontend/images/fb.png') }}"
                            alt=""></a>
                    <a href="#" target="_blank"><img src="{{ asset('frontend/images/twitter.png') }}"
                            alt=""></a>
                    <a href="#" target="_blank"><img src="{{ asset('frontend/images/insta.png') }}"
                            alt=""></a>
                </div>
            </div>
        </div>
        <div class="side-pettarn">
            <img src="{{ asset('frontend/images/boxbottom.png') }}" alt="">
        </div>
    </div>
</div>
<header id="header">
    <div class="header">
        <div class="head-left">
            <button onclick="openNav()"><img src="{{ asset('frontend/images/menu.png') }}" alt=""></button>
            <button onclick="searchfunction()" class="search"><img src="{{ asset('frontend/images/search.png') }}"
                    alt=""></button>
        </div>
        <div class="head-center">
            <a href="/">
                <h1>Society for Management of Cultural Complex</h1>
            </a>
            <div class="short-line"></div>
        </div>
        <div class="head-right">
            <div class="language-trn">
                <div id="google_translate_element"></div>
            </div>
        </div>
    </div>
</header>
