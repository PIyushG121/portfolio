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

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">
<style>
    .project-editor {
        margin-bottom: 1rem;
    }

    .project-editor .ql-toolbar.ql-snow {
        border-top-left-radius: 0.375rem;
        border-top-right-radius: 0.375rem;
    }

    .project-editor .ql-container.ql-snow {
        height: 220px;
        max-height: 220px;
        overflow-y: auto;
        border-bottom-left-radius: 0.375rem;
        border-bottom-right-radius: 0.375rem;
        background: #fff;
    }

    .project-editor .ql-editor {
        min-height: 220px;
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const editorElement = document.getElementById('long_description_editor');
        const inputElement = document.getElementById('long_description_input');

        if (!editorElement || !inputElement) {
            return;
        }

        const quill = new Quill('#long_description_editor', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{ header: [2, 3, false] }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{ list: 'ordered' }, { list: 'bullet' }],
                    ['link', 'blockquote', 'code-block'],
                    ['clean']
                ]
            }
        });

        editorElement.closest('form').addEventListener('submit', function () {
            inputElement.value = quill.root.innerHTML === '<p><br></p>' ? '' : quill.root.innerHTML;
        });
    });
</script>
@endpush
