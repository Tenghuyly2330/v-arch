<?php

namespace App\Http\Controllers\admin;

use App\Models\Project;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProjectBackendController extends Controller
{
    public function index()
    {
        $projects = Project::get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title_en' => 'nullable|string',
            'title_km' => 'nullable|string',
            'title_ch' => 'nullable|string',
            'content_en' => 'nullable|string',
            'content_km' => 'nullable|string',
            'content_ch' => 'nullable|string',
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        $folderName = strtolower(str_replace(' ', '_', $validated['title_en']));
        $imagePaths = [];

        foreach ($request->file('images') as $imageFile) {
            $path = $imageFile->store("projects/{$folderName}", 'custom');
            $imagePaths[] = $path;
        }

        Project::create([
            'title_en' => $validated['title_en'],
            'title_km' => $validated['title_km'],
            'title_ch' => $validated['title_ch'],
            'content_en' => $validated['content_en'],
            'content_km' => $validated['content_km'],
            'content_ch' => $validated['content_ch'],
            'slug' => Str::slug($validated['title_en']),
            'image' => json_encode($imagePaths),
        ]);

        return redirect()->route('project_backend.index')
            ->with('success', 'Created Successfully!');
    }

    public function edit(string $id)
    {
        $project = Project::findOrFail($id);
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, string $id)
    {

        $validated = $request->validate([
            'title_en' => 'nullable|string',
            'title_km' => 'nullable|string',
            'content_en' => 'nullable|string',
            'content_km' => 'nullable|string',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        $project = Project::findOrFail($id);
        $folderName = strtolower(str_replace(' ', '_', $validated["title_en"]));

        $imagePaths = json_decode($project->image, true) ?? [];

        if ($request->filled('removed_images')) {
            $removedImages = json_decode($request->removed_images, true);

            foreach ($removedImages as $removedImage) {
                if (Storage::disk('custom')->exists($removedImage)) {
                    Storage::disk('custom')->delete($removedImage);
                }
                $imagePaths = array_filter($imagePaths, fn($img) => $img !== $removedImage);
            }
        }
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $imageFile) {
                $path = $imageFile->store("projects/{$folderName}", 'custom');
                $imagePaths[] = $path;
            }
        }

        $project->update([
            'title_en' => $validated['title_en'],
            'title_km' => $validated['title_km'],
            'content_en' => $validated['content_en'],
            'content_km' => $validated['content_km'],
            'slug' => Str::slug($validated['title_en']),
            'image' => json_encode(array_values($imagePaths))
        ]);

        return redirect()->route('project_backend.index')
            ->with('success', 'Updated successfully!');
    }

    public function delete(string $id)
    {
        $project = Project::findOrFail($id);
        $imagePaths = json_decode($project->image, true) ?? [];

        foreach ($imagePaths as $image) {
            if (Storage::disk('custom')->exists($image)) {
                Storage::disk('custom')->delete($image);
            }
        }
        $project->delete();

        return redirect()->route('project_backend.index')
            ->with('success', 'Deleted successfully!');
    }
}
