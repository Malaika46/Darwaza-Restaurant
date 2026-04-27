@extends('admin.layout')
@section('title', 'Dashboard — DARWAZA Admin')

@section('admin-content')
<div class="admin-header">
    <h1 class="admin-title">Dashboard</h1>
    <div style="font-family: var(--font-body); color: var(--text-dim); font-style: italic;">{{ now()->format('l, d F Y') }}</div>
</div>

<!-- Stats -->
<div class="admin-stats">
    <div class="admin-stat-card">
        <div class="admin-stat-num">{{ $totalReservations ?? 0 }}</div>
        <div class="admin-stat-label">Total Reservations</div>
    </div>
    <div class="admin-stat-card">
        <div class="admin-stat-num">{{ $todayReservations ?? 0 }}</div>
        <div class="admin-stat-label">Today's Bookings</div>
    </div>
    <div class="admin-stat-card">
        <div class="admin-stat-num">{{ $totalMessages ?? 0 }}</div>
        <div class="admin-stat-label">Messages</div>
    </div>
</div>

<!-- Recent Reservations -->
<div class="admin-table-wrapper">
    <div style="padding: 24px 24px 0; border-bottom: 1px solid var(--dark-border); display: flex; justify-content: space-between; align-items: center; margin-bottom: 0;">
        <h2 style="font-family: var(--font-display); font-size: 1.2rem; color: var(--cream);">Recent Reservations</h2>
        <a href="{{ url('/admin/reservations') }}" style="font-family: var(--font-accent); font-size: 0.6rem; letter-spacing: 0.2em; color: var(--gold); text-decoration: none; text-transform: uppercase;">View All →</a>
    </div>
    <table class="admin-table">
        <thead>
            <tr>
                <th>Code</th>
                <th>Guest</th>
                <th>Date & Time</th>
                <th>Room</th>
                <th>Guests</th>
            </tr>
        </thead>
        <tbody>
            @forelse($recentReservations ?? [] as $res)
            <tr>
                <td><span class="code-badge">{{ $res->secret_code }}</span></td>
                <td>
                    <div style="color: var(--cream);">{{ $res->name }}</div>
                    <div style="font-size: 0.8rem; color: var(--text-dim);">{{ $res->phone }}</div>
                </td>
                <td>{{ \Carbon\Carbon::parse($res->date)->format('d M Y') }} · {{ $res->time }}</td>
                <td><span class="room-tag {{ $res->room }}">{{ ucfirst($res->room) }}</span></td>
                <td>{{ $res->guests }}</td>
            </tr>
            @empty
            <tr><td colspan="5" style="text-align: center; padding: 40px; color: var(--text-dim); font-style: italic;">No reservations yet.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
