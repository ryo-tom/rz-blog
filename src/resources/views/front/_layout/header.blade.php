<header class="layout-header">
    <div class="header-container">
        {{-- Site Title --}}
        <div class="site-title-box">
            <a href="{{ route('home') }}" class="site-title">
                <div class="main-title">Rz Note</div>
                <div class="sub-title">with <span>Laravel</span></div>
            </a>
        </div>

        {{-- Search Form --}}
        <div id="searchModalTrigger" class="search-box">
            <span class="material-symbols-outlined">
                search
            </span>
            <div class="placeholder">
                Search
            </div>
        </div>

        {{-- Mobile Navigation Button --}}
        <div id="mobileNavTrigger" class="mobile-nav-btn"></div>

        {{-- PC Navigation --}}
        <nav class="pc-nav">
            <ul class="nav-list">
                <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">HOME</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Profile</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Contact</a></li>
            </ul>
        </nav>
    </div>
</header>

{{-- Mobile Navigation --}}
<nav id="mobileNav" class="mobile-nav collapse">
    <ul class="nav-list">
        <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">HOME</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Profile</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Contact</a></li>
    </ul>
</nav>
