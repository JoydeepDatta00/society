@extends('admin_master')
@section('title','Auditorium Services')
@section('admin')
<div class="page-content">
    <div class="container-fluid">


        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Add Auditorium Services</h4>
                    <form action="{{ route('admin.createauditorium') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3 mt-4">
                            {{-- <div class="mb-0"> --}}
                                <label for="example-text-input" class="col-sm-2 col-form-label"> Choose Auditorium </label>
                                <div class="col-sm-10">
                                <select class="form-control select2-search-disable" name="auditorium_id" id="auditorium_id">
                                    <option>Click here and Choose the option</option>
                                    @foreach ($auditoriumData as  $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>




                        <div class="row mb-3 mt-4">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Service Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="services_name" id="services_name">
                            </div>
                        </div>
                        <div class="row mb-3 mt-4">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Service cost</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number" name="service_cost" id="service_cost">
                            </div>
                        </div>
                        <div class="row mb-3 mt-4">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Service note</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="service_note" id="service_note">
                            </div>
                        </div>

                        <input type="submit" class="btn btn-success btn-rounded waves-effect waves-light" name="submit"
                            value="Add Auditorium services " id="submitBtn">

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
        // $('span.text-danger').text('');
        toastr.clear();

        // Validate Name
        if ($('#services_name').val().trim() === '') {
       toastr.error('Name is required.');
        $('#services_name').css('border', '1px solid red');
        isValid = false;
        }

        // Validate Date
        if ($('#auditorium_id').val().trim() === '') {
        toastr.error('Choose Auditorium is required.');
        $('#auditorium_id').css('border', '1px solid red');
        isValid = false;
        }
        if ($('#service_cost').val().trim() === '') {
        toastr.error(' service cost is required.');
        $('#service_cost').css('border', '1px solid red');
        isValid = false;
        }
        if ($('#service_note').val().trim() === '') {
        toastr.error(' service note is required.');
        $('#service_note').css('border', '1px solid red');
        isValid = false;
        }

        // Validate Image
    //     if ($('#customFile').val().trim() === '') {
    //    toastr.error('Auditorium Image is required.');
    //     $('#customFile').css('border', '1px solid red');
    //     isValid = false;
    //     }

        if (!isValid) {
        e.preventDefault(); // Prevent form submission if validation fails
        }
        });
        });
            </script>



        </div> <!-- end col -->
    </div>
</div>


@endsection
