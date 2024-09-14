@extends('admin_master')
@section('title', 'Auditorium Services')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">


            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Add Banner Promotions</h4>
                        <form action="{{ Route('chairman.storepromotion') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            {{-- <div class="row mb-3 mt-4">

                            <label for="example-text-input" class="col-sm-2 col-form-label"> Auditorium Name </label>
                            <div class="col-sm-10">

                                <input type="hidden" name="auditorium_id" id="auditorium_id"
                                    value="{{ $auditoriumData->id }}">
                                <input class="form-control" type="text"
                                    value="{{ getByAuditoriumName($auditoriumData->id) }}" @readonly(true)>

                            </div>

                    </div> --}}




                            <div class="row mb-3 mt-4">
                                <label for="example-text-input" class="col-sm-2 col-form-label">youtube Iframe link or other
                                    link</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="iframe_links" id="iframe_links">
                                </div>
                            </div>
                            <div class="row mb-3">

                                <div class="input-group">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Choose Image</label>
                                    <input type="file" class="form-control" name="promotion_images" id="customFile">
                                </div>

                            </div>

                            <input type="submit" class="btn btn-success btn-rounded waves-effect waves-light"
                                name="submit" value="Add Promotions " id="submitBtn">

                        </form>


                        <!-- end row -->
                    </div>
                </div>
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
                                            <th>Promotion content</th>
                                            <th>Operation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php($i = 1)

                                        @foreach ($promotion as $item)
                                            <tr>
                                                <td scope="row">{{ $i++ }}</td>
                                                @if ($item->promotion_images)
                                                    <td>
                                                        <img class="img-thumbnail" style="width: 150px; height:150px"
                                                            src="{{ Storage::url($item->promotion_images) }}">
                                                    </td>
                                                @elseif($item->iframe_links)
                                                    <td scope="row">
                                                        <div style="width: 400px;  overflow: hidden;">
                                                            {{ $item?->iframe_links }}
                                                        </div>
                                                    </td>
                                                @else()
                                                    <td scope="row">No data Found</td>
                                                @endif
                                                <td>


                                                    <a href="{{ ' /delete-promotions/ ' . encryptId($item['id']) }}"
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
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                {{-- <script>
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
                </script> --}}



            </div> <!-- end col -->
        </div>
    </div>


@endsection
