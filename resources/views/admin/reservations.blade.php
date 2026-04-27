@extends('admin.layout')
@section('title', 'Reservations — DARWAZA Admin')

@section('admin-content')
<div class="admin-header">
    <h1 class="admin-title">All Reservations</h1>
    <div style="font-family: var(--font-accent); font-size: 0.6rem; letter-spacing: 0.2em; color: var(--text-dim);">{{ $reservations->total() ?? 0 }} Total</div>
</div>

<div class="admin-table-wrapper">
    <table class="admin-table">
        <thead>
            <tr>
                <th>Code</th>
                <th>Guest</th>
                <th>Phone</th>
                <th>Date</th>
                <th>Time</th>
                <th>Room</th>
                <th>Guests</th>
                <th>Notes</th>
            </tr>
        </thead>
        <tbody>
            @forelse($reservations as $res)
            <tr>
                <td><span class="code-badge">{{ $res->secret_code }}</span></td>
                <td style="color: var(--cream);">{{ $res->name }}</td>
                <td>{{ $res->phone }}</td>
                <td>{{ \Carbon\Carbon::parse($res->date)->format('d M Y') }}</td>
                <td>{{ $res->time }}</td>
                <td><span class="room-tag {{ $res->room }}">{{ ucfirst($res->room) }}</span></td>
                <td>{{ $res->guests }}</td>
                <td style="max-width: 200px; font-size: 0.85rem; color: var(--text-dim);">{{ $res->notes ?: '—' }}</td>
            </tr>
            @empty
            <tr><td colspan="8" style="text-align: center; padding: 60px; color: var(--text-dim); font-style: italic;">No reservations found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

@if(isset($reservations) && $reservations->hasPages())
<div style="margin-top: 20px;">
    {{ $reservations->links() }}
</div>
@endif

@endsection
