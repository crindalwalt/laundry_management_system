<nav class="navbar">
  <a href="#" class="sidebar-toggler">
    <i data-feather="menu"></i>
  </a>
  <div class="navbar-content">

    <ul class="navbar-nav">



      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img class="wd-30 ht-30 rounded-circle" src="{{ url('https://cdn.pixabay.com/photo/2014/04/03/11/47/avatar-312160_1280.png') }}" alt="profile">
        </a>
        <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
          <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
            <div class="mb-3">
              <img class="wd-80 ht-80 rounded-circle" src="{{ url('https://cdn.pixabay.com/photo/2014/04/03/11/47/avatar-312160_1280.png') }}" alt="">
            </div>
            <div class="text-center">
              <p class="tx-16 fw-bolder">{{ \Illuminate\Support\Facades\Auth::user()->name }}</p>
              <p class="tx-12 text-muted">{{ \Illuminate\Support\Facades\Auth::user()->email }}</p>
            </div>
          </div>
          <ul class="list-unstyled p-1">


            <li class="dropdown-item py-2">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <i class="me-2 icon-md" data-feather="log-out"></i>

                    <button type="submit" class="text-body ms-0 btn btn-sm btn-danger">Logout</button>
                </form>
{{--              <a href="javascript:;" class="text-body ms-0">--}}
{{--                <i class="me-2 icon-md" data-feather="log-out"></i>--}}
{{--                <span>Log Out</span>--}}
{{--              </a>--}}
            </li>
          </ul>
        </div>
      </li>
    </ul>
  </div>
</nav>
