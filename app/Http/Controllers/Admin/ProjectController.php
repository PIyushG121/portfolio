<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function index(): View
    {
        return view('admin.projects.index', [
            'projects' => Project::query()->orderByDesc('featured')->orderBy('sort_order')->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.projects.create', [
            'project' => new Project(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validatedData($request);

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('projects', 'public');
        }

        Project::query()->create($data);

        return redirect()->route('admin.projects.index')->with('status', 'Project created successfully.');
    }

    public function edit(Project $project): View
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project): RedirectResponse
    {
        $data = $this->validatedData($request, $project->id);

        if ($request->hasFile('image')) {
            if ($project->image_path) {
                Storage::disk('public')->delete($project->image_path);
            }

            $data['image_path'] = $request->file('image')->store('projects', 'public');
        }

        $project->update($data);

        return redirect()->route('admin.projects.index')->with('status', 'Project updated successfully.');
    }

    public function destroy(Project $project): RedirectResponse
    {
        if ($project->image_path) {
            Storage::disk('public')->delete($project->image_path);
        }

        $project->delete();

        return redirect()->route('admin.projects.index')->with('status', 'Project deleted successfully.');
    }

    private function validatedData(Request $request, ?int $projectId = null): array
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:100'],
            'short_description' => ['required', 'string', 'max:500'],
            'long_description' => ['nullable', 'string'],
            'external_link' => ['nullable', 'url', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'featured' => ['nullable', 'boolean'],
            'image' => [$projectId ? 'nullable' : 'required', 'image', 'max:2048'],
        ]);

        $data['featured'] = $request->boolean('featured');

        return $data;
    }
}
