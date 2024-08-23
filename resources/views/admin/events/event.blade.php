@extends('admin_master')
@section('title','Event')
@section('admin')
<div class="page-content">
 <div class="container-fluid">


    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Add Event</h4>
              <form action="{{ route('admin.storeEvents') }}"  method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text"  name="event_name" id="events_name">
                        <span class="text-danger">
                            @error('name')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                </div>

                <div class="input-group" id="datepicker2">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Event Date</label>
                    <input type="date" class="form-control" placeholder="dd-MM-yyyy"
                        data-date-format="yyyy-mm-dd" data-date-container='#datepicker2' data-provide="datepicker"
                        data-date-autoclose="true"  id="event_date" name="event_date">

                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                </div><!-- input-group -->

                <div class="row mb-3 mt-4">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="event_description" id="events_description" >

                        <span class="text-danger">
                            @error('description')
                            {{$message}}
                            @enderror
                        </span>

                    </div>
                </div>
                <div class="input-group mb-3 mt-4">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Choose Image</label>
                    <input type="file" class="form-control" name="event_thumbnail_image" id="customFile"  accept="image/*">
                </div>


             <input type="submit"  class="btn btn-success btn-rounded waves-effect waves-light"   name="submit" value="Add Events " id="submitBtn">

                </form>
                <div class="mt-4 text-danger"> Note:Click in add icon to  add event image  required* </div>

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
        if ($('#events_name').val().trim() === '') {
       toastr.error('Description is required.');
        $('#events_name').css('border', '1px solid red');
        isValid = false;
        }

        // Validate Date
        if ($('#events_date').val().trim() === '') {
        toastr.error('Event date is required.');
        $('#events_date').css('border', '1px solid red');
        isValid = false;
        }

        // Validate Description
        if ($('#events_description').val().trim() === '') {
       toastr.error('Description is required.');
        $('#events_description').css('border', '1px solid red');
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
                                     <th>Event Date </th>
                                     <th>Event thumbnail</th>
                                    <th>Operation</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i=1)
                                @foreach($events as $item)
                                <tr>
                                    <td scope="row">{{$i++}}</td>
                                    <td>{{$item->events_name}}</td>
                                    <td>
                                        {{$item->events_date}}
                                    </td>

                                <td>
                                  @if($item->events_thumbnail_image)
                                   <img src="{{ Storage::url($item?->events_thumbnail_image) }}" alt="Event Thumbnail"  class="img-thumbnail" style="max-width: 100px; max-height: 100px;">
                                  @else
                                   <span>No image</span>
                                  @endif
                                  </td>
                                  <td>
                                        <a href="{{"/admin/events-images/".encryptId($item['id'])}}" class="btn btn-success sm" title="Add Gallery"> <i class=" fas fa-plus "></i></a>
                                        <a href="{{"/admin/edit-event/".encryptId($item['id'])}}" class="btn btn-info sm" title="Edit Event"> <i class="fas fa-edit"></i></a>
                                        <a href="{{"/admin/delete-events/".encryptId($item['id'])}}" class="btn btn-danger sm" title="Delete Data" id="delete"> <i class="fas fa-trash"></i></a>
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
