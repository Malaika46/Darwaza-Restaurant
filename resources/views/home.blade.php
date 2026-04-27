@extends('layouts.app')

@section('title', 'DARWAZA — Where History Dines · Lahore')

@section('content')

<!-- HERO -->
<section class="hero">
    <div class="hero-bg" style="background-image: url('https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=1800&q=80');"></div>
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <p class="hero-eyebrow">Est. 1947 · Liberty Market · Lahore</p>
        <h1 class="hero-title">
            DARWAZA
            <span>دروازہ</span>
        </h1>
        <p class="hero-subtitle">
            Step through the door — and into three empires.<br>
            Mughal grandeur. Colonial grace. Pakistani pride.
        </p>
        <div class="hero-actions">
            <a href="{{ url('/reservation') }}" class="btn-primary"><span>Reserve Your Table</span></a>
            <a href="{{ url('/menu') }}" class="btn-outline">Explore Menu</a>
        </div>
    </div>
    <div class="hero-scroll">
        <div class="scroll-line"></div>
        <span>Scroll</span>
    </div>
</section>

<!-- STATS -->
<div class="stats-section">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-item reveal">
                <span class="stat-number" data-target="77" data-suffix="+">0+</span>
                <span class="stat-label">Years of Heritage</span>
            </div>
            <div class="stat-item reveal">
                <span class="stat-number" data-target="3" data-suffix="">0</span>
                <span class="stat-label">Historical Eras</span>
            </div>
            <div class="stat-item reveal">
                <span class="stat-number" data-target="120" data-suffix="+">0+</span>
                <span class="stat-label">Menu Signatures</span>
            </div>
            <div class="stat-item reveal">
                <span class="stat-number" data-target="50000" data-suffix="+">0+</span>
                <span class="stat-label">Happy Guests</span>
            </div>
        </div>
    </div>
</div>

<!-- THREE ROOMS -->
<section class="section">
    <div class="container">
        <div class="section-header reveal">
            <span class="section-eyebrow">Dine In History</span>
            <h2 class="section-title">Three Eras, One <em>Table</em></h2>
            <div class="section-divider"></div>
            <p style="font-family: var(--font-body); color: var(--text-dim); font-style: italic; max-width: 500px; margin: 0 auto; line-height: 1.8;">
                Each room is a portal. Choose your century. Hover to discover the story within.
            </p>
        </div>

        <div class="rooms-grid">

            <!-- Mughal -->
            <div class="room-card mughal reveal">
                <div class="room-flip-hint">Hover →</div>
                <div class="room-card-inner">
                    <div class="room-card-front">
                        <img src="https://images.unsplash.com/photo-1600891964092-4316c288032e?w=800&q=80" alt="Mughal Darbar Room">
                        <div class="room-card-front-content">
                            <div class="room-era">1526 – 1857</div>
                            <div class="room-name">Mughal Darbar</div>
                        </div>
                    </div>
                    <div class="room-card-back">
                        <div class="room-badge" style="background: rgba(139,26,26,0.2);">🏛️</div>
                        <div class="room-era" style="color: #ff6b6b;">Mughal Era · 1526</div>
                        <h3 class="room-name" style="font-size: 1.5rem; margin: 12px 0;">Mughal Darbar</h3>
                        <p class="room-desc-back">Draped in crimson silk and gold, echoing the grandeur of Akbar's court. Rich Mughlai flavours — slow-cooked nihari, royal biryanis, and saffron kulfi await you.</p>
                        <a href="{{ url('/reservation') }}?room=mughal" class="btn-primary" style="font-size: 0.6rem; padding: 12px 28px;"><span>Reserve This Room</span></a>
                    </div>
                </div>
            </div>

            <!-- Colonial -->
            <div class="room-card colonial reveal">
                <div class="room-flip-hint">Hover →</div>
                <div class="room-card-inner">
                    <div class="room-card-front">
                        <img src="https://images.unsplash.com/photo-1552566626-52f8b828add9?w=800&q=80" alt="Colonial Salon">
                        <div class="room-card-front-content">
                            <div class="room-era">1857 – 1947</div>
                            <div class="room-name">Colonial Salon</div>
                        </div>
                    </div>
                    <div class="room-card-back">
                        <div class="room-badge" style="background: rgba(26,58,92,0.2);">🎩</div>
                        <div class="room-era" style="color: #74b9ff;">British Era · 1857</div>
                        <h3 class="room-name" style="font-size: 1.5rem; margin: 12px 0;">Colonial Salon</h3>
                        <p class="room-desc-back">Teak furniture, English crockery, and ceiling fans that murmur colonial secrets. Experience the fusion of East and West — mulligatawny, Lahori chops, and high tea traditions.</p>
                        <a href="{{ url('/reservation') }}?room=colonial" class="btn-primary" style="font-size: 0.6rem; padding: 12px 28px;"><span>Reserve This Room</span></a>
                    </div>
                </div>
            </div>

            <!-- Azadi -->
            <div class="room-card azadi reveal">
                <div class="room-flip-hint">Hover →</div>
                <div class="room-card-inner">
                    <div class="room-card-front">
                        <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=800&q=80" alt="Azadi Terrace">
                        <div class="room-card-front-content">
                            <div class="room-era">1947 – Present</div>
                            <div class="room-name">Azadi Terrace</div>
                        </div>
                    </div>
                    <div class="room-card-back">
                        <div class="room-badge" style="background: rgba(26,107,60,0.2);">🌟</div>
                        <div class="room-era" style="color: #55efc4;">Pakistan · 1947</div>
                        <h3 class="room-name" style="font-size: 1.5rem; margin: 12px 0;">Azadi Terrace</h3>
                        <p class="room-desc-back">Open-air rooftop under Lahore's sky. Celebrate independence with bold Pakistani flavours — karahi, sajji, paye, and our signature Minar-e-Pakistan dessert platter.</p>
                        <a href="{{ url('/reservation') }}?room=azadi" class="btn-primary" style="font-size: 0.6rem; padding: 12px 28px;"><span>Reserve This Room</span></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- GALLERY PREVIEW -->
<section class="section" style="padding-top: 0;">
    <div class="container">
        <div class="section-header reveal">
            <span class="section-eyebrow">Visual Journey</span>
            <h2 class="section-title">Inside <em>Darwaza</em></h2>
            <div class="section-divider"></div>
        </div>

        <div class="gallery-grid reveal">
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=800&q=80" alt="Restaurant Interior">
                <div class="gallery-item-overlay"><div class="gallery-zoom">⊕</div></div>
            </div>
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?w=600&q=80" alt="Pakistani Food">
                <div class="gallery-item-overlay"><div class="gallery-zoom">⊕</div></div>
            </div>
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1466978913421-dad2ebd01d17?w=600&q=80" alt="Dining Ambiance">
                <div class="gallery-item-overlay"><div class="gallery-zoom">⊕</div></div>
            </div>
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1505275350441-83dcda8eeef5?w=600&q=80" alt="Fine Dining">
                <div class="gallery-item-overlay"><div class="gallery-zoom">⊕</div></div>
            </div>
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1567188040759-fb8a883dc6d8?w=700&q=80" alt="Biryani">
                <div class="gallery-item-overlay"><div class="gallery-zoom">⊕</div></div>
            </div>
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1544148103-0773bf10d330?w=700&q=80" alt="Restaurant Decor">
                <div class="gallery-item-overlay"><div class="gallery-zoom">⊕</div></div>
            </div>
        </div>

        <div style="text-align: center; margin-top: 40px;">
            <a href="{{ url('/gallery') }}" class="btn-outline">View Full Gallery</a>
        </div>
    </div>
</section>

<!-- SECRET CODE -->
<section class="secret-section">
    <div class="container">
        <div class="secret-content">
            <div class="secret-visual">
                <div class="secret-badge">
                    <div class="secret-badge-inner">
                        <div class="secret-code-display">DRZ-7843</div>
                        <div class="secret-text" style="font-family: var(--font-accent); font-size: 0.55rem; letter-spacing: 0.2em; text-transform: uppercase; color: var(--text-dim);">Your Code</div>
                    </div>
                </div>
            </div>
            <div class="reveal">
                <span class="section-eyebrow">Exclusive Access</span>
                <h2 class="section-title">The <em>Secret Code</em></h2>
                <div class="section-divider" style="margin: 24px 0;"></div>
                <p style="font-family: var(--font-body); color: var(--text-dim); font-size: 1.05rem; line-height: 1.8; margin-bottom: 32px;">
                    Every reservation generates your unique DRZ code. Present it at our door and receive priority seating, a welcome amuse-bouche, and access to our off-menu specials whispered only to the select few.
                </p>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 40px;">
                    <div style="padding: 20px; border: 1px solid var(--dark-border); background: var(--dark-card);">
                        <div style="font-family: var(--font-display); font-size: 1.8rem; color: var(--gold);">🔐</div>
                        <div style="font-family: var(--font-accent); font-size: 0.6rem; letter-spacing: 0.2em; color: var(--text-dim); margin-top: 8px; text-transform: uppercase;">Priority Entry</div>
                    </div>
                    <div style="padding: 20px; border: 1px solid var(--dark-border); background: var(--dark-card);">
                        <div style="font-family: var(--font-display); font-size: 1.8rem; color: var(--gold);">🎁</div>
                        <div style="font-family: var(--font-accent); font-size: 0.6rem; letter-spacing: 0.2em; color: var(--text-dim); margin-top: 8px; text-transform: uppercase;">Welcome Gift</div>
                    </div>
                </div>
                <a href="{{ url('/reservation') }}" class="btn-primary"><span>Get Your Code</span></a>
            </div>
        </div>
    </div>
</section>

<!-- Lightbox -->
<div class="lightbox" id="lightbox">
    <button class="lightbox-close">×</button>
    <img id="lightboxImg" src="" alt="Gallery">
</div>

@endsection
