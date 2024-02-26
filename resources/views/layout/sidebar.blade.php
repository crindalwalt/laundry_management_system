<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            Paradise
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <style>
        .pillish {
            background-color: #efefef !important;
            padding: .5rem !important;
            border-radius: .5rem !important;
            margin: .3rem 0rem;
        }
    </style>
    <div class="sidebar-body">
        <ul class="nav">
{{--            <li class="nav-item nav-category">Main</li>--}}
{{--            <li class=" pillish nav-item {{ active_class(['/']) }}">--}}
{{--                <a href="{{ url('/') }}" class="nav-link">--}}
{{--                    <i class="link-icon" data-feather="box"></i>--}}
{{--                    <span class="link-title">Dashboard</span>--}}
{{--                </a>--}}
{{--            </li>--}}
            {{--` ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++--}}
            <li class="nav-item nav-category">Actions</li>

            <li class="pillish nav-item ">
                <a class="nav-link" data-bs-toggle="collapse" href="#advancedUI" role="button" aria-expanded="false" aria-controls="advancedUI">
                    <i class="link-icon" data-feather="target"></i>
                    <span class="link-title">Jobs</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="advancedUI">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route("jobs.all") }}" class="nav-link">Today Jobs</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route("jobs.yesterday") }}" class="nav-link">Yesterday Jobs</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route("jobs.history") }}" class="nav-link">Job History</a>
                        </li>

                    </ul>
                </div>
            </li>
            <li class="pillish nav-item {{ active_class(['Jobs/*']) }}">
                <a class="nav-link" href="{{ route("customer.all") }}" class="py-2 px-3 bg-amber-50">
                    <i class="link-icon" data-feather="user"></i>
                    <span class="link-title">All Customer</span>
                </a>
            </li>
            <li class="pillish nav-item {{ active_class(['Jobs/add']) }}">
                <a class="nav-link" href="{{ route("jobs.add") }}" class="py-2 px-3 bg-amber-50">
                    <i class="link-icon" data-feather="plus"></i>
                    <span class="link-title">Add Job</span>
                </a>
            </li>
            <li class="pillish nav-item {{ active_class(['Jobs/show']) }}">
                <a class="nav-link" href="{{ route("transection.all") }}" class="py-2 px-3 bg-amber-50">
                    <i class="link-icon" data-feather="dollar-sign"></i>
                    <span class="link-title">Transections</span>
                </a>
            </li>


        </ul>
    </div>
</nav>

