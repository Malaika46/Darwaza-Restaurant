@extends('layouts.app')
@section('title', 'Menu — DARWAZA Restaurant')

@section('content')

<div style="padding-top: 140px; padding-bottom: 40px; background: var(--dark); border-bottom: 1px solid var(--dark-border);">
    <div class="container" style="text-align: center;">
        <span class="section-eyebrow">Curated Across Three Eras</span>
        <h1 class="section-title">Our <em>Menu</em></h1>
        <div class="section-divider"></div>
        <p style="font-family: var(--font-body); font-style: italic; color: var(--text-dim); max-width: 500px; margin: 0 auto; line-height: 1.8;">
            Recipes passed through empires. Every dish carries a story.
        </p>
    </div>
</div>

<section class="section">
    <div class="container">

        <!-- Tabs -->
        <div class="menu-tabs reveal">
            <button class="menu-tab active" data-tab="mughal-menu">🏛️ Mughal Darbar</button>
            <button class="menu-tab" data-tab="colonial-menu">🎩 Colonial Salon</button>
            <button class="menu-tab" data-tab="azadi-menu">🌟 Azadi Terrace</button>
        </div>

        <!-- Mughal Menu -->
        <div id="mughal-menu" class="menu-tab-content menu-grid reveal" style="transition: opacity 0.4s;">
            @foreach([
                ['🫕', 'Royal Nihari', 'Slow-cooked for 12 hours in a spiced bone broth, served with naan and ginger', '850'],
                ['🍚', 'Akbar\'s Biryani', 'Fragrant basmati, saffron, whole spices, and slow-cooked mutton', '980'],
                ['🍗', 'Mughal Seekh Kebab', 'Minced lamb with royal spices, grilled on charcoal skewers', '750'],
                ['🫙', 'Dal Makhani Darbar', 'Black lentils simmered overnight in butter and cream', '650'],
                ['🍮', 'Saffron Phirni', 'Set rice pudding with kesar, cardamom, and rose water', '350'],
                ['🥤', 'Shahi Tukda', 'Fried bread soaked in rabri cream with silver leaf garnish', '420'],
            ] as $item)
            <div class="menu-item">
                <div class="menu-item-emoji">{{ $item[0] }}</div>
                <div class="menu-item-info">
                    <div class="menu-item-name">{{ $item[1] }}</div>
                    <div class="menu-item-desc">{{ $item[2] }}</div>
                </div>
                <div class="menu-item-price">Rs. {{ $item[3] }}</div>
            </div>
            @endforeach
        </div>

        <!-- Colonial Menu -->
        <div id="colonial-menu" class="menu-tab-content menu-grid reveal" style="display: none; opacity: 0; transition: opacity 0.4s;">
            @foreach([
                ['🥣', 'Mulligatawny Soup', 'A British-Indian classic — spiced lentil soup with coconut and lime', '480'],
                ['🥩', 'Lahori Chops', 'Marinated lamb chops in colonial spice blend, served with mint chutney', '1200'],
                ['🫔', 'Club Sandwich Colonial', 'Triple-decker with chicken tikka, cheddar, lettuce and colonial mustard', '750'],
                ['🫖', 'High Tea Platter', 'Finger sandwiches, scones with jam, and Darjeeling tea service for two', '1400'],
                ['🍮', 'Bread and Butter Pudding', 'Classic British pudding with a desi twist — cardamom custard', '380'],
                ['☕', 'Chai of the Raj', 'Masala chai served in colonial bone china with petite biscuits', '280'],
            ] as $item)
            <div class="menu-item">
                <div class="menu-item-emoji">{{ $item[0] }}</div>
                <div class="menu-item-info">
                    <div class="menu-item-name">{{ $item[1] }}</div>
                    <div class="menu-item-desc">{{ $item[2] }}</div>
                </div>
                <div class="menu-item-price">Rs. {{ $item[3] }}</div>
            </div>
            @endforeach
        </div>

        <!-- Azadi Menu -->
        <div id="azadi-menu" class="menu-tab-content menu-grid reveal" style="display: none; opacity: 0; transition: opacity 0.4s;">
            @foreach([
                ['🍳', 'Karahi of Freedom', 'Fresh tomato karahi with chicken or mutton, cooked in iron wok', '900'],
                ['🐑', 'Quetta Sajji', 'Whole leg of lamb marinated and slow-roasted on open fire', '2200'],
                ['🦶', 'Paya Nihari', 'Traditional Lahori trotters in spiced broth, served with kulcha', '720'],
                ['🌽', 'Lahori Chargha', 'Full chicken deep-fried after marination in signature Lahori masala', '1100'],
                ['🎂', 'Minar-e-Pakistan Dessert', 'A tower of gulab jamun, kheer, and zarda topped with edible gold', '950'],
                ['🥭', 'Aam ki Lassi', 'Chilled mango lassi made with Chaunsa mangoes — seasonal', '320'],
            ] as $item)
            <div class="menu-item">
                <div class="menu-item-emoji">{{ $item[0] }}</div>
                <div class="menu-item-info">
                    <div class="menu-item-name">{{ $item[1] }}</div>
                    <div class="menu-item-desc">{{ $item[2] }}</div>
                </div>
                <div class="menu-item-price">Rs. {{ $item[3] }}</div>
            </div>
            @endforeach
        </div>

        <div style="text-align: center; margin-top: 60px;" class="reveal">
            <p style="font-family: var(--font-body); font-style: italic; color: var(--text-dim); margin-bottom: 24px;">
                All prices are in Pakistani Rupees. Tax not included. Halal certified.
            </p>
            <a href="{{ url('/reservation') }}" class="btn-primary"><span>Reserve Your Table</span></a>
        </div>
    </div>
</section>

@endsection
