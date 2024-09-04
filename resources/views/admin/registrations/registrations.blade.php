@extends('admin_master')
@section('title','Registrations')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Bookings</h4>


                       <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Organization Name</th>
                                    <th>Date</th>
                                    <th>Auditorium</th>
                                    <th>Services</th>
                                    <th>Operations</th>
                                </tr>
                            </thead>


                            <tbody>
                                @foreach($bookings as $booking)
                                <tr>
                                    <td>{{ $booking->name }}</td>
                                    <td>{{ $booking->email }}</td>
                                    <td>{{ $booking->phone }}</td>
                                    <td>{{ $booking->organization_name }}</td>
                                    <td>{{ $booking->date }}</td>
                                    <td>{{ getByAuditoriumName($booking->choose_auditorium)->pluck('name')->first() }}</td>
                                    <td>{{ getHallsByAuditoriumId($booking->auditorium_hall)->pluck('auditorium_hall_name')->first() }}</td>
                                    <td>{{ $booking->choose_slots }}</td>
                                    <td>{{ $booking->services}}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td>Bishal</td>
                                    <td>ABC Organization</td>
                                    <td>10/09/2024</td>
                                    <td>ABC Auditorium</td>
                                    <td>Service A, Service B</td>
                                    <td><button class="btn btn-primary">Manage</button></td>
                                </tr>
                                <tr>
                                    <td>Joydeep</td>
                                    <td>PQR Organization</td>
                                    <td>17/09/2024</td>
                                    <td>ABC Auditorium</td>
                                    <td>Service A, Service D</td>
                                    <td><button class="btn btn-primary">Manage</button></td>
                                </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>

    </div>
</div>



@endsection
