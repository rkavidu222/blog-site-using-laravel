<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Bootstrap & Toastr CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />

    @yield('styles')

    <style>
        .sidebar {
            background: #f8f9fa;
            padding: 1rem;
            border-radius: 8px;
            position: sticky;
            top: 1rem;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            padding: 0.6rem 0.8rem;
            margin-bottom: 0.3rem;
            border-radius: 6px;
            color: #333;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.25s ease-in-out;
        }

        .sidebar a i {
            margin-right: 10px;
            font-size: 1.1rem;
        }

        .sidebar a:hover {
            background-color: #e9f2ff;
            color: #0d6efd;
            transform: translateX(4px);
        }

        .sidebar a.active {
            background-color: #0d6efd;
            color: #fff;
        }

        .sidebar .section {
            margin-bottom: 1rem;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 0.75rem;
        }

        .sidebar .section-title {
            font-size: 0.85rem;
            font-weight: 600;
            color: #6c757d;
            margin-bottom: 0.5rem;
        }
    </style>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side -->
                <ul class="navbar-nav me-auto"></ul>

                <!-- Right Side -->
                <ul class="navbar-nav ms-auto">
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                        @endif
                        @if (Route::has('register'))
                            <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        <div class="container">
            <div class="row">
                @if(Auth::check())
                    <div class="col-lg-4 mb-3">
                        <div class="sidebar">
                            <div class="section">
                                <div class="section-title">Dashboard</div>
                                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">
                                    <i class="bi bi-speedometer2 text-primary"></i> Dashboard
                                </a>
                                <a href="{{ route('user.profile') }}" class="{{ request()->routeIs('user.profile') ? 'active' : '' }}">
                                    <i class="bi bi-person-circle text-success"></i> My Profile
                                </a>
                            </div>

                            <div class="section">
                                <div class="section-title">Posts</div>
                                <a href="{{ route('posts') }}" class="{{ request()->routeIs('posts') ? 'active' : '' }}">
                                    <i class="bi bi-file-earmark-text text-info"></i> All Posts
                                </a>
                                <a href="{{ route('post.create') }}" class="{{ request()->routeIs('post.create') ? 'active' : '' }}">
                                    <i class="bi bi-plus-circle text-info"></i> Create Post
                                </a>
                                <a href="{{ route('posts.trashed') }}" class="{{ request()->routeIs('posts.trashed') ? 'active' : '' }}">
                                    <i class="bi bi-trash text-danger"></i> Trashed Posts
                                </a>
                            </div>

                            <div class="section">
                                <div class="section-title">Categories</div>
                                <a href="{{ route('categories') }}" class="{{ request()->routeIs('categories') ? 'active' : '' }}">
                                    <i class="bi bi-grid text-warning"></i> All Categories
                                </a>
                                <a href="{{ route('category.create') }}" class="{{ request()->routeIs('category.create') ? 'active' : '' }}">
                                    <i class="bi bi-folder-plus text-warning"></i> Create Category
                                </a>
                            </div>

                            <div class="section">
                                <div class="section-title">Tags</div>
                                <a href="{{ route('tags') }}" class="{{ request()->routeIs('tags') ? 'active' : '' }}">
                                    <i class="bi bi-tags text-secondary"></i> All Tags
                                </a>
                                <a href="{{ route('tag.create') }}" class="{{ request()->routeIs('tag.create') ? 'active' : '' }}">
                                    <i class="bi bi-plus-square text-secondary"></i> Create Tag
                                </a>
                            </div>

                            @if (Auth::user()->admin)
                                <div class="section">
                                    <div class="section-title">Admin</div>
                                    <a href="{{ route('users') }}" class="{{ request()->routeIs('users') ? 'active' : '' }}">
                                        <i class="bi bi-people text-dark"></i> Users
                                    </a>
                                    <a href="{{ route('user.create') }}" class="{{ request()->routeIs('user.create') ? 'active' : '' }}">
                                        <i class="bi bi-person-plus text-dark"></i> Create User
                                    </a>
                                    <a href="{{ route('settings') }}" class="{{ request()->routeIs('settings') ? 'active' : '' }}">
                                        <i class="bi bi-gear text-secondary"></i> Settings
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif
                <div class="col-lg-8">
                    @yield('content')
                </div>
            </div>
        </div>
    </main>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    $(document).ready(function () {
        @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}");
        @endif
        @if(Session::has('error'))
        toastr.error("{{ Session::get('error') }}");
        @endif
        @if(Session::has('info'))
        toastr.info("{{ Session::get('info') }}");
        @endif
        @if(Session::has('warning'))
        toastr.warning("{{ Session::get('warning') }}");
        @endif
    });
</script>

@yield('scripts')

</body>
</html>
