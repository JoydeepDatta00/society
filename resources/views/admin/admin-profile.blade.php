@extends('admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Edit Profile page</h4>
                        <form action="{{route('store.profile')}}" method="Post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$editData->id}}">
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{$editData->name}}" name="name"
                                        id="example-text-input">
                                </div>
                            </div>

                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{$editData->email}}"
                                        name="email" id="example-text-input">
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Old password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="password" value="" name="oldpassword"
                                        id="oldpassword">
                                </div>
                            </div>

                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">New password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="password" value="" name="newpassword"
                                        id="newpassword">
                                </div>
                            </div>

                            <!-- end row -->

                            <!-- end row -->
                            <input type="submit" class="btn btn-success btn-rounded waves-effect waves-light"
                                name="submit" value="update Profile">

                        </form>
                        <!-- end row -->
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>


@endsection
