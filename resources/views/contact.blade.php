@extends('layouts.app')
@section('title', 'Contact — DARWAZA Restaurant')

@section('content')

<div style="padding-top: 140px; padding-bottom: 60px; background: var(--dark); border-bottom: 1px solid var(--dark-border);">
    <div class="container" style="text-align: center;">
        <span class="section-eyebrow">We'd Love to Hear From You</span>
        <h1 class="section-title">Get in <em>Touch</em></h1>
        <div class="section-divider"></div>
    </div>
</div>

<section class="section">
    <div class="container">
        <div class="contact-grid">

            <!-- Info -->
            <div class="reveal">
                <h2 style="font-family: var(--font-display); font-size: 2rem; color: var(--cream); margin-bottom: 40px;">Visit <em style="color: var(--gold);">Darwaza</em></h2>

                @foreach([
                    ['📍', 'Address', 'Liberty Market, Gulberg III, Lahore, Punjab, Pakistan'],
                    ['📞', 'Phone', '+92 42 1234 5678'],
                    ['✉️', 'Email', 'info@darwaza.pk'],
                    ['⏰', 'Hours', 'Every day · 12:00 PM – 12:00 AM'],
                    ['🅿️', 'Parking', 'Valet parking available at main entrance'],
                ] as $info)
                <div class="contact-info-item">
                    <div class="contact-icon">{{ $info[0] }}</div>
                    <div>
                        <div class="contact-info-label">{{ $info[1] }}</div>
                        <div class="contact-info-value">{{ $info[2] }}</div>
                    </div>
                </div>
                @endforeach

                <!-- Map small -->
                <div style="margin-top: 40px;" class="map-container">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3400.0!2d74.3436!3d31.5204!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39190483e58107d9%3A0xc23abe6ccc7da44f!2sLiberty%20Market%2C%20Gulberg%20III%2C%20Lahore!5e0!3m2!1sen!2spk!4v1700000000000!5m2!1sen!2spk"
                        style="height: 280px;"
                        allowfullscreen=""
                        loading="lazy">
                    </iframe>
                </div>
            </div>

            <!-- Form -->
            <div class="reveal" style="animation-delay: 0.2s;">
                @if(session('success'))
                <div class="alert alert-success">✅ {{ session('success') }}</div>
                @endif

                <form action="{{ url('/contact') }}" method="POST" style="background: var(--dark-card); border: 1px solid var(--dark-border); padding: 48px;">
                    @csrf
                    <h3 style="font-family: var(--font-display); font-size: 1.5rem; color: var(--cream); margin-bottom: 32px;">Send a <em style="color: var(--gold);">Message</em></h3>

                    <div class="form-group">
                        <label class="form-label">Your Name *</label>
                        <input type="text" name="name" class="form-control" placeholder="Full name" value="{{ old('name') }}" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Phone Number *</label>
                        <input type="tel" name="phone" class="form-control" placeholder="+92 300 0000000" value="{{ old('phone') }}" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Message *</label>
                        <textarea name="message" class="form-control" rows="5" placeholder="Your question or feedback..." required>{{ old('message') }}</textarea>
                    </div>

                    <button type="submit" class="btn-submit">Send Message →</button>
                </form>
            </div>

        </div>
    </div>
</section>

@endsection
