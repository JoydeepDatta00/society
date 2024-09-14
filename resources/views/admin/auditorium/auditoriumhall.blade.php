@extends('admin_master')
@section('title', 'Auditorium Hall')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">


            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Add Auditorium Hall</h4>
                        <form action="{{ route('admin.storeAuditoriumHall') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3 mt-4">
                                {{-- <div class="mb-0"> --}}
                                <label for="example-text-input" class="col-sm-2 col-form-label"> Choose Auditorium
                                </label>
                                <div class="col-sm-10">
                                    {{-- <select class="form-control select2-search-disable" name="auditorium_id"
                                        id="auditorium_id">
                                        <option>Click here and Choose the option</option>
                                        @foreach ($auditoriumData as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select> --}}
                                    <input type="hidden" name="auditorium_id" value="{{ $auditoriumData->id }}"
                                        id="auditorium_id">
                                    <input class="form-control" type="text"
                                        value="{{ getByAuditoriumName($auditoriumData->id) }}" @readonly(true)>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Auditorium Hall name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="auditorium_hall_name"
                                        id="auditorium_hall_name">
                                </div>
                            </div>
                            <div class="row mb-3 mt-4">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Auditorium Seating
                                    Capacity</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" name="seating_capacity"
                                        id="seating_capacity">
                                </div>
                            </div>
                            <input type="submit" class="btn btn-success btn-rounded waves-effect waves-light"
                                name="submit" value="Add Hall " id="submitBtn">

                        </form>


                        <!-- end row -->
                    </div>
                </div>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                {{-- <script>
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
            </script> --}}



            </div> <!-- end col -->
        </div>
    </div>
    </div>

@endsection
