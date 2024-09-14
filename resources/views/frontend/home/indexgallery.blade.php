@php
    $gallery = getGalleryImages();
    $getGallery = $gallery->sortByDesc('created_at')->take(4);

@endphp


<section class="section">
    <div class="container">
        <div class="gallery-title">
            <div>
                <div class="short-line"></div>
                <h2>Gallery and Photos</h2>
            </div>

            <a href="/gallery">View All</a>
        </div>
        <div class="gallery-grid">
            @foreach ($getGallery as $images)
                <a href="{{ '/gallery/images/' . encryptId($images['id']) }}">
                    <div class="gallery-item">
                        <img src="{{ Storage::url($images->gallery_thumbnail) }}" alt="">
                        <div class="gallery-con">
                            <h4>{{ $images->name }}</h4>
                            <p>{{ $images->created_at->format('d-m-y') }}</p>
                        </div>

                    </div>
                </a>
            @endforeach



        </div>
    </div>
</section>
