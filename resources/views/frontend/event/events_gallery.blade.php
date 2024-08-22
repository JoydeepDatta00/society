@extends('frontend.index_master')
@section('frontend')

<section class="section other-page-sec">
    <div class="container">

        <div class="page-title">
            <div class="short-line"></div>

            <h2>{{ $getEvents->events_name }}
                <div class="breadcrumb">
                    <a href="/"><span>Home</span></a>
                    <span>/</span><a href="/events"><span>Our Events</span></a>
                    <span>/</span>
                    <span class="active">{{ $getEvents->events_name }}</span>
                </div>
            </h2>

            <!-- <p>Click to Enter the gallery</p> -->

        </div>

        <div class="event-sec">
            <h5>{{ $getEvents->created_at->format('d-m-y') }}</h5>

            <br>
            <p>

                {{ $getEvents->events_description }}
            </p>

            <div class="eventImagesGrid">

              @foreach ( $getEventsGallery as $eventGallery )
                <div class="eventImageCon">
                    <img src="{{ Storage::url($eventGallery->events_gallery_image) }}" alt="">
                </div>
              @endforeach

                {{-- <div class="eventImageCon">
                    <img src="../images/banner/pexels-gnasralla-3866658.jpg" alt="">
                </div>
                <div class="eventImageCon">
                    <img src="../images/banner/pexels-leonardo-luncasu-1230168729-23812823.jpg" alt="">
                </div> --}}
            </div>



        </div>
    </div>
</section>
@endsection
