<!-- Sidebar Blade - side.blade.php -->
<div class="sidebar">
    <ul class="sidebar-nav">
        <li><a href="{{ route('home') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
        <li><a href="{{route('employee.index')}}"><i class="fas fa-users"></i> Employees</a></li>
        <li>
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                {{ __('Logout ') }} <i class="fas fa-sign-out-alt"></i>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            </li>
    </ul>
</div>
