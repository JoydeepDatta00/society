<section class="auditoriumSection section">
    <div class="container">



        <div class="auditoriumGrid">
            <div class="auditoriumSliderSection">
                <div class="auditoriumSlider">
                    <div class="slider" id="slider2">
                        <ul class="slideWrap" id="slideWrap2">

                            @php
                            $auditriumDetails=getAuditoriumData();
                            @endphp
                            @foreach ($auditriumDetails as $item)


                            <li>
                                <div class="hall">
                                    <img src="{{ Storage::url($item->auditorium_image) }}" alt="">
                                    <div class="hallDescription">
                                        <h2>{{ $item->name }}</h2>
                                        <p>{{ $item->description }}</p>
                                        <h6>{{ $item->address }}</h6>
                                    </div>
                                </div>

                            </li>
                            @endforeach
                            {{-- <li>
                                <div class="hall">
                                    <img src="images/banner/pexels-gnasralla-3866658.jpg" alt="">
                                    <div class="hallDescription">
                                        <h2>Muktadhara</h2>
                                        <p>Organises various programs ,conferences,meetings.capacity of around
                                            600.Has 2
                                            green rooms on either side.stage space is decent.</p>
                                        <h6>R7JG+X7M, Krishna Nagar, Agartala, Tripura 799001</h6>
                                    </div>
                                </div>

                            </li>

                            <li>
                                <div class="hall">
                                    <img src="images/banner/pexels-vietfotos-18238104.jpg" alt="">
                                    <div class="hallDescription">
                                        <h2>Muktadhara</h2>
                                        <p>Organises various programs ,conferences,meetings.capacity of around
                                            600.Has 2
                                            green rooms on either side.stage space is decent.</p>
                                        <h6>R7JG+X7M, Krishna Nagar, Agartala, Tripura 799001</h6>
                                    </div>
                                </div>

                            </li> --}}
                        </ul>
                        <button class="prev" id="prev1"><i class="fa-solid fa-chevron-left"></i></button>
                        <button class="next" id="next1">
                            <i class="fa-solid fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="auditoriumAbout">
                <div class="short-line"></div>
                <h4>Our Auditorium</h4>

                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                    the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                    of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                    but also the leap into electronic typesetting, remaining essentially unchanged. It was
                    popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                    and more recently with desktop publishing software like Aldus PageMaker including versions of
                    Lorem Ipsum.
                </p>
                <a href="book-auditorium.html">
                    Book Now
                </a>

            </div>
        </div>




    </div>
</section>
