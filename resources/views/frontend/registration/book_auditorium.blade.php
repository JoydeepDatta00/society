@extends('frontend.index_master')
@section('frontend')
<section class="section other-page-sec">
    <div class="container">
        <div class="page-title">
            <div class="short-line"></div>

            <h2>Book Auditoriam
                <div class="breadcrumb">
                    <a href="index.html"><span>Home</span></a>
                    <span>/</span>
                    <span class="active">Book Auditoriam</span>

                </div>
            </h2>
            <!-- <p>Click to Visit our events</p> -->
        </div>
        <div class="bookAuditoriam">
            <form action="{{ route('store.booking') }}" method="post" id="myForm">
                @csrf


                <div class="formGrid2">
                    <div class="input-field">

                        <label>Enter Your Name</label>
                        <input name="name" id="name" type="text" >
                    </div>
                    <div class="input-field">
                        <label>Enter Your Organization Name</label>
                        <input name="organization_name" id="organization_name" type="text" >
                    </div>
                    <div class="input-field">
                        <label>Enter Your Email</label>
                        <input name="email" id="email" type="email" >
                    </div>
                    <div class="input-field">

                        <label>Enter Your Phone Number</label>
                        <input name="phone" id="phone" type="number" >
                    </div>
                    <div class="input-field">
                        <label>Enter Date</label>
                        <input name="date" type="date"  id="date" >
                    </div>

                    <div class="input-field">
                        <label for="auditorium">Choose An Auditorium</label>
                        <select name="choose_auditorium" id="auditorium" >
                            <option value="" selected>-- Select One --</option>
                            @foreach ($getAuditotiums as $auditorium)
                                <option value="{{ $auditorium->id }}">{{ $auditorium->name }}</option>
                            @endforeach

                        </select>

                    </div>
                    <div class="input-field">
                        <label for="auditorium">Choose A Hall</label>
                        <select name="auditorium_hall" id="hall" >
                            <option value="" selected>-- Select One --</option>
                        </select>

                    </div>
                    <div class="input-field">
                        <label for="auditorium">Choose slot</label>
                        <select name="choose_slots" id="slot" >
                            <option value="" selected>-- Select One --</option>


                        </select>

                    </div>

                    <div class="input-checkbox" >
                        <h4>Choose Service</h4>
                        <div class="inputChecboxCon" id="service-container">

                        </div>


                    </div>

                </div>
                <input class="submit" type="submit" name="submit" id=submitBtn value="Book">
            </form>
        </div>
    </div>
</section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>




<script>
    $(document).ready(function() {
    $('#auditorium').change(function() {
    var auditoriumId = $(this).val();

    if (auditoriumId) {
    // Fetch auditorium services
    $.ajax({
    url: '/get-auditorium-services/' + auditoriumId,
    type: 'GET',
    success: function(data) {
    console.log('Services data:', data); // Debugging
    $('#service-container').empty(); // Clear existing services
    if (data.length > 0) {
    $.each(data, function(key, service) {
    var radioHtml = `
    <div class="inputChecboxCon">
        <input type="checkbox" id="service-${service.id}" name="services[]" value="${service.services_name}">
        <label for="service-${service.id}">${service.services_name || 'Unnamed Service'}(Rs:${service.service_cost || 'N/A'})</label>
    </div>`;
    $('#service-container').append(radioHtml);
    });
    } else {
    $('#service-container').append('<p>No services available for the selected auditorium.</p>');
    }
    },
    error: function(xhr, status, error) {
    console.error('Error fetching services:', error);
    }
    });

    // Fetch halls
    $.ajax({
    url: '/get-halls-by-auditorium/' + auditoriumId,
    type: 'GET',
    success: function(data) {
    console.log('Halls data:', data); // Debugging
    $('#hall').empty().append('<option value="" selected>-- Select One --</option>');
    if (data.length > 0) {
    $.each(data, function(key, hall) {
    $('#hall').append('<option value="' + hall.id + '">' + hall.auditorium_hall_name || 'Unnamed Hall' + '</option>');
    });
    } else {
    $('#hall').append('<option value="" selected>No halls available.</option>');
    }
    },
    error: function(xhr, status, error) {
    console.error('Error fetching halls:', error);
    }
    });
    } else {
    // Reset if no auditorium is selected
    $('#service-container').empty();
    $('#hall').empty().append('<option value="" selected>-- Select Auditorium First --</option>');
    }
    });
    $('#hall').change(function() {
    var hallId = $(this).val();

    if (hallId) {
    // Fetch slots
    $.ajax({
    url: '/get-hall-slots/' + hallId,
    type: 'GET',
    success: function(data) {
    $('#slot').empty().append('<option value="" selected>-- Select One --</option>');
    $.each(data, function(key, slot) {
    $('#slot').append('<option value="' + slot.slots_time + '">' + slot.slots_time + '</option>');
    });
    },
    error: function(xhr, status, error) {
    console.error('AJAX error:', error); // Debug: Log any AJAX errors
    }
    });
    } else {
    $('#slot').empty().append('<option value="" selected>-- Select Hall First --</option>');
    }
    });
    });
</script>
@if (session('error'))
<script>
    alert("{{ session('error') }}");
                    window.location.href = "{{ route('book.auditorium') }}";
</script>
@endif
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
            if ($('#organization_name').val().trim() === '') {
            toastr.error('Organization Name is required.');
            $('#organization_name').css('border', '1px solid red');
            isValid = false;
            }

            // Validate Description
            if ($('#email').val().trim() === '') {
           toastr.error('Email is required.');
            $('#email').css('border', '1px solid red');
            isValid = false;
            }

            // Validate Image
            if ($('#phone').val().trim() === '') {
           toastr.error('Phone Number is required.');
            $('#phone').css('border', '1px solid red');
            isValid = false;
            }else if (!/^\d{10}$/.test($('#phone').val().trim())) {
            toastr.error('Invalid Phone Number. Please enter a 10-digit number.');
            $('#phone').css('border', '1px solid red');
            isValid = false;
            }

            if ($('#date').val().trim() === '') {
            toastr.error('Date is required.');
            $('#date').css('border', '1px solid red');
            isValid = false;
            }
            if ($('#auditorium').val().trim() === '') {
            toastr.error('Auditorium is required.');
            $('#auditorium').css('border', '1px solid red');
            isValid = false;
            }
            if ($('#hall').val().trim() === '') {
            toastr.error('Hall  is required.');
            $('#hall').css('border', '1px solid red');
            isValid = false;
            }
            if ($('#slot').val().trim() === '') {
            toastr.error('slot is required.');
            $('#slot').css('border', '1px solid red');
            isValid = false;
            }
            // if ($('#service-container').val().trim() === '') {
            // toastr.error('services is required.');
            // $('#service-container').css('border', '1px solid red');
            // isValid = false;
            // }

            if (!isValid) {
            e.preventDefault(); // Prevent form submission if validation fails
            }
            });
            });

</script>



@endsection
