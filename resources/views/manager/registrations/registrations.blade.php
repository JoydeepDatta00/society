@extends('admin_master')
@section('title', 'Registrations')
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
                                        <th>Status</th>
                                        <th>Operations</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($bookings as $booking)
                                        <tr>
                                            <td>{{ $booking->name }}</td>

                                            {{-- <td>{{ $booking->phone }}</td> --}}
                                            <td>{{ $booking->organization_name }}</td>
                                            <td>{{ $booking->date }}</td>
                                            <td>{{ getByAuditoriumName($booking->choose_auditorium) }}

                                            </td>
                                            <td>{{ $booking->services }}</td>
                                            {{-- <td>{{ getHallsByAuditoriumId($booking->auditorium_hall)->pluck('auditorium_hall_name')->first() }}
                                            </td> --}}
                                            <td>
                                                @if ($booking->allowed_status == 'Approved')
                                                    <span class="badge rounded-pill bg-success fs-6 text">Approved</span>
                                                @elseif($booking->allowed_status == 'Rejected')
                                                    <span class="badge rounded-pill bg-danger fs-6 text">Rejected</span>
                                                @else
                                                    <span class="badge rounded-pill bg-warning fs-6 text">Pending</span>
                                                @endif
                                                <!-- -->
                                            </td>
                                            {{-- @if (Auth::user()->role_type === 'manager')
                                                <td><a href="/manager/full-registrations/{{ encryptId($booking->id) }}"
                                                        class="btn btn-primary">Manage</a></td>
                                            @elseif(Auth::user()->role_type === 'chairman') --}}
                                            <td>
                                                {{-- <a href="/chairman/full-registrations/{{ encryptId($booking->id) }}"
                                                        class="btn btn-primary m-1">add promotion</a> --}}
                                                <a href="/manager/full-registrations/{{ encryptId($booking->id) }}"
                                                    class="btn btn-primary">Manage</a>
                                            </td>
                                            {{-- @else
                                            @endif --}}

                                        </tr>
                                    @endforeach

                                    {{-- <tr>
                                        <td>Joydeep</td>
                                        <td>PQR Organization</td>
                                        <td>17/09/2024</td>
                                        <td>ABC Auditorium</td>
                                        <td>Service A, Service D</td>
                                        <td>
                                            <span class="badge rounded-pill bg-success fs-6 text">Approved</span>
                                            <!-- <span class="badge rounded-pill bg-warning fs-6 text">Pending</span>
                                                                        <span class="badge rounded-pill bg-danger fs-6 text">Rejected</span> -->
                                        </td>
                                        <td><a href="/admin/full-registrations" class="btn btn-primary">Manage</a></td>
                                    </tr> --}}


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>

        </div>
    </div>



@endsection
