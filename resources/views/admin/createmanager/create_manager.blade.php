@extends('admin_master')
@section('title', 'Create manager')
@section('admin')



    <div class="page-content">
        <div class="container-fluid">
            {{-- <div class="card">
                <div class="card-body">
                    <h4 class="text-muted text-center font-size-18"><b>Register</b></h4>

                    <div class="p-3">
                        <form class="form-horizontal mt-3" action="" method="post">
                            @csrf

                            <input type="hidden" name="role_type" value="manager">

                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <input class="form-control" id="name" type="text" name="name"
                                        :value="old('name')" required>
                                </div>
                            </div>

                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <input class="form-control" id="email" type="email" name="email"
                                        :value="old('email')" placehoslder="Enter email">
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <input class="form-control" id="phone_number" type="number" name="phone_number"
                                        :value="old('phone_number')" placehoslder="Enter email">
                                </div>
                            </div>

                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <input class="form-control" id="password" class="block mt-1 w-full" type="password"
                                        name="password" required>
                                </div>
                            </div>

                            <div class="form-group text-center row mt-3 pt-1">
                                <div class="col-12">
                                    <button class="btn btn-info w-100 waves-effect waves-light" type="submit">
                                        {{ __('Register') }}</button>
                                </div>
                            </div>
                        </form>
                        <!-- end form -->
                    </div>
                </div>
                <!-- end cardbody -->
            </div> --}}

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Create Manager</h4>
                            @php
                                $auditoriumData = App\Models\Auditorium::all();
                            @endphp

                            <form class="form-horizontal mt-3" action="{{ route('store.manager') }}" method="post">
                                @csrf

                                <input type="hidden" name="role_type" value="manager">
                                <div class="form-group mb-3 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Choose
                                        Auditorium</label>
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

                                <div class="form-group mb-3 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"> Name</label>
                                    <div class="col-sm-10">


                                        <input class="form-control" id="name" type="text" name="name"
                                            :value="old('name')" placeholder="enter name" required>
                                    </div>
                                </div>

                                <div class="form-group mb-3 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"> Email</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="email" type="email" name="email"
                                            :value="old('email')" placeholder="Enter email">
                                    </div>
                                </div>
                                <div class="form-group mb-3 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">phone number</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="phone_number" type="numeric" name="phone_number"
                                            :value="old('phone_number')" placeholder="enter number">
                                    </div>
                                </div>

                                <div class="form-group mb-3 row">

                                    <label for="example-text-input" class="col-sm-2 col-form-label">password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="password" class="block mt-1 w-full" type="password"
                                            name="password" placeholder="enter password" required>
                                    </div>
                                </div>



                                <button class="btn btn-success btn-rounded waves-effect waves-light" type="submit">
                                    {{ __('Register') }}</button>


                            </form>
                            <!-- end row -->

                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
            <!-- end card -->

            @php
                $getMangerData = App\Models\User::where('role_type', 'manager')->get();
            @endphp
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
                                        <th>Auditorium Name</th>
                                        <th>Email</th>
                                        <th>Operation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i = 1)

                                    @foreach ($getMangerData as $item)
                                        <tr>
                                            <td scope="row">{{ $i++ }}</td>
                                            <td scope="row">{{ $item?->name }}</td>

                                            <td>
                                                {{ getByAuditoriumName($item->auditorium_id) }}
                                            </td>
                                            <td>
                                                {{ $item->email }}
                                            </td>
                                            <td>
                                                <a href="{{ '/edit-manager/' . encryptId($item['id']) }}"
                                                    class="btn btn-info sm" title="Edit Event"> <i
                                                        class="fas fa-edit"></i></a>

                                                <a href="{{ '/delete-manager' . encryptId($item['id']) }}"
                                                    class="btn btn-danger sm" title="Delete Data" id="delete"> <i
                                                        class="fas fa-trash"></i></a>
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
        <!-- end container -->
    </div>




@endsection
