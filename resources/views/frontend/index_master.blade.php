<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Society for Management of Cultural Complex</title>
    <link rel="shortcut icon" href="{{ asset('frontend/logo/fevicon.png') }}" type="image/x-icon">

    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/query.css') }}">


    <link rel="stylesheet" href="{{ asset('frontend/css/swiper-bundle.min.css') }}">


    <script src="https://kit.fontawesome.com/4ebe883bff.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/viewerjs/1.10.5/viewer.min.js"
        integrity="sha512-i5q29evO2Z4FHGCO+d5VLrwgre/l+vaud5qsVqQbPXvHmD9obORDrPIGFpP2+ep+HY+z41kAmVFRHqQAjSROmA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/viewerjs/1.10.5/viewer.css"
        integrity="sha512-c7kgo7PyRiLnl7mPdTDaH0dUhJMpij4aXRMOHmXaFCu96jInpKc8sZ2U6lby3+mOpLSSlAndRtH6dIonO9qVEQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

</head>

<body>
    <!-- <div class="loader-wrapper">
        <div class="loaderPatternLeft">
            <img src="images/RED flower Hero.png" alt="">
        </div>
        <div class="spinner"></div>
        <div class="loaderPatternRight">
            <img src="images/RED flower Hero.png" alt="">
        </div>
    </div> -->



    @include('frontend.body.header')

     @yield('frontend')
    <!--------------------------------------------------------   Banner sec   ---------------------------------------------------------->

    <!--------------------------------------------------   Footer   -------------------------------------------------------->

  @include('frontend.body.footer')

  <script>
    @if(Session::has('message'))
                    var type = "{{ Session::get('alert-type','info') }}"
                    switch(type){
                       case 'info':
                       toastr.info(" {{ Session::get('message') }} ");
                       break;

                       case 'success':
                       toastr.success(" {{ Session::get('message') }} ");
                       break;

                       case 'warning':
                       toastr.warning(" {{ Session::get('message') }} ");
                       break;

                       case 'error':
                       toastr.error(" {{ Session::get('message') }} ");
                       break;
                    }
                    @endif
    </script>
    <script src="{{ asset('frontend/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/js/script.js') }}"></script>
    <script type="text/javascript"
        src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


</body>

</html>
