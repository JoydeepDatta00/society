@extends('admin_master')
@section('admin')

<div class="page-content">
 <div class="container-fluid">


    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Add Thumbnail  Image</h4>
              <form action="{{ route('admin.addthumbnail') }}"  method="post" enctype="multipart/form-data">
                @csrf

                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text"  name="name" id="example-text-input" >
                    </div>
                </div>


                    <div class="row mb-3">

                    <div class="input-group">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Choose Image</label>
                        <input type="file" class="form-control" name="gallery_thumbnail" id="customFile" >
                    </div>
                </div>

             <input type="submit"  class="btn btn-success btn-rounded waves-effect waves-light"   name="submit" value="Add Thumbnail">

         </form>
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
                                   <th>Event Name</th>
                                    <th>Title </th>
                                    <th>Image</th>

                                    <th>Operation</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i=1)
                                @foreach($thumbnail as $item)
                                <tr>
                                    <td scope="row">{{$i++}}</td>

                                     <td>{{$item->name}}</td>

                                    <td>
                                        <img  class="img-thumbnail" style="width: 150px; height:60px" src="{{ Storage::url($item?->gallery_thumbnail) }}">

                                    </td>
                                    <td>

                                        <a href="{{"/admin/gallery-images/".encryptId($item['id'])}}" class="btn btn-success sm" title="Add Gallery"> <i class=" fas fa-plus "></i></a>
                                        <a href="{{"/admin/edit_thumbnail/".encryptId($item['id'])}}" class="btn btn-info sm" title="edit Data"> <i class="fas fa-edit"></i></a>
                                        <a href="{{"/admin/delete-thumbnail/".encryptId($item['id'])}}" class="btn btn-danger sm" title="Delete Data" id="delete"> <i class="fas fa-trash"></i></a>
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
