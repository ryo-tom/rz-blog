<header class="layout-header">
    <div class="header-container">
        <div class="header-block">
            {{-- Site Title --}}
            <div class="site-title-box">
                <a href="{{ route('home') }}" class="site-title">
                    <div class="main-title">Rz Note</div>
                    <div class="sub-title">with <span>Laravel</span></div>
                </a>
            </div>

            {{-- Search Form --}}
            <div id="blog-search" class="search-box">
                <span class="material-symbols-outlined">
                    search
                </span>
                <div class="placeholder">
                    Search
                </div>
            </div>

            {{-- Mobile Navigation Button --}}
            <div id="navBtn" class="navbtn"></div>

            {{-- PC Navigation --}}
            <nav class="pc-nav">
                <ul class="nav-list">
                    <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">HOME</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Profile</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Contact</a></li>
                </ul>
            </nav>
        </div>
    </div>

    {{-- Mobile Navigation --}}
    <nav id="mobileNav" class="mobile-nav collapse">
        <ul class="nav-list">
            <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">HOME</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Profile</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Contact</a></li>
        </ul>
    </nav>
</header>
