@extends('frontend.index_master')
@section('frontend')

<section class="section other-page-sec">
    <div class="container">
        <div class="page-title">
            <div class="short-line"></div>

            <h2>Gallery
                <div class="breadcrumb">
                    <a href="/"><span>Home</span></a>
                    <span>/</span>
                    <span class="active">Gallery</span>

                </div>
            </h2>

            <!-- <p>Click to Enter the gallery</p> -->

        </div>
        <div class="gallery-grid">

            @foreach ( $getGallery as $gallery )
                <a href="{{ '/gallery/images/' . encryptId($gallery['id']) }}">
                    <div class="gallery-item">
                        <img src="{{ Storage::url($gallery->gallery_thumbnail) }}" alt="">
                        <div class="gallery-con">
                            <h4>{{ $gallery->name }}</h4>
                            <p>{{ $gallery->created_at->format('d-m-y') }}</p>
                        </div>

                    </div>
                </a>
            @endforeach

        </div>
    </div>
</section>
@endsection
