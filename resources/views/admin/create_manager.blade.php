<!doctype html>
<html lang="en">

<head>

    @include('links.head')

</head>

<body class="auth-body-bg">
    <div class="bg-overlay"></div>
    <div class="wrapper-page">
        <div class="container-fluid p-0">
            <div class="card">
                <div class="card-body">

                    <div class="text-center mt-4">
                        <div class="mb-3">
                            <a href="index.html" class="auth-logo">

                            </a>
                        </div>
                    </div>

                    <h4 class="text-muted text-center font-size-18"><b>Register</b></h4>
                    <div class="p-3">
                        <form class="form-horizontal mt-3" action="index.html">

                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <input class="form-control" type="email" required="" placeholder="Email">
                                </div>
                            </div>

                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <input class="form-control" type="password" required="" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="form-label ms-1 fw-normal" for="customCheck1">I accept <a
                                                href="#" class="text-muted">Terms and Conditions</a></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-center row mt-3 pt-1">
                                <div class="col-12">
                                    <button class="btn btn-info w-100 waves-effect waves-light"
                                        type="submit">Register</button>
                                </div>
                            </div>
                        </form>
                        <!-- end form -->
                    </div>
                </div>
                <!-- end cardbody -->
            </div>
            <!-- end card -->
        </div>
        <!-- end container -->
    </div>
    <!-- end -->


    @include('links.footerlink')

</body>

</html>
