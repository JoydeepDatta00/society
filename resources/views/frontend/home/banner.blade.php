@php
    $getBannerImages = getBannerImages();
    $getMember = getMemberData();
    $members = $getMember->take(2);
@endphp


<section class="banner-sec">
    <div class="banner-grid">
        <div class="banner-right">
            <div class="flower-pattern-top">
                <img src="images/RED flower Hero.png" alt="">
            </div>
            <!-- <div class="right-logo">
                <div class="emblam">
                    <img src="{{ asset('frontend/logo/emblem-dark.png') }}" alt="">
                </div>
                <div class="logo-text">
                    <p>Government of Tripura</p>
                    <h6>Society for Management of Cultural Complex</h6>
                </div>

            </div> -->
            <h2><span>Promotion</span>
                <div class="dummy-box"></div>
            </h2>

            <div class="promotionSection">
                <div class="promotionSectionFlex">

                <!-- ---- for live event -->
                    <div class="promotionLive">
                        <iframe width="" height=""
                            src="https://www.youtube.com/embed/JeuqMnAiJws?si=-vTw74WTxYQ9kvv5"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>


 <!-- ---- for pre event videos -->
                    <div class="promotionPre">
                        <iframe width="" height=""
                            src="https://www.youtube.com/embed/5GlS9pyqBgM?si=R5g8I2Or-qN2rcCj"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                    <div class="promotionPre">
                        <iframe width="" height=""
                            src="https://www.youtube.com/embed/5GlS9pyqBgM?si=R5g8I2Or-qN2rcCj"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                    <div class="promotionPre">
                        <iframe width="" height=""
                            src="https://www.youtube.com/embed/5GlS9pyqBgM?si=R5g8I2Or-qN2rcCj"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
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

        <div class="banner-left">
            <div class="slider" id="slider1">
                <ul class="slideWrap" id="slideWrap1">
                    @foreach ($getBannerImages as $bannerImages)
                        <li><img src="{{ Storage::url($bannerImages?->banner_image) }}" alt=""></li>
                    @endforeach

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
                    <a href="/book-auditorium"><button>Book Auditorium</button></a>
                </div>
            </div>
        </div>
    </div>


    <div class="scroll-sec">
        <div class="scroll-item">
            <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module">
            </script>

            <a href="#about">
                <dotlottie-player src="https://lottie.host/edb4f303-25eb-48c7-a73e-1bda81e2f327/tgElcBo5FC.json"
                    background="transparent" speed="1" style="width: 48px; height: 48px;" loop autoplay>
                </dotlottie-player>
            </a>
        </div>
    </div>

</section>