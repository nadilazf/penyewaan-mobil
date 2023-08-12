@php
    $routeActive = Route::currentRouteName();
@endphp

<li class="nav-item">
    <a class="nav-link {{ $routeActive == 'home' ? 'active' : '' }}" href="{{ route('home') }}">
        <i class="ni ni-tv-2 text-primary"></i>
        <span class="nav-link-text">Dashboard</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ $routeActive == 'kendaraans.index' ? 'active' : '' }}" href="{{ route('kendaraans.index') }}">
        <i class="fas fa-car text-warning"></i>
        <span class="nav-link-text">Kendaraan</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ $routeActive == 'titips.index' ? 'active' : '' }}" href="{{ route('titips.index') }}">
        <i class="fas fa-car text-warning"></i>
        <span class="nav-link-text">Penitipan</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ $routeActive == 'sewas.index' ? 'active' : '' }}" href="{{ route('sewas.index') }}">
        <i class="fas fa-car text-warning"></i>
        <span class="nav-link-text">Penyewaan</span>
    </a>
</li>

