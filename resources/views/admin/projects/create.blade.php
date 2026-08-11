@extends('layouts.admin')

@section('content')
<div class="mb-4">
    <h1 class="h3 mb-1">Add Project</h1>
    <p class="text-muted mb-0">Create a new portfolio item for the homepage grid.</p>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <form action="{{ route('admin.projects.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @include('admin.projects._form')
            <div class="mt-4 d-flex gap-2">
                <button class="btn btn-primary" type="submit">Save Project</button>
                <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
    </div>
    </div>
@endsection
