@extends('admin_master')
@section('title','Members')
@section('admin')
<div class="page-content">
    <div class="container-fluid">


        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Add Members</h4>
                    <form action="{{ route('admin.addmember') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="member_name" id="member_name">
                                <span class="text-danger">

                                </span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="member_email" id="member_email">
                                <span class="text-danger">

                                </span>
                            </div>
                        </div>
                        <div class="row mb-3 mt-4">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> Phone No </label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="member_phone_no" id="member_phone_no">
                            </div>
                        </div>

                        <div class="row mb-3 mt-4">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Member designation </label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="member_designation"
                                    id="member_designation">
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
        if ($('#customFile').val().trim() === '') {
       toastr.error('Image is required.');
        $('#customFile').css('border', '1px solid red');
        isValid = false;
        }

        if (!isValid) {
        e.preventDefault(); // Prevent form submission if validation fails
        }
        });
        });
            </script>

            @php
            $memberData = getMemberData();
            @endphp

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Document table</h4>


                            <table id="selection-datatable" class="table dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>sl no.</th>
                                        <th>Name </th>
                                        <th>Email</th>
                                        <th>Phone no </th>
                                        <th>Designation</th>
                                        <th>Operation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i=1)
                                    @foreach($memberData as $item)
                                    <tr>
                                        <td scope="row">{{$i++}}</td>
                                        <td>{{$item->member_name}}</td>
                                        <td>
                                            {{$item->member_email}}
                                        </td>
                                        <td>{{$item->member_designation}}</td>
                                        <td>
                                            @if($item->member_image)
                                            <img src="{{ Storage::url($item?->member_image) }}"
                                                alt="Event Thumbnail" class="img-thumbnail"
                                                style="max-width: 100px; max-height: 100px;">
                                            @else
                                            <span>No image</span>
                                            @endif
                                        </td>
                                        <td>

                                            <a href="{{"/admin/edit-members/".encryptId($item['id'])}}" class="btn btn-info sm"
                                                title="Edit Event"> <i class="fas fa-edit"></i></a>
                                            <a href="{{" /admin/delete-events/".$item['id']}}" class="btn btn-danger sm"
                                                title="Delete Data" id="delete"> <i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>

        </div> <!-- end col -->
    </div>
</div>
</div>

@endsection
