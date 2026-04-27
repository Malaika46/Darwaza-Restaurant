@extends('layouts.app')
@section('title', 'Gallery — DARWAZA Restaurant')

@section('head')
<style>
.gallery-hero {
    padding-top: 140px;
    padding-bottom: 60px;
    background: var(--dark);
    border-bottom: 1px solid var(--dark-border);
    text-align: center;
}

.gallery-masonry {
    columns: 3;
    column-gap: 6px;
}

.gallery-masonry-item {
    break-inside: avoid;
    margin-bottom: 6px;
    position: relative;
    overflow: hidden;
    cursor: pointer;
    display: block;
}

.gallery-masonry-item img {
    width: 100%;
    height: auto;
    display: block;
    transition: transform 0.6s cubic-bezier(0.4,0,0.2,1), filter 0.4s;
    filter: brightness(0.85) saturate(0.9);
}

.gallery-masonry-item:hover img {
    transform: scale(1.06);
    filter: brightness(1.05) saturate(1.1);
}

.gal-overlay {
    position: absolute;
    inset: 0;
    background: rgba(10,8,6,0);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    gap: 8px;
    transition: background 0.35s;
}

.gallery-masonry-item:hover .gal-overlay { background: rgba(10,8,6,0.5); }

.gal-icon {
    font-size: 1.8rem;
    color: var(--gold);
    opacity: 0;
    transform: scale(0.5);
    transition: all 0.3s;
}

.gal-label {
    font-family: var(--font-accent);
    font-size: 0.55rem;
    letter-spacing: 0.3em;
    text-transform: uppercase;
    color: var(--cream);
    opacity: 0;
    transform: translateY(8px);
    transition: all 0.3s 0.05s;
}

.gallery-masonry-item:hover .gal-icon { opacity: 1; transform: scale(1); }
.gallery-masonry-item:hover .gal-label { opacity: 1; transform: translateY(0); }

.gallery-filters {
    display: flex;
    justify-content: center;
    gap: 2px;
    margin-bottom: 50px;
    flex-wrap: wrap;
}

.filter-btn {
    font-family: var(--font-accent);
    font-size: 0.6rem;
    letter-spacing: 0.25em;
    text-transform: uppercase;
    padding: 10px 24px;
    background: var(--dark);
    border: 1px solid var(--dark-border);
    color: var(--text-dim);
    cursor: pointer;
    transition: all 0.3s;
}

.filter-btn.active, .filter-btn:hover {
    background: var(--gold);
    color: var(--black);
    border-color: var(--gold);
}

/* Lightbox */
.lb {
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.96);
    z-index: 9999;
    display: none;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    gap: 16px;
}
.lb.open { display: flex; }

.lb-img-wrap img {
    max-width: 88vw;
    max-height: 78vh;
    object-fit: contain;
    display: block;
    border: 1px solid var(--dark-border);
}

.lb-caption {
    font-family: var(--font-body);
    font-style: italic;
    color: var(--cream-dim);
    font-size: 0.9rem;
}

.lb-close {
    position: fixed;
    top: 24px; right: 32px;
    color: var(--gold);
    font-size: 2.5rem;
    cursor: pointer;
    background: none;
    border: none;
    line-height: 1;
    z-index: 10000;
    transition: transform 0.2s;
}
.lb-close:hover { transform: rotate(90deg); }

.lb-nav {
    position: fixed;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(10,8,6,0.7);
    border: 1px solid var(--gold);
    color: var(--gold);
    font-size: 2rem;
    width: 52px; height: 52px;
    display: flex; align-items: center; justify-content: center;
    cursor: pointer;
    transition: background 0.3s;
    z-index: 10000;
}
.lb-nav:hover { background: rgba(201,169,110,0.2); }
.lb-prev { left: 16px; }
.lb-next { right: 16px; }

@media(max-width:900px){ .gallery-masonry { columns: 2; } }
@media(max-width:550px){ .gallery-masonry { columns: 1; } }
</style>
@endsection

@section('content')

<div class="gallery-hero">
    <div class="container">
        <span class="section-eyebrow">Through The Lens</span>
        <h1 class="section-title">The <em>Gallery</em></h1>
        <div class="section-divider"></div>
        <p style="font-family:var(--font-body);font-style:italic;color:var(--text-dim);margin-top:16px;">
            Three eras, one unforgettable experience
        </p>
    </div>
</div>

<section class="section">
    <div class="container">

        <div class="gallery-filters reveal">
            <button class="filter-btn active" data-filter="all">✦ All</button>
            <button class="filter-btn" data-filter="interior">🏛️ Interiors</button>
            <button class="filter-btn" data-filter="food">🍽️ Food</button>
            <button class="filter-btn" data-filter="ambiance">🕯️ Ambiance</button>
        </div>

        <div class="gallery-masonry reveal" id="galleryGrid">
            @php
            $photos = [
                ['https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=800&q=85', 'Mughal Darbar Room', 'interior'],
                ['https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?w=800&q=85', 'Signature Karahi', 'food'],
                ['https://images.unsplash.com/photo-1555396273-367ea4eb4db5?w=800&q=85', 'Restaurant Interior', 'interior'],
                ['https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=800&q=85', 'Pakistani Cuisine', 'food'],
                ['https://images.unsplash.com/photo-1466978913421-dad2ebd01d17?w=800&q=85', 'Evening Ambiance', 'ambiance'],
                ['https://images.unsplash.com/photo-1567188040759-fb8a883dc6d8?w=800&q=85', 'Royal Biryani', 'food'],
                ['https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=800&q=85', 'Night Dining', 'ambiance'],
                ['https://images.unsplash.com/photo-1590846406792-0adc7f938f1d?w=800&q=85', 'Fresh Karahi', 'food'],
                ['https://images.unsplash.com/photo-1600891964092-4316c288032e?w=800&q=85', 'Colonial Salon', 'interior'],
                ['https://images.unsplash.com/photo-1552566626-52f8b828add9?w=800&q=85', 'Candlelit Dinner', 'ambiance'],
                ['https://images.unsplash.com/photo-1544148103-0773bf10d330?w=800&q=85', 'Heritage Decor', 'interior'],
                ['https://images.unsplash.com/photo-1505275350441-83dcda8eeef5?w=800&q=85', 'Fine Dining', 'ambiance'],
                ['https://images.unsplash.com/photo-1540189549336-e6e99c3679fe?w=800&q=85', 'Mughal Platter', 'food'],
                ['https://images.unsplash.com/photo-1476224203421-9ac39bcb3327?w=800&q=85', 'Chef\'s Special', 'food'],
                ['https://images.unsplash.com/photo-1424847651672-bf20a4b0982b?w=800&q=85', 'Rooftop Night', 'ambiance'],
            ];
            @endphp

            @foreach($photos as $i => $photo)
            <div class="gallery-masonry-item" data-category="{{ $photo[2] }}" data-index="{{ $i }}">
                <img src="{{ $photo[0] }}" alt="{{ $photo[1] }}" loading="lazy">
                <div class="gal-overlay">
                    <div class="gal-icon">⊕</div>
                    <div class="gal-label">{{ $photo[1] }}</div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>

<!-- Lightbox -->
<div class="lb" id="lb">
    <button class="lb-close" id="lbClose">×</button>
    <button class="lb-nav lb-prev" id="lbPrev">‹</button>
    <div class="lb-img-wrap"><img id="lbImg" src="" alt=""></div>
    <div class="lb-caption" id="lbCaption"></div>
    <button class="lb-nav lb-next" id="lbNext">›</button>
</div>

@endsection

@section('scripts')
<script>
const filterBtns = document.querySelectorAll('.filter-btn');
const galItems = document.querySelectorAll('.gallery-masonry-item');
let visibleItems = [...galItems];
let currentIdx = 0;

// Filter
filterBtns.forEach(btn => {
    btn.addEventListener('click', () => {
        filterBtns.forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        const filter = btn.dataset.filter;
        galItems.forEach(item => {
            const show = filter === 'all' || item.dataset.category === filter;
            item.style.transition = 'opacity 0.3s';
            if (show) {
                item.style.display = 'block';
                requestAnimationFrame(() => item.style.opacity = '1');
            } else {
                item.style.opacity = '0';
                setTimeout(() => item.style.display = 'none', 300);
            }
        });
        setTimeout(() => {
            visibleItems = [...galItems].filter(i => i.style.display !== 'none');
        }, 350);
    });
});

// Open lightbox
galItems.forEach(item => {
    item.addEventListener('click', () => {
        visibleItems = [...galItems].filter(i => getComputedStyle(i).display !== 'none');
        currentIdx = visibleItems.indexOf(item);
        showSlide(currentIdx);
        document.getElementById('lb').classList.add('open');
        document.body.style.overflow = 'hidden';
    });
});

function showSlide(idx) {
    const item = visibleItems[idx];
    if (!item) return;
    document.getElementById('lbImg').src = item.querySelector('img').src;
    document.getElementById('lbCaption').textContent = item.querySelector('.gal-label')?.textContent || '';
}

document.getElementById('lbClose').onclick = closeLb;
document.getElementById('lbPrev').onclick = () => { currentIdx = (currentIdx - 1 + visibleItems.length) % visibleItems.length; showSlide(currentIdx); };
document.getElementById('lbNext').onclick = () => { currentIdx = (currentIdx + 1) % visibleItems.length; showSlide(currentIdx); };
document.getElementById('lb').addEventListener('click', e => { if (e.target.id === 'lb') closeLb(); });
document.addEventListener('keydown', e => {
    if (!document.getElementById('lb').classList.contains('open')) return;
    if (e.key === 'Escape') closeLb();
    if (e.key === 'ArrowLeft') { currentIdx = (currentIdx - 1 + visibleItems.length) % visibleItems.length; showSlide(currentIdx); }
    if (e.key === 'ArrowRight') { currentIdx = (currentIdx + 1) % visibleItems.length; showSlide(currentIdx); }
});
function closeLb() { document.getElementById('lb').classList.remove('open'); document.body.style.overflow = ''; }
</script>
@endsection
