@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 mb-1">Dashboard</h1>
        <p class="text-muted mb-0">The project is now running on Laravel with CMS-ready data tables.</p>
    </div>
    <a href="{{ route('admin.projects.index') }}" class="btn btn-primary">Manage Projects</a>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <p class="text-muted mb-2">Projects</p>
                <h2 class="mb-0">{{ $projectCount }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <p class="text-muted mb-2">Featured Projects</p>
                <h2 class="mb-0">{{ $featuredCount }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <p class="text-muted mb-2">Messages</p>
                <h2 class="mb-0">{{ $messageCount }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <h2 class="h5 mb-3">Recent Messages</h2>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Received</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($recentMessages as $message)
                        <tr>
                            <td>{{ $message->name }}</td>
                            <td>{{ $message->email }}</td>
                            <td>{{ $message->subject }}</td>
                            <td>{{ $message->created_at->format('d M Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-muted">No contact messages yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
