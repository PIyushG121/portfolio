<div class="row g-3">
    @if ($errors->any())
        <div class="col-12">
            <div class="alert alert-danger mb-0">
                Please fix the highlighted form issues and try again.
            </div>
        </div>
    @endif
    <div class="col-md-8">
        <label class="form-label">Title</label>
        <input type="text" name="title" class="form-control" value="{{ old('title', $project->title) }}" required>
        @error('title')
            <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-4">
        <label class="form-label">Category</label>
        <input type="text" name="category" class="form-control" value="{{ old('category', $project->category) }}" required>
        @error('category')
            <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-12">
        <label class="form-label">Short Description</label>
        <textarea name="short_description" class="form-control" rows="3" required>{{ old('short_description', $project->short_description) }}</textarea>
        @error('short_description')
            <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-12">
        <label class="form-label">Long Description</label>
        <textarea name="long_description" class="form-control" rows="5">{{ old('long_description', $project->long_description) }}</textarea>
        @error('long_description')
            <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6">
        <label class="form-label">External Link</label>
        <input type="url" name="external_link" class="form-control" value="{{ old('external_link', $project->external_link) }}">
        @error('external_link')
            <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-3">
        <label class="form-label">Sort Order</label>
        <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $project->sort_order ?? 0) }}" min="0">
        @error('sort_order')
            <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-3 d-flex align-items-end">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" id="featured" name="featured" @checked(old('featured', $project->featured))>
            <label class="form-check-label" for="featured">Featured Project</label>
        </div>
    </div>
    <div class="col-12">
        <label class="form-label">Project Image</label>
        <input type="file" name="image" class="form-control" {{ $project->exists ? '' : 'required' }}>
        @error('image')
            <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
        @if ($project->image_path)
            <div class="mt-2">
                <img src="{{ asset('storage/' . $project->image_path) }}" alt="{{ $project->title }}" style="max-width: 160px;">
            </div>
        @endif
    </div>
</div>
