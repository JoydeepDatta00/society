@extends('admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Buttons Example</h4>
                        <p class="card-title-desc">The Buttons extension for DataTables
                        </p>
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>phone</th>
                                    <th>Feedback</th>
                                </tr>
                            </thead>


                            <tbody>
                                @foreach ($feedbacks as $feedback )
                                     <tr>
                                        <td>{{ $feedback->name }}</td>
                                        <td>{{ $feedback->phone }}</td>
                                        <td>{{ $feedback->feedback }}</td>

                                    </tr>
                                @endforeach



                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>

@endsection
