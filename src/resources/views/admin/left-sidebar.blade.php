<div class="left-sidebar">
    <ul class="menu-list">
        <li class="menu-item">
            <a href="{{ route('home') }}" class="menu-link">Front Page</a>
        </li>
        <li class="menu-item {{ Route::is('admin.dashboard') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}" class="menu-link">Dashboard</a>
        </li>
        <li class="menu-item {{ Route::is('admin.categories.*') ? 'active' : '' }}">
            <a href="{{ route('admin.categories.index') }}" class="menu-link">Categories</a>
        </li>
        <li class="menu-item {{ Route::is('admin.tags.*') ? 'active' : '' }}">
            <a href="{{ route('admin.tags.index') }}" class="menu-link">Tags</a>
        </li>
        <li class="menu-item {{ Route::is('admin.posts.*') ? 'active' : '' }}">
            <a href="{{ route('admin.posts.index') }}" class="menu-link">Posts</a>
        </li>
        <li class="menu-item {{ Route::is('admin.pages.*') ? 'active' : '' }}">
            <a href="{{ route('admin.pages.index') }}" class="menu-link">Pages</a>
        </li>
    </ul>

    <div class="logout-block">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn menu-logout">Logout</button>
        </form>
    </div>
</div>
