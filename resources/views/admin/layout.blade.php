<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin — DARWAZA')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,400&family=Josefin+Sans:wght@100;300;400&family=Cormorant+Garamond:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/darwaza.css') }}">
</head>
<body style="cursor: default;">
<div class="grain-overlay"></div>

<div class="admin-layout">
    <!-- Sidebar -->
    <aside class="admin-sidebar">
        <div class="admin-sidebar-logo">
            DARWAZA
            <span>Admin Panel</span>
        </div>
        <nav class="admin-nav">
            <a href="{{ url('/admin') }}" class="{{ request()->is('admin') ? 'active' : '' }}">
                📊 Dashboard
            </a>
            <a href="{{ url('/admin/reservations') }}" class="{{ request()->is('admin/reservations') ? 'active' : '' }}">
                🗓️ Reservations
            </a>
            <a href="{{ url('/admin/messages') }}" class="{{ request()->is('admin/messages') ? 'active' : '' }}">
                ✉️ Messages
            </a>
            <a href="{{ url('/') }}" style="margin-top: 40px; border-top: 1px solid var(--dark-border); padding-top: 20px;">
                🏠 View Website
            </a>
        </nav>
    </aside>

    <!-- Main -->
    <div class="admin-main">
        @yield('admin-content')
    </div>
</div>

<script src="{{ asset('js/darwaza.js') }}"></script>
</body>
</html>
