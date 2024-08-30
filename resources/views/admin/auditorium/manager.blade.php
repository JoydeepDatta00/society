@extends('admin_master')
@section('title', 'Manager')
@section('admin')


<div class="page-content">
    <div class="container-fluid">


        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Add Manager</h4>
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3 mt-4">
                            {{-- <div class="mb-0"> --}}
                                <label for="example-text-input" class="col-sm-2 col-form-label"> Choose Auditorium
                                </label>
                                <div class="col-sm-10">
                                    <select class="form-control select2-search-disable" name="auditorium_id"
                                        id="auditorium_id">
                                        <option>Click here and Choose the option</option>
                                      
                                            <option value="gggg">ggg</option>
                                        
                                    </select>
                                </div>

                            </div>




                            <div class="row mb-3 mt-4">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Manager Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="services_name" id="services_name">
                                </div>
                            </div>
                            <div class="row mb-3 mt-4">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Manager Email Id</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="service_cost" id="service_cost">
                                </div>
                            </div>
                            <div class="row mb-3 mt-4">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Manager Phone Number</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" name="service_note" id="service_note">
                                </div>
                            </div>
                            <div class="row mb-3 mt-4">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="password" name="service_note" id="service_note">
                                </div>
                            </div>
                            <input type="submit" class="btn btn-success btn-rounded waves-effect waves-light"
                                name="submit" value="Add Manager" id="submitBtn">

                    </form>


                    <!-- end row -->
                </div>
            </div>
            



        </div> <!-- end col -->
    </div>
</div>

@endsection