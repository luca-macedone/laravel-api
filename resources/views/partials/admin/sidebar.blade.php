<!-- Left Side Of Navbar -->
<ul class="navbar-nav p-3">
    {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">{{ __('Home') }}</a>
                </li> --}}
    <li class="nav-item">
        <a class="nav-link p-3 {{ Route::currentRouteName() === 'admin.dashboard' ? 'border border-dark active' : '' }}"
            href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link p-3 {{ Route::currentRouteName() === 'admin.projects.index' ? 'border border-dark active' : '' }}"
            href="{{ route('admin.projects.index') }}">{{ __('Projects') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link p-3 {{ Route::currentRouteName() === 'admin.types.index' ? 'border border-dark active' : '' }}"
            href="{{ route('admin.types.index') }}">{{ __('Types') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link p-3 {{ Route::currentRouteName() === 'admin.technologies.index' ? 'border border-dark active' : '' }}"
            href="{{ route('admin.technologies.index') }}">{{ __('Technologies') }}</a>
    </li>
</ul>
