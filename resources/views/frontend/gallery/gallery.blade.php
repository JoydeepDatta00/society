@extends('frontend.index_master')
@section('frontend')

<section class="section other-page-sec">
    <div class="container">
        <div class="page-title">
            <div class="short-line"></div>

            <h2>{{ $getGalleryThumbnail->name }}
                <div class="breadcrumb">
                    <a href="/"><span>Home</span></a>
                    <span>/</span><a href="/gallery"><span>Gallery</span></a>
                    <span>/</span>
                    <span class="active">{{ $getGalleryThumbnail->name }}</span>
                </div>
            </h2>

            <!-- <p>Click to Enter the gallery</p> -->

        </div>
        <div class="gallery-grid" id="gallery">
                @foreach ($getGalleryImages as $galleryImages )
                <div class="gallery-item">
                    <img src="{{ Storage::url($galleryImages->gallery_image) }}" alt="">
                </div>
                @endforeach



        </div>
    </div>
</section>
<script>
    // viewer js script
        const gallery = document.getElementById('gallery');
        // const viewer = new Viewer(gallery);
        const viewer = new Viewer(gallery, {
            toolbar: {
                zoomIn: 4,
                zoomOut: 4,
                prev() {
                    viewer.prev(true);
                },
                play: true,
                next() {
                    viewer.next(true);
                },


            },
        });
</script>
@endsection
