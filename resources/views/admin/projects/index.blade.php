@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 mb-1">Projects</h1>
        <p class="text-muted mb-0">Create and manage the portfolio cards shown on the public site.</p>
    </div>
    <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">Add Project</a>
</div>

<div class="card border-0 shadow-sm">
    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead>
                <tr>
                    <th>Project</th>
                    <th>Category</th>
                    <th>Featured</th>
                    <th>Sort</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($projects as $project)
                    <tr>
                        <td>
                            <div class="fw-semibold">{{ $project->title }}</div>
                            <div class="small text-muted">{{ $project->short_description }}</div>
                        </td>
                        <td>{{ $project->category }}</td>
                        <td>{{ $project->featured ? 'Yes' : 'No' }}</td>
                        <td>{{ $project->sort_order }}</td>
                        <td class="text-end">
                            <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                            <form action="{{ route('admin.projects.destroy', $project) }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this project?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">No projects yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
