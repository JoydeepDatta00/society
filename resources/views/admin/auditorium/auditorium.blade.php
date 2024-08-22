@extends('admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">


        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Add Auditorium</h4>
                    <form action="{{ route('admin.addauditorium') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Auditorium Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="name" id="name">
                            </div>
                        </div>

                        <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Auditorium description</label>
                             <div class="col-sm-10">
                                 <input class="form-control" type="text" name="description" id="description">
                            </div>
                        </div>
                        <div class="row mb-3 mt-4">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Auditorium Address</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="address"
                                    id="address">
                            </div>
                        </div>
                        <div class="row mb-3 mt-4">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Auditorium  Seating Capacity</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number" name="seating_capacity"
                                    id="seating_capacity">
                            </div>
                        </div>
                        <div class="input-group mb-3 mt-4">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Choose Image</label>
                            <input type="file" class="form-control" name="auditorium_image" id="customFile"
                                accept="image/*">
                        </div>


                        <input type="submit" class="btn btn-success btn-rounded waves-effect waves-light" name="submit"
                            value="Add Auditorium " id="submitBtn">

                    </form>
                    <div class="mt-4 text-danger"> Note:Click in add icon to add event image required* </div>

                    <!-- end row -->
                </div>
            </div>


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
                                        <th>Address</th>
                                        <th>seating capacity</th>
                                        <th>Auditoium Images</th>
                                        <th>Operation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i=1)
                                    @foreach($auditoriums as $item)
                                    <tr>
                                        <td scope="row">{{$i++}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>
                                            {{$item->address}}
                                        </td>
                                        <td>
                                            {{$item->seating_capacity}}
                                        </td>

                                        <td>
                                            @if($item->auditorium_image)
                                            <img src="{{Storage::url($item?->auditorium_image) }}" alt="Event Thumbnail"
                                                class="img-thumbnail" style="max-width: 100px; max-height: 100px;">
                                            @else
                                            <span>No image</span>
                                            @endif
                                        </td>
                                        <td>

                                            <a href="{{" /admin/edit-auditoirum/".encryptId($item['id'])}}" class="btn btn-info sm"
                                                title="Edit Event"> <i class="fas fa-edit"></i></a>
                                            <a href="{{"/admin/delete-auditorium/".encryptId($item['id'])}}" class="btn btn-danger sm"
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
        if ($('#name').val().trim() === '') {
       toastr.error('Name is required.');
        $('#name').css('border', '1px solid red');
        isValid = false;
        }
        if ($('#description').val().trim() === '') {
        toastr.error('Description is required.');
        $('#description').css('border', '1px solid red');
        isValid = false;
        }

        // Validate Date
        if ($('#address').val().trim() === '') {
        toastr.error('Address is required.');
        $('#address').css('border', '1px solid red');
        isValid = false;
        }

        // Validate Image
        if ($('#customFile').val().trim() === '') {
       toastr.error('Auditorium Image is required.');
        $('#customFile').css('border', '1px solid red');
        isValid = false;
        }

        if (!isValid) {
        e.preventDefault(); // Prevent form submission if validation fails
        }
        });
        });
</script>

@endsection
