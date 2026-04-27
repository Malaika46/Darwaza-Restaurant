@extends('admin.layout')
@section('title', 'Messages — DARWAZA Admin')

@section('admin-content')
<div class="admin-header">
    <h1 class="admin-title">Contact Messages</h1>
    <div style="font-family: var(--font-accent); font-size: 0.6rem; letter-spacing: 0.2em; color: var(--text-dim);">{{ $messages->total() ?? 0 }} Total</div>
</div>

<div class="admin-table-wrapper">
    <table class="admin-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Message</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @forelse($messages as $msg)
            <tr>
                <td style="color: var(--cream);">{{ $msg->name }}</td>
                <td>{{ $msg->phone }}</td>
                <td style="max-width: 400px;">{{ $msg->message }}</td>
                <td>{{ $msg->created_at->format('d M Y · h:i A') }}</td>
            </tr>
            @empty
            <tr><td colspan="4" style="text-align: center; padding: 60px; color: var(--text-dim); font-style: italic;">No messages yet.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

@if(isset($messages) && $messages->hasPages())
<div style="margin-top: 20px;">
    {{ $messages->links() }}
</div>
@endif

@endsection
