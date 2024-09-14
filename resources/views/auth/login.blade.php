<!doctype html>
<html lang="en">

<head>

    @include('links.head')
    <title>@yield('title', 'login')</title> <!-- Title section -->


</head>

<body>

    <div class="wrapper-page">
        <div class="container-fluid p-0">
            <div class="card">
                <div class="card-header">Login</div>
                <div class="card-body">

                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#chairman-login" role="tab">
                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                <span class="d-none d-sm-block">Chairman Login</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#manager-login" role="tab">
                                <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                <span class="d-none d-sm-block">Manager Login</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#user-login" role="tab">
                                <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                <span class="d-none d-sm-block">User Login</span>
                            </a>
                        </li>

                    </ul>

                    <div class="tab-content" id="loginTabContent">
                        <div class="tab-pane fade show active" id="chairman-login" role="tabpanel"
                            aria-labelledby="chairman-tab">
                            <h4 class="text-muted text-center font-size-18"><b>chairman login</b></h4>
                            <div class="p-3">
                                <form class="form-horizontal mt-3" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <input type="hidden" name="role_type" value="chairman">
                                    <div class="form-group mb-3 row">
                                        <div class="col-12">
                                            <input class="form-control" id="email" name="email"
                                                :value="old('email')" required placeholder="Email">
                                        </div>
                                    </div>

                                    <div class="form-group mb-3 row">
                                        <div class="col-12">
                                            <input class="form-control" id="password" type="password" name="password"
                                                required placeholder="Password">
                                        </div>
                                    </div>

                                    <div class="form-group mb-3 row">
                                        <div class="col-12">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                <label class="form-label ms-1" for="customCheck1">Remember me</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3 text-center row mt-3 pt-1">
                                        <div class="col-12">
                                            <button class="btn btn-info w-100 waves-effect waves-light" type="submit">
                                                {{ __('Log in') }}</button>
                                        </div>
                                    </div>

                                    <div class="form-group mb-0 row mt-2">
                                        <div class="col-sm-7 mt-3">
                                            <a href="auth-recoverpw.html" class="text-muted"><i
                                                    class="mdi mdi-lock"></i>
                                                Forgot
                                                your password?</a>
                                        </div>
                                        <div class="col-sm-5 mt-3">
                                            <a href="" class="text-muted"><i class="mdi mdi-account-circle"></i>
                                                Create an account</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!------manager login--------->
                        <div class="tab-pane fade" id="manager-login" role="tabpanel" aria-labelledby="manager-tab">
                            <h4 class="text-muted text-center font-size-18"><b>manager login</b></h4>

                            <div class="p-3">
                                <form class="form-horizontal mt-3" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <input type="hidden" name="role_type" value="manager">
                                    <div class="form-group mb-3 row">
                                        <div class="col-12">
                                            <input class="form-control" id="email" name="email"
                                                :value="old('email')" required placeholder="Email">
                                        </div>
                                    </div>

                                    <div class="form-group mb-3 row">
                                        <div class="col-12">
                                            <input class="form-control" id="password" type="password"
                                                name="password" required placeholder="Password">
                                        </div>
                                    </div>

                                    <div class="form-group mb-3 row">
                                        <div class="col-12">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="customCheck1">
                                                <label class="form-label ms-1" for="customCheck1">Remember me</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3 text-center row mt-3 pt-1">
                                        <div class="col-12">
                                            <button class="btn btn-info w-100 waves-effect waves-light"
                                                type="submit">
                                                {{ __('Log in') }}</button>
                                        </div>
                                    </div>

                                    <div class="form-group mb-0 row mt-2">
                                        <div class="col-sm-7 mt-3">
                                            <a href="auth-recoverpw.html" class="text-muted"><i
                                                    class="mdi mdi-lock"></i>
                                                Forgot
                                                your password?</a>
                                        </div>
                                        <div class="col-sm-5 mt-3">
                                            <a href="" class="text-muted"><i
                                                    class="mdi mdi-account-circle"></i>
                                                Create an account</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-------user login------->
                        <div class="tab-pane fade" id="user-login" role="tabpanel" aria-labelledby="user-tab">
                            <h4 class="text-muted text-center font-size-18"><b>User login</b></h4>

                            <div class="p-3">
                                <form class="form-horizontal mt-3" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <input type="hidden" name="role_type" value="user">
                                    <div class="form-group mb-3 row">
                                        <div class="col-12">
                                            <input class="form-control" id="email" name="email"
                                                :value="old('email')" required placeholder="Email">
                                        </div>
                                    </div>

                                    <div class="form-group mb-3 row">
                                        <div class="col-12">
                                            <input class="form-control" id="password" type="password"
                                                name="password" required placeholder="Password">
                                        </div>
                                    </div>

                                    <div class="form-group mb-3 row">
                                        <div class="col-12">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="customCheck1">
                                                <label class="form-label ms-1" for="customCheck1">Remember me</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3 text-center row mt-3 pt-1">
                                        <div class="col-12">
                                            <button class="btn btn-info w-100 waves-effect waves-light"
                                                type="submit">
                                                {{ __('Log in') }}</button>
                                        </div>
                                    </div>

                                    <div class="form-group mb-0 row mt-2">
                                        <div class="col-sm-7 mt-3">
                                            <a href="auth-recoverpw.html" class="text-muted"><i
                                                    class="mdi mdi-lock"></i>
                                                Forgot
                                                your password?</a>
                                        </div>
                                        <div class="col-sm-5 mt-3">
                                            <a href="/user-registration" class="text-muted"><i
                                                    class="mdi mdi-account-circle"></i>
                                                Create an account</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <!-- end cardbody -->
        </div>
        <!-- end card -->
    </div>
    <!-- end container -->
    {{-- </div>
    </div> --}}
    <!-- end -->

    @include('links.footerlink')
</body>

</html>
