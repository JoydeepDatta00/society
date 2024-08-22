@extends('admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">


        <div class="col-12">
            <div class="card">

                <div class="card-body">


                    <h4 class="card-title">update Auditorium</h4>
                    <form action="{{ route('admin.updateAuditorium') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="auditorium_id" value="{{ $auditoriums->id }}">
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Auditorium Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="name" id="name" value="{{ $auditoriums->name }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Auditorium description</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="description" id="description" value="{{ $auditoriums->description }}">
                            </div>
                        </div>
                        <div class="row mb-3 mt-4">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Auditorium Address</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="address" id="address" value="{{ $auditoriums->address }}">
                            </div>
                        </div>
                        
                        <div class="input-group mb-3 mt-4">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Choose Image</label>
                            <input type="file" class="form-control" name="auditorium_image" id="customFile"
                                accept="image/*">
                        </div>


                        <input type="submit" class="btn btn-success btn-rounded waves-effect waves-light" name="submit"
                            value="update Auditorium  " id="submitBtn">

                    </form>
                  

                    <!-- end row -->
                </div>
            </div>
        </div> <!-- end col -->

        <!---tables--->
        <div class="row">
            <h4>Hall Name:{{ $auditoriums->name }}</h4>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                          <h4 class="card-title">Auditorium Halls</h4>
                       <a href="" class="btn btn-success sm" title="Add Audutorium Halls" id="delete"> <i class="fas fa-plus-square"></i></a>
                        </div>




                        <table id="selection-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>

                                    <th>Hall Name </th>
                                    <th>Operation</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($auditoriumHalls as $item)
                                <tr>

                                    <td>{{$item->auditorium_hall_name}}</td>
                                    <td>
                                        <a href="{{"/admin/delete-halls/".encryptId($item['id'])}}" class="btn btn-danger sm"
                                            title="Delete Data" id="delete"> <i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->


            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Auditorium Services</h4>
                            <a href="" class="btn btn-success sm" title="Add Audutorium Slots" id="delete"> <i class="fas fa-plus-square"></i></a>
                        </div>




                        <table id="selection-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>

                                    <th>Name </th>
                                    <th>Operation</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($auditoriumServices as $auditoriumService)
                                <tr>

                                    <td>{{$auditoriumService->services_name}}</td>
                                    <td>
                                        <a href="{{" /admin/delete-services/".encryptId($auditoriumService['id'])}}" class="btn btn-danger sm"
                                            title="Delete Data" id="delete"> <i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->


            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Auditorium Hall & slots</h4>
                            <a href="" class="btn btn-success sm" title="Add Slots" id="delete"> <i class="fas fa-plus-square"></i></a>

                        </div>




                        <table id="selection-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>

                                    <th> Hall Name </th>
                                    <th>Slots Time</th>
                                    <th>Operation</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($auditoriumSlots as $auditoriumSlot)
                                <tr>

                                    <td>{{getHallsName($auditoriumSlot->hall_id)->pluck('auditorium_hall_name')->first()}}</td>
                                    <td>
                                        {{$auditoriumSlot->slots_time}}
                                    </td>

                                    <td>

                                        <a href="{{" /admin/delete-slots/".encryptId($auditoriumSlot['id'])}}" class="btn btn-danger sm"
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

        // Validate Date
        if ($('#address').val().trim() === '') {
        toastr.error('Address is required.');
        $('#address').css('border', '1px solid red');
        isValid = false;
        }



        if (!isValid) {
        e.preventDefault(); // Prevent form submission if validation fails
        }
        });
        });
</script>

@endsection
