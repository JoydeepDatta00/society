<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
            </div>
            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="ri-menu-2-line align-middle"></i>
            </button>

            <!-- App Search-->
            <!--<form class="app-search d-none d-lg-block">-->
            <!--    <div class="position-relative">-->
            <!--        <input type="text" class="form-control" placeholder="Search...">-->
            <!--        <span class="ri-search-line"></span>-->
            <!--    </div>-->
            <!--</form>-->

            <!--<div class="dropdown dropdown-mega d-none d-lg-block ms-2">-->
            <!--    <button type="button" class="btn header-item waves-effect" data-bs-toggle="dropdown"-->
            <!--        aria-haspopup="false" aria-expanded="false">-->
            <!--        Mega Menu-->
            <!--        <i class="mdi mdi-chevron-down"></i>-->
            <!--    </button>-->
            <!--    <div class="dropdown-menu dropdown-megamenu">-->

            <!--    </div>-->
            <!--</div>-->
        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block">
                {{--
                    {{-- <i class="ri-settings-2-line"></i>
                --}}
                {{-- <button type="button" class="btn header-item waves-effect"><span>Hall
                        Name:</span>{{ getByAuditoriumName(Auth::user()->auditorium_id) }}</button> --}}
            </div>

            <div class="dropdown d-inline-block user-dropdown">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    {{-- <span class="d-none d-xl-inline-block ms-1">{{ Auth::user()->name }}</span> --}}
                    <i class="ri-settings-2-line d-none d-xl-inline-block"></i>
                </button>

                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    @if (Auth::check() && Auth::user()->role_type === 'chairman')
                        <a class="dropdown-item" href="/admin/edit/profile"><i
                                class="ri-user-line align-middle me-1"></i>
                            Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="{{ route('admin.logout') }}"><i
                                class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout</a>
                </div>
            @elseif (Auth::check() && Auth::user()->role_type === 'manager')
                <a class="dropdown-item text-danger" href="{{ route('admin.logout') }}"><i
                        class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout</a>
                @endif
            </div>



        </div>
    </div>
</header>
