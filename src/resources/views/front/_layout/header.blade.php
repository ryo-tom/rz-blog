<header class="layout-header">
    <div class="header-container">
        {{-- Site Title --}}
        <div class="site-title-box">
            <a href="{{ route('home') }}" class="site-title">
                <div class="main-title">Rz Blog</div>
            </a>
        </div>

        {{-- Search Form --}}
        <div id="searchModalTrigger" class="search-box">
            <span class="search-icon-wrapper">
                <span class="material-symbols-outlined">
                    search
                </span>
                <div class="placeholder">
                    Search
                </div>
            </span>
            <span class="shortcut-keys">
                <kbd class="shortcut-key">⌘</kbd>
                <kbd class="shortcut-key">K</kbd>
            </span>
        </div>

        {{-- Mobile Navigation Button --}}
        <div id="mobileNavTrigger" class="mobile-nav-btn"></div>

        {{-- PC Navigation --}}
        <nav class="pc-nav">
            <ul class="nav-list">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link {{ Request::is('/*') ? 'active' : '' }}">Home</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Profile</a>
                </li>
            </ul>
        </nav>
    </div>
    {{-- Mobile Navigation --}}
    <nav id="mobileNav" class="mobile-nav collapse">
        <ul class="nav-list">
            <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">HOME</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Profile</a></li>
        </ul>
    </nav>
</header>

