@extends('admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">


        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Edit Members</h4>
                    <form action="{{ route('admin.updatemember') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $editMemberData->id }}">
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="member_name" id="member_name" value="{{$editMemberData->member_name  }}">
                                <span class="text-danger" >

                                </span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="member_email" id="member_email" value="{{$editMemberData->member_email }}">
                                <span class="text-danger">

                                </span>
                            </div>
                        </div>
                        <div class="row mb-3 mt-4">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> Phone No </label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="member_phone_no" id="member_phone_no" value="{{$editMemberData->member_phone_no }}">
                            </div>
                        </div>

                        <div class="row mb-3 mt-4">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Member designation </label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="member_designation"
                                    id="member_designation" value="{{$editMemberData->member_designation  }}">
                            </div>
                        </div>
                        <div class="input-group mb-3 mt-4">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Choose Image</label>
                            <input type="file" class="form-control" name="member_image" id="customFile"
                                accept="image/*">
                        </div>


                        <input type="submit" class="btn btn-success btn-rounded waves-effect waves-light" name="submit"
                            value="Add Members " id="submitBtn">

                    </form>
                    <div class="mt-4 text-danger"> Note:Click in add icon to add event image required* </div>

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
        if ($('#member_name').val().trim() === '') {
       toastr.error('Members name is required.');
        $('#member_name').css('border', '1px solid red');
        isValid = false;
        }

        // Validate Date
        if ($('#member_email').val().trim() === '') {
        toastr.error('Event date is required.');
        $('#member_email').css('border', '1px solid red');
        isValid = false;
        }
        //validate phone
        if ($('#member_phone_no').val().trim() === '' || !/^[\d\s\(\)\-]{10}$/.test($('#member_phone_no').val().trim())) {
        toastr.error('Phone number must contain between 10  digits.');
        $('#member_phone_no').css('border', '1px solid red');
        isValid = false;
        }

        // Validate Description
        if ($('#member_designation').val().trim() === '') {
       toastr.error('Member designation is required.');
        $('#member_designation').css('border', '1px solid red');
        isValid = false;
        }

        // Validate Image


        if (!isValid) {
        e.preventDefault(); // Prevent form submission if validation fails
        }
        });
        });
            </script>



        </div> <!-- end col -->
    </div>
</div>
</div>

@endsection
