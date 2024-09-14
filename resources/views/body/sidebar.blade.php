<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!-- User details -->


        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">


                @if (Auth::check() && Auth::user()->role_type === 'chairman')
                    <li>
                        <a href="/chairman/dashboard" class="waves-effect">
                            <i class="ri-dashboard-line"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="/chairman/banners" class=" waves-effect">
                            <i class="ri-calendar-2-line"></i>
                            <span>Add Banners</span>
                        </a>
                    </li>
                    {{-- <li>
                        <a href="{{ route('admin.events') }}" class=" waves-effect">
                            <i class="ri-calendar-2-line"></i>
                            <span>Events</span>
                        </a>
                    </li> --}}
                    <li>
                        <a href="/chairman/thumbnail" class=" waves-effect">
                            <i class="ri-calendar-2-line"></i>
                            <span>Gallery</span>
                        </a>
                    </li>
                    <li>
                        <a href="/chairman/members" class="waves-effect">
                            <i class="ri-dashboard-line"></i>
                            <span>Add Members Section</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ri-map-pin-line"></i>
                            <span>Auditorium</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="/chairman/auditorium">Add Auditorium</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="/create-manager" class="waves-effect">
                            <i class="ri-dashboard-line"></i>
                            <span>Add manager</span>
                        </a>
                    </li>
                    <li>
                        <a href="  /chairman/registrations" class="waves-effect">
                            <i class="ri-dashboard-line"></i>
                            <span>Bookings/Registrations</span>
                        </a>
                    </li>

                    <li>
                        {{-- <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ri-map-pin-line"></i>
                            <span>Add Promotion Video</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="/chairman/add-promotion">Add Auditorium</a></li>
                        </ul> --}}
                        <a href=" /chairman/add-promotion" class="waves-effect">
                            <i class="ri-dashboard-line"></i>
                            <span>Add promotion</span>
                        </a>
                    </li>
                @elseif (Auth::check() && Auth::user()->role_type === 'manager')
                    <li>
                        <a href="/manager/dashboard" class="waves-effect">
                            <i class="ri-dashboard-line"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ri-map-pin-line"></i>
                            <span>Auditorium</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="/manager/create-auditorium-services">Add Auditorium Services</a></li>
                            <li><a href="/manager/auditotium-hall">Add Auditorium hall</a></li>
                            <li><a href="/manager/auditorium-slots">Add Auditorium slots</a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="/manager/registrations" class="waves-effect">
                            <i class="ri-dashboard-line"></i>
                            <span>Bookings/Registrations</span>
                        </a>
                    </li>
                    <li>
                        <a href="/manager/feedbacks" class="waves-effect">
                            <i class="ri-dashboard-line"></i>
                            <span>feedbacks/query</span>
                        </a>
                    </li>
                @else
                    <li></li>
                @endif
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
