@extends('admin_master')
@section('admin')

<div class="page-content">
 <div class="container-fluid">


    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ url()->previous() }}" class="d-flex justify-content-end ">Back</a>

                <h4 class="card-title">Add Banner</h4>


              <form action="{{ route('admin.storebanner') }}"  method="post" enctype="multipart/form-data">
                @csrf

                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text"  name="banner_name" id="name">
                    </div>
                </div>


                <!-- end row -->

               <!-- <div class="card">
                <div class="card-body">--->
                    <div class="row mb-3">

                    <div class="input-group">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Choose Image</label>
                        <input type="file" class="form-control" name="banner_image" id="customFile" >
                    </div>

                </div>
               <!-- </div>
            </div>-->
                <!-- end row -->

             <input type="submit"  class="btn btn-success btn-rounded waves-effect waves-light"  id="submitBtn"  name="submit" value="Add Banner ">

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

            // Validate Name
            if ($('#name').val().trim() === '') {
                toastr.error('Name is required.');
                $('#name').css('border', '1px solid red');
                isValid = false;
            }

            // Validate File Input
            if ($('#customFile')[0].files.length === 0) {
                toastr.error('Banner image is required.');
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
 $bannersImages=getBannerImages();
 @endphp
    </div> <!-- end col -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ url()->previous() }}" class="d-flex justify-content-end ">Back</a>

                    <h4 class="card-title">Banner Image</h4>


                    <table id="selection-datatable" class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>sl no.</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)

                            @foreach($bannersImages as $item)

                            <tr>
                                <td scope="row">{{$i++}}</td>
                                <td scope="row">{{ $item?->banner_name }}</td>

                                <td>
                                    <img class="img-thumbnail" style="width: 150px; height:150px"
                                        src="{{ Storage::url($item?->banner_image) }}">
                                </td>
                                <td>


                                    <a href="{{" /admin/delete-gallery/".$item['id']}}" class="btn btn-danger sm"
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
</div>
</div>
</div>

@endsection
