<!DOCTYPE html>
<html lang="ur" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'DARWAZA — Where History Dines')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;0,900;1,400;1,700&family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Josefin+Sans:wght@100;300;400&display=swap" rel="stylesheet">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('css/darwaza.css') }}">

    @yield('head')
</head>
<body>

<!-- Grain Overlay -->
<div class="grain-overlay"></div>

<!-- Floating Particles -->
<div class="particles" id="particles"></div>

<!-- Navigation -->
<nav class="navbar" id="navbar">
    <div class="nav-container">
        <a href="{{ url('/') }}" class="nav-logo">
            <div class="logo-emblem">
                <svg viewBox="0 0 60 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M30 2 L58 15 L58 65 L30 78 L2 65 L2 15 Z" stroke="#C9A96E" stroke-width="1.5" fill="none"/>
                    <path d="M30 12 L48 22 L48 58 L30 68 L12 58 L12 22 Z" stroke="#C9A96E" stroke-width="0.8" fill="none" opacity="0.5"/>
                    <text x="30" y="46" text-anchor="middle" font-family="Playfair Display" font-size="14" fill="#C9A96E" font-weight="700">D</text>
                </svg>
            </div>
            <div class="logo-text">
                <span class="logo-main">DARWAZA</span>
                <span class="logo-sub">Est. 1947 · Lahore</span>
            </div>
        </a>

        <ul class="nav-links">
            <li><a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">Home</a></li>
            <li><a href="{{ url('/menu') }}" class="{{ request()->is('menu') ? 'active' : '' }}">Menu</a></li>
            <li><a href="{{ url('/gallery') }}" class="{{ request()->is('gallery') ? 'active' : '' }}">Gallery</a></li>
            <li><a href="{{ url('/reservation') }}" class="{{ request()->is('reservation') ? 'active' : '' }}">Reserve</a></li>
            <li><a href="{{ url('/contact') }}" class="{{ request()->is('contact') ? 'active' : '' }}">Contact</a></li>
        </ul>

        <a href="{{ url('/reservation') }}" class="nav-cta">Book Table</a>

        <button class="nav-toggle" id="navToggle">
            <span></span><span></span><span></span>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div class="mobile-menu" id="mobileMenu">
        <a href="{{ url('/') }}">Home</a>
        <a href="{{ url('/menu') }}">Menu</a>
        <a href="{{ url('/gallery') }}">Gallery</a>
        <a href="{{ url('/reservation') }}">Reserve</a>
        <a href="{{ url('/contact') }}">Contact</a>
    </div>
</nav>

<!-- Page Content -->
<main>
    @yield('content')
</main>

<!-- Footer -->
<footer class="footer">
    <div class="footer-top">
        <div class="footer-brand">
            <div class="footer-logo">DARWAZA</div>
            <p class="footer-tagline">Where Three Empires Meet At Your Table</p>
            <div class="footer-divider"></div>
        </div>

        <div class="footer-cols">
            <div class="footer-col">
                <h4>Navigate</h4>
                <a href="{{ url('/') }}">Home</a>
                <a href="{{ url('/menu') }}">Our Menu</a>
                <a href="{{ url('/gallery') }}">Gallery</a>
                <a href="{{ url('/reservation') }}">Reservations</a>
                <a href="{{ url('/contact') }}">Contact Us</a>
            </div>
            <div class="footer-col">
                <h4>Experience</h4>
                <span>🏛️ Mughal Darbar Room</span>
                <span>🎩 Colonial Salon</span>
                <span>🌟 Azadi Terrace</span>
                <span>🔐 Secret Code Dining</span>
            </div>
            <div class="footer-col">
                <h4>Visit Us</h4>
                <span>📍 Liberty Market, Lahore</span>
                <span>📞 +92 42 1234 5678</span>
                <span>✉️ info@darwaza.pk</span>
                <span>⏰ 12pm – 12am Daily</span>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <p>© {{ date('Y') }} DARWAZA Restaurant · All Rights Reserved · Lahore, Pakistan</p>
    </div>
</footer>

<script src="{{ asset('js/darwaza.js') }}"></script>
@yield('scripts')
</body>
</html>
