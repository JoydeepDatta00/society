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
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Organization Name</th>
                                    <th>date</th>
                                    <th>choose Auditorium</th>
                                    <th>Auditorium hall</th>
                                    <th>Slots</th>
                                    <th>Services</th>
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


                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>

    </div>
</div>

@endsection
