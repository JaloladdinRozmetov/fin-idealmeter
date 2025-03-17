<!-- resources/views/layouts/sidebar.blade.php -->
<div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px; min-height: 100vh;">
    <a href="{{ route('dashboard') }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
        <span class="fs-4">Dashboard</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link {{ Request::routeIs('dashboard') ? 'active' : '' }}" aria-current="page">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                Home
            </a>
        </li>
{{--        <li>--}}
{{--            <a href="{{ route('users.index') }}" class="nav-link {{ Request::routeIs('users.*') ? 'active' : '' }}">--}}
{{--                <svg class="bi me-2" width="16" height="16"><use xlink:href="#people"></use></svg>--}}
{{--                Users--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li>--}}
{{--            <a href="{{ route('settings') }}" class="nav-link {{ Request::routeIs('settings') ? 'active' : '' }}">--}}
{{--                <svg class="bi me-2" width="16" height="16"><use xlink:href="#gear"></use></svg>--}}
{{--                Settings--}}
{{--            </a>--}}
{{--        </li>--}}
    </ul>
    <hr>
    <div class="dropdown"></div>
        <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
            <strong>Jaloladdin</strong>
        </a>
        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser">
{{--            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>--}}
            <li><hr class="dropdown-divider"></li>
            <li>
                <form method="POST" action="{{route('logout')}}">
                    @csrf
                    <a class="dropdown-item" href=""
                       onclick="event.preventDefault(); this.closest('form').submit();">
                        Sign out
                    </a>
                </form>
            </li>
        </ul>
    </div>
</div>
