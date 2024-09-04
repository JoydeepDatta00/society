@extends('admin_master')
@section('title', 'Registrations')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">



                <button class="btn btn-info mb-2">Back</button>
                <div class="row">
                    <div class="col-md-7">
                        <div class="card">
                            <div class="card-body">
                                <div class="row p-4">
                                    <h2 class="mb-2 d-flex justify-content-between">Booking Details

                                        <div class="">
                                            <span class="badge rounded-pill bg-success fs-6 text">Approved</span>
                                            <!-- <span class="badge rounded-pill bg-warning fs-6 text">Pending</span>
                                            <span class="badge rounded-pill bg-danger fs-6 text">Rejected</span> -->
                                        </div>
                                    </h2>
                                    <hr>

                                    <div class="col-md-6">
                                        <p class="mb-0">Date</p>
                                        <h4 class="mb-4">10/08/2024</h4>

                                        <p class="mb-0">Name</p>
                                        <h4 class="mb-4">Bishal Acharjee</h4>

                                        <p class="mb-0">Organization Name</p>
                                        <h4 class="mb-4">ABC Organization</h4>

                                        <p class="mb-0">Event Name</p>
                                        <h4 class="mb-0">Event Abcd Pqrs</h4>

                                    </div>
                                    <div class="col-md-6">
                                        <p class="mb-0">Url for webcasting</p>
                                        <h4 class="mb-4"><a href="#">www.webcastinglink.com</a></h4>

                                        <p class="mb-0">Auditorium</p>
                                        <h4 class="mb-4">ABC Auditorium</h4>

                                        <p class="mb-0">Hall</p>
                                        <h4 class="mb-4">Hall C</h4>

                                        <p class="mb-0">Slots</p>
                                        <h4 class="mb-4">10:00 - 14:00</h4>

                                        <p class="mb-0">Service</p>
                                        <h4 class="mb-4"><span>Service A</span>, <span>Service B</span></h4>
                                    </div>
                                    <div class="col-md-12">
                                        <p class="mb-0">Event Emage</p>
                                        <img src="https://images.pexels.com/photos/976866/pexels-photo-976866.jpeg?auto=compress&cs=tinysrgb&w=600"
                                            class="img-fluid" alt="...">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="mb-2">Change Status</h2>
                                <hr>
                                <form action="">
                                    <select class="form-select mb-3" aria-label="Default select example">
                                        <option value="Pending">Pending</option>
                                        <option value="Approved">Approved</option>
                                        <option value="Rejected">Rejected</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h2 class="mb-2">Promotions</h2>
                                <hr>
                                <div class="border-bottom border-secondary mb-4">
                                    <span class="badge badge-soft-dark mb-1">03/09/2024</span>
                                    <h6><a href="https://www.youtube.com/watch?v=dcadn-Wvwqo"
                                            target="_blank">https://www.youtube.com/watch?v=dcadn-Wvwqo</a></h6>

                                </div>
                                <div class="border-bottom border-secondary mb-4">
                                    <span class="badge badge-soft-dark mb-1">01/09/2024</span>
                                    <h6><a href="https://www.youtube.com/watch?v=dcadn-Wvwqo"
                                            target="_blank">https://www.youtube.com/watch?v=dcadn-Wvwqo</a></h6>

                                </div>
                                <div class="border-bottom border-secondary mb-4">
                                    <span class="badge badge-soft-dark mb-1">29/08/2024</span>
                                    <img src="https://images.pexels.com/photos/976866/pexels-photo-976866.jpeg?auto=compress&cs=tinysrgb&w=600"
                                    class="img-fluid" alt="...">

                                </div>


                            </div>
                        </div>
                    </div>
                </div>

            </div>



        </div> <!-- end col -->
    </div>

</div>
</div>



@endsection