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
                <a href="/book-auditorium">
                    Book Now
                </a>

            </div>
        </div>




    </div>
</section>
