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
    <div class="card-body">
        <table id="projects-table" class="table table-striped table-hover align-middle mb-0">
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

@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/2.3.8/css/dataTables.bootstrap5.css">
<style>
    .dt-search {
        margin-bottom: 1rem;
    }

    .dt-length {
        margin-bottom: 1rem;
    }

    .dt-layout-row:last-child {
        margin-top: 1rem;
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.datatables.net/2.3.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.3.8/js/dataTables.bootstrap5.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const table = document.querySelector('#projects-table');

        if (table) {
            new DataTable('#projects-table', {
                paging: true,
                searching: true,
                info: true,
                lengthChange: true,
                pageLength: 10,
                order: [[3, 'asc']],
                language: {
                    search: 'Global search:',
                    searchPlaceholder: 'Search projects, categories, descriptions...'
                },
                layout: {
                    topStart: 'pageLength',
                    topEnd: 'search',
                    bottomStart: 'info',
                    bottomEnd: 'paging'
                },
                columnDefs: [
                    { orderable: false, searchable: false, targets: 4 }
                ]
            });
        }
    });
</script>
@endpush
