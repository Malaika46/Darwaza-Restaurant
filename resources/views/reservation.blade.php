@extends('layouts.app')
@section('title', 'Reserve — DARWAZA Restaurant')

@section('head')
<style>
/* ── Fix dropdown & select background ── */
.form-control,
select.form-control,
input.form-control,
textarea.form-control {
    background-color: #1a1610 !important;
    color: #E8DCC8 !important;
    border: 1px solid #2A2418 !important;
    font-family: 'Cormorant Garamond', Georgia, serif !important;
    font-size: 1rem !important;
}

/* Fix dropdown options — the key fix */
select.form-control option {
    background-color: #1a1610 !important;
    color: #E8DCC8 !important;
    padding: 8px !important;
}

select.form-control option:disabled,
select.form-control option[value=""] {
    color: #8A7A62 !important;
}

.form-control:focus {
    border-color: #C9A96E !important;
    outline: none !important;
    box-shadow: 0 0 0 3px rgba(201,169,110,0.15) !important;
    background-color: rgba(201,169,110,0.04) !important;
}

.form-control::placeholder { color: #8A7A62 !important; }

/* ── Copy Code Box ── */
.code-reveal-box {
    background: linear-gradient(135deg, #0f0c08, #1a1410);
    border: 1px solid #C9A96E;
    padding: 36px;
    text-align: center;
    margin-bottom: 32px;
    position: relative;
    overflow: hidden;
}

.code-reveal-box::before {
    content: '';
    position: absolute;
    inset: 0;
    background: radial-gradient(ellipse at 50% 0%, rgba(201,169,110,0.1) 0%, transparent 70%);
    pointer-events: none;
}

.code-reveal-eyebrow {
    font-family: 'Josefin Sans', sans-serif;
    font-size: 0.6rem;
    letter-spacing: 0.4em;
    text-transform: uppercase;
    color: #C9A96E;
    margin-bottom: 12px;
}

.code-reveal-value {
    font-family: 'Josefin Sans', sans-serif;
    font-size: 2.2rem;
    letter-spacing: 0.5em;
    color: #C9A96E;
    margin: 8px 0 20px;
    text-shadow: 0 0 30px rgba(201,169,110,0.4);
}

.code-copy-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-family: 'Josefin Sans', sans-serif;
    font-size: 0.65rem;
    letter-spacing: 0.25em;
    text-transform: uppercase;
    color: #0A0806;
    background: #C9A96E;
    border: none;
    padding: 12px 28px;
    cursor: pointer;
    transition: all 0.3s;
    clip-path: polygon(10px 0%, 100% 0%, calc(100% - 10px) 100%, 0% 100%);
}

.code-copy-btn:hover {
    background: #E8C99A;
    transform: translateY(-1px);
    box-shadow: 0 6px 24px rgba(201,169,110,0.3);
}

.code-copy-btn.copied {
    background: #1A6B3C;
    color: #fff;
}

.code-copy-btn svg {
    width: 14px; height: 14px;
    fill: currentColor;
}

.code-sub {
    font-family: 'Cormorant Garamond', Georgia, serif;
    font-style: italic;
    font-size: 0.85rem;
    color: #8A7A62;
    margin-top: 14px;
}

/* Reservation page hero */
.res-hero {
    padding-top: 140px;
    padding-bottom: 60px;
    background: var(--dark);
    border-bottom: 1px solid var(--dark-border);
    text-align: center;
}
</style>
@endsection

@section('content')

<div class="res-hero">
    <div class="container">
        <span class="section-eyebrow">Claim Your Seat in History</span>
        <h1 class="section-title">Make a <em>Reservation</em></h1>
        <div class="section-divider"></div>
    </div>
</div>

<section class="reservation-section">
    <div class="container">
        <div class="reservation-grid">

            <!-- Info Side -->
            <div class="reveal">
                <h2 style="font-family:var(--font-display);font-size:2rem;color:var(--cream);margin-bottom:24px;">
                    Your <em style="color:var(--gold);">Secret Code</em> Awaits
                </h2>
                <p style="font-family:var(--font-body);color:var(--text-dim);line-height:1.8;margin-bottom:40px;">
                    Complete this form and we'll generate your exclusive DRZ code — your key to priority entry, off-menu specials, and a welcome gift on arrival.
                </p>

                <div style="display:flex;flex-direction:column;gap:1px;background:var(--dark-border);">
                    @foreach([
                        ['🏛️','Mughal Darbar','Crimson silks, candlelight, and royal Mughlai cuisine'],
                        ['🎩','Colonial Salon','Teak, ceiling fans, and East-meets-West fusion dining'],
                        ['🌟','Azadi Terrace','Open sky, Lahore breeze, and bold Pakistani flavours'],
                    ] as $room)
                    <div style="display:flex;gap:16px;padding:24px;background:var(--dark-card);align-items:flex-start;">
                        <div style="font-size:1.5rem;width:44px;height:44px;display:flex;align-items:center;justify-content:center;border:1px solid var(--dark-border);flex-shrink:0;">{{ $room[0] }}</div>
                        <div>
                            <div style="font-family:var(--font-display);font-size:1rem;color:var(--cream);margin-bottom:4px;">{{ $room[1] }}</div>
                            <div style="font-family:var(--font-body);font-size:0.9rem;color:var(--text-dim);">{{ $room[2] }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div style="margin-top:40px;padding:24px;border:1px solid var(--dark-border);background:var(--dark-card);">
                    <div style="font-family:var(--font-accent);font-size:0.6rem;letter-spacing:0.3em;text-transform:uppercase;color:var(--gold);margin-bottom:8px;">Hours</div>
                    <div style="font-family:var(--font-body);color:var(--cream-dim);">Monday – Sunday · 12:00 PM – 12:00 AM</div>
                    <div style="font-family:var(--font-body);color:var(--text-dim);margin-top:4px;font-style:italic;">Reservations recommended for weekends</div>
                </div>
            </div>

            <!-- Form Side -->
            <div class="reveal" style="animation-delay:0.2s;">

                {{-- ✅ SUCCESS: Show the secret code with copy button --}}
                @if(session('success'))
                <div class="code-reveal-box">
                    <div class="code-reveal-eyebrow">🎉 Reservation Confirmed! Your Secret Code Is:</div>
                    <div class="code-reveal-value" id="secretCodeVal">{{ session('code') }}</div>
                    <button class="code-copy-btn" id="copyCodeBtn" onclick="copyCode()">
                        <svg viewBox="0 0 24 24"><path d="M16 1H4c-1.1 0-2 .9-2 2v14h2V3h12V1zm3 4H8c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm0 16H8V7h11v14z"/></svg>
                        <span id="copyBtnText">Copy Code</span>
                    </button>
                    <div class="code-sub">Present this code at our entrance for priority seating &amp; your welcome gift</div>
                </div>
                @endif

                @if($errors->any())
                <div class="alert alert-error" style="margin-bottom:24px;">❌ Please check the form and try again.</div>
                @endif

                <form action="{{ url('/reservation') }}" method="POST" style="background:var(--dark-card);border:1px solid var(--dark-border);padding:48px;">
                    @csrf

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Full Name *</label>
                            <input type="text" name="name" class="form-control" placeholder="Your name" value="{{ old('name') }}" required>
                            @error('name')<span style="color:#ff6b6b;font-size:0.8rem;">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Phone Number *</label>
                            <input type="tel" name="phone" class="form-control" placeholder="+92 300 0000000" value="{{ old('phone') }}" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Date *</label>
                            <input type="date" name="date" class="form-control" value="{{ old('date') }}" min="{{ date('Y-m-d') }}" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Time *</label>
                            <select name="time" class="form-control" required>
                                <option value="" disabled selected style="color:#8A7A62;">— Select time —</option>
                                @foreach(['12:00 PM','1:00 PM','2:00 PM','3:00 PM','4:00 PM','7:00 PM','8:00 PM','9:00 PM','10:00 PM','11:00 PM'] as $t)
                                <option value="{{ $t }}" {{ old('time') == $t ? 'selected' : '' }}>{{ $t }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Number of Guests *</label>
                            <select name="guests" class="form-control" required>
                                <option value="" disabled selected style="color:#8A7A62;">— How many? —</option>
                                @for($i = 1; $i <= 20; $i++)
                                <option value="{{ $i }}" {{ old('guests') == $i ? 'selected' : '' }}>
                                    {{ $i }} {{ $i == 1 ? 'Person' : 'People' }}
                                </option>
                                @endfor
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Choose Room *</label>
                            <select name="room" class="form-control" required>
                                <option value="" disabled selected style="color:#8A7A62;">— Select your era —</option>
                                <option value="mughal" {{ old('room', request('room')) == 'mughal' ? 'selected' : '' }}>🏛️ Mughal Darbar</option>
                                <option value="colonial" {{ old('room', request('room')) == 'colonial' ? 'selected' : '' }}>🎩 Colonial Salon</option>
                                <option value="azadi" {{ old('room', request('room')) == 'azadi' ? 'selected' : '' }}>🌟 Azadi Terrace</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Special Requests</label>
                        <textarea name="notes" class="form-control" rows="3" placeholder="Allergies, anniversary setup, halal requirements...">{{ old('notes') }}</textarea>
                    </div>

                    <button type="submit" class="btn-submit">Generate My Secret Code →</button>
                </form>
            </div>

        </div>
    </div>
</section>

<!-- Google Map -->
<div class="map-section">
    <div class="container">
        <div class="section-header reveal" style="margin-bottom:40px;">
            <span class="section-eyebrow">Find Us</span>
            <h2 class="section-title">At the <em>Heart</em> of Lahore</h2>
            <div class="section-divider"></div>
        </div>
        <div class="map-container reveal">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3400.0!2d74.3436!3d31.5204!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39190483e58107d9%3A0xc23abe6ccc7da44f!2sLiberty%20Market%2C%20Gulberg%20III%2C%20Lahore!5e0!3m2!1sen!2spk!4v1700000000000!5m2!1sen!2spk"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>
            <div class="map-overlay-info">
                <div style="font-family:var(--font-accent);font-size:0.6rem;letter-spacing:0.25em;color:var(--gold);margin-bottom:8px;text-transform:uppercase;">Darwaza Restaurant</div>
                <div style="font-family:var(--font-body);color:var(--cream);line-height:1.6;">Liberty Market, Gulberg III, Lahore</div>
                <div style="font-family:var(--font-body);color:var(--text-dim);margin-top:8px;font-size:0.85rem;">+92 42 1234 5678</div>
                <div style="font-family:var(--font-body);color:var(--text-dim);font-size:0.85rem;">12:00 PM – 12:00 AM</div>
                <a href="https://maps.google.com?q=Liberty+Market+Lahore" target="_blank" style="display:inline-block;margin-top:16px;font-family:var(--font-accent);font-size:0.6rem;letter-spacing:0.2em;color:var(--gold);text-decoration:none;text-transform:uppercase;border-bottom:1px solid var(--gold);padding-bottom:2px;">Open in Maps →</a>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
function copyCode() {
    const code = document.getElementById('secretCodeVal')?.textContent?.trim();
    if (!code) return;
    navigator.clipboard.writeText(code).then(() => {
        const btn = document.getElementById('copyCodeBtn');
        const txt = document.getElementById('copyBtnText');
        btn.classList.add('copied');
        txt.textContent = '✓ Copied!';
        setTimeout(() => {
            btn.classList.remove('copied');
            txt.textContent = 'Copy Code';
        }, 2500);
    });
}
</script>
@endsection
