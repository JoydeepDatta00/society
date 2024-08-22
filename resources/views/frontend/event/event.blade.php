@extends('frontend.index_master')
@section('frontend')
 <section class="section other-page-sec">
    <div class="container">
        <div class="page-title">
            <div class="short-line"></div>

            <h2>Our Events
                <div class="breadcrumb">
                    <a href="/"><span>Home</span></a>
                    <span>/</span>
                    <span class="active">Events</span>

                </div>
            </h2>
            <!-- <p>Click to Visit our events</p> -->
        </div>
        <div class="gallery-grid">
            @foreach ($events as $event)
             <a href="{{ '/events/event-gallery/' . encryptId($event['id']) }}">
                <div class="gallery-item">
                    <img src="{{ Storage::url($event->events_thumbnail_image) }}" alt="">
                    <div class="gallery-con">
                        <h4>{{ $event->event_name }}</h4>
                        <p>Date: {{ $event->created_at->format('d-m-y') }}</p>
                    </div>

                </div>
            </a>
            @endforeach




        </div>
    </div>
</section>
@endsection
