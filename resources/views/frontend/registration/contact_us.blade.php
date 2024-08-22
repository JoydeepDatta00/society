@extends('frontend.index_master')
@section('frontend')

<section class="section other-page-sec">
    <div class="container">
        <div class="page-title">
            <div class="short-line"></div>

            <h2>Contact Us
                <div class="breadcrumb">
                    <a href="index.html"><span>Home</span></a>
                    <span>/</span>
                    <span class="active">Contact Us</span>

                </div>
            </h2>
            <!-- <p>Click to Visit our events</p> -->
        </div>

        <div class="contact-grid">
            <div class="left">
                <div id="wrapper-9cd199b9cc5410cd3b1ad21cab2e54d3">
                    <div id="map-9cd199b9cc5410cd3b1ad21cab2e54d3"></div>
                    <script>
                        (function () {
                                var setting = { "query": "Agartala, Tripura, India", "height": 448, "satellite": false, "zoom": 12, "placeId": "ChIJpyNByQ30UzcRx8hAbDwmodA", "cid": "0xd0a1263c6c40c8c7", "coords": [23.831457, 91.2867777], "lang": "en", "queryString": "Agartala, Tripura, India", "centerCoord": [23.831457, 91.2867777], "id": "map-9cd199b9cc5410cd3b1ad21cab2e54d3", "embed_id": "1041824" };
                                var d = document;
                                var s = d.createElement('script');
                                s.src = 'https://1map.com/js/script-for-user.js?embed_id=1041824';
                                s.async = true;
                                s.onload = function (e) {
                                    window.OneMap.initMap(setting)
                                };
                                var to = d.getElementsByTagName('script')[0];
                                to.parentNode.insertBefore(s, to);
                            })();
                    </script><a href="https://1map.com/map-embed">1 Map</a>
                </div>
            </div>
            <div class="right">
                <div class="contact-details">
                    <h6>Contact Details</h6>
                    <p>Phone: <a href="#">1234567891</a></p>
                    <p>Email ID: <a href="#">societycultural@gmail.com</a></p>
                </div>
                <form action="{{ route('store.feedback') }}" method="post" name="test-form" >
                    @csrf



                    <label for="name">Full name*</label>
                    <input type="text" name="name" id="name" >
                    <label for="phone">Phone number*</label>
                    <input type="tel" name="phone" id="phone" >
                    <label for="query">Query/Feedback*</label>
                    <textarea name="feedback" id="feedback" cols="30" rows="10" ></textarea>
                    <input type="submit" name="submit" value="Submit" id="submitBtn">

                </form>

            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
    $('#submitBtn').on('click', function(e) {
    let isValid = true;

    // Clear previous error messages and remove error borders
    $('input').css('border', '');
    // $('span.text-danger').text('');
    toastr.clear();

    // Validate Name
    if ($('#name').val().trim() === '') {
    toastr.error('Name is required.');
    $('#name').css('border', '1px solid red');
    isValid = false;
    }

    // Validate Date
    if ($('#phone').val().trim() === '') {
    toastr.error('phone number is required.');
    $('#phone').css('border', '1px solid red');
    isValid = false;
    }else if (!/^\d{10}$/.test($('#phone').val().trim())) {
    toastr.error('Invalid Phone Number. Please enter a 10-digit number.');
    $('#phone').css('border', '1px solid red');
    isValid = false;
    }
    if ($('#feedback').val().trim() === '') {
    toastr.error('feedback field is required.');
    $('#feedback').css('border', '1px solid red');
    isValid = false;
    }
    if (!isValid) {
    e.preventDefault(); // Prevent form submission if validation fails
    }
});
    });
</script>
@endsection
