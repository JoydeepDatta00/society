@extends('admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">


        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Add Auditorium</h4>
                    <form action="{{ route('admin.createslots') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3 mt-4">
                            {{-- <div class="mb-0"> --}}
                                <label for="example-text-input" class="col-sm-2 col-form-label"> Choose Auditorium
                                </label>
                                <div class="col-sm-10">
                                    <select class="form-control select2-search-disable" name="auditorium_id"
                                        id="auditorium_id">
                                        <option>Click here and Choose the option</option>
                                        @foreach ($auditoriumData as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach


                                    </select>
                                </div>


                            </div>
                            <div class="row mb-3 mt-4">
                                {{-- <div class="mb-0"> --}}
                                    <label for="example-text-input" class="col-sm-2 col-form-label"> Choose Auditorium Hall
                                    </label>

                            <div class="col-sm-10">
                                <select class="form-control select2-search-disable" name="hall_id" id="hall_id">
                                    <option>Click here and Choose the option</option>

                                </select>
                            </div>
                            </div>
                            <div class="row mb-3 mt-4">
                                <label for="start-time" class="col-sm-2 col-form-label">Slots Timing</label>
                                <div class="col-sm-4">
                                    <input class="form-control" type="time" name="start_time" id="start-time" required>
                                </div>
                                <div class="col-sm-1 text-center">-</div>
                                <div class="col-sm-4">
                                    <input class="form-control" type="time" name="end_time" id="end-time" required>
                                </div>
                            </div>




                            <input type="submit" class="btn btn-success btn-rounded waves-effect waves-light"
                                name="submit" value="Add Slots " id="submitBtn">

                    </form>
                   
                    <!-- end row -->
                </div>
            </div>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js">
            </script>
           <script>
            $(document).ready(function() {
                $('#submitBtn').on('click', function(e) {
                    let isValid = true;

                    // Clear previous error messages and remove error borders
                    $('input').css('border', '');
                    toastr.clear();

                    // Validate Start Time
                    if ($('#start-time').val().trim() === '') {
                        toastr.error('Start time is required.');
                        $('#start-time').css('border', '1px solid red');
                        isValid = false;
                    }

                    // Validate End Time
                    if ($('#end-time').val().trim() === '') {
                        toastr.error('End time is required.');
                        $('#end-time').css('border', '1px solid red');
                        isValid = false;
                    }

                    // Concatenate and validate slots time if both times are provided
                    if ($('#start-time').val().trim() !== '' && $('#end-time').val().trim() !== '') {
                        const startTime = $('#start-time').val();
                        const endTime = $('#end-time').val();
                        $('#slots_time').val(`${startTime} - ${endTime}`);
                    }

                    Validate Slots Time (hidden input)
                    if ($('#slots_time').val().trim() === '') {
                        toastr.error('Slots time is required.');
                        $('#slots_time').css('border', '1px solid red');
                        isValid = false;
                    }

                    // Validate Auditorium ID
                    if ($('#auditorium_id').val().trim() === '') {
                        toastr.error('Choosing an auditorium is required.');
                        $('#auditorium_id').css('border', '1px solid red');
                        isValid = false;
                    }

                    if (!isValid) {
                        e.preventDefault(); // Prevent form submission if validation fails
                    }
                });
            });
        </script>
        <script>
       $(document).ready(function() {
    $('#auditorium_id').on('change', function() {
    const auditoriumId = $(this).val();
    const hallSelect = $('#hall_id');

    // Clear the current options in the hall dropdown
    hallSelect.html('<option value="">Loading...</option>');

    // Send an AJAX request to fetch the halls
    $.ajax({
    url: `/get-halls/${auditoriumId}`,
    type: 'GET',
    dataType: 'json',
    success: function(data) {
    console.log('Received data:', data);

    // Clear the loading option
    hallSelect.html('<option value="">Click here and Choose the option</option>');

    // Populate the halls dropdown with the fetched data
    if (data && data.length > 0) {
    $.each(data, function(index, hall) {
    hallSelect.append(`<option value="${hall.id}">${hall.auditorium_hall_name}</option>`);
    });
    } else {
    hallSelect.html('<option value="">No halls found</option>');
    }
    },
    error: function(xhr, status, error) {
    console.error('Error fetching halls:', error);
    hallSelect.html('<option value="">Failed to load halls</option>');
    }
    });
    });
    });
</script>



        </div> <!-- end col -->
    </div>
</div>
</div>


@endsection
