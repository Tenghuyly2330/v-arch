<?php

namespace App\Http\Controllers\admin;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
        public function index()
    {
        $banners = Banner::all();
        return view('admin.banners.index', compact('banners'));
    }

    /**
     * Show the form for creating a new banner.
     */
    public function create()
    {
        return view('admin.banners.create');
    }

    /**
     * Store a newly created banner in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'nullable|string|max:255',
            'media' => 'nullable|file|mimes:jpg,jpeg,png,gif,svg,mp4,webm,mov|max:20480',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:10240',
        ]);

        $mediaData = $this->handleMediaUpload($request->file('media'));
        $imagePath = $request->hasFile('image')
            ? $request->file('image')->store('banners/images', 'custom')
            : null;

        Banner::create([
            'name' => $request->name,
            'media' => $mediaData,
            'image' => $imagePath,
        ]);

        return redirect()->route('banner.index')->with('success', 'Banner created successfully');
    }

    /**
     * Show the form for editing the specified banner.
     */
    public function edit(Banner $banner)
    {
        return view('admin.banners.edit', compact('banner'));
    }

    /**
     * Update the specified banner in storage.
     */
    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'name' => 'nullable|string',
            'media' => 'nullable|file|mimes:jpg,jpeg,png,gif,svg,mp4,webm,mov|max:20480',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:10240',
        ]);

        $banner->name = $request->name;

        // Handle media update
        if ($request->hasFile('media')) {
            $this->deleteFileIfExists($banner->media['path'] ?? null);
            $banner->media = $this->handleMediaUpload($request->file('media'));
        }

        // Handle image-only update
        if ($request->hasFile('image')) {
            $this->deleteFileIfExists($banner->image);
            $banner->image = $request->file('image')->store('banners/images', 'custom');
        }

        $banner->save();

        return redirect()->route('banner.index')
            ->with('success', 'Banner updated successfully');
    }

    /**
     * Handle media (image/video) upload and return array for DB.
     */
    private function handleMediaUpload($file)
    {
        if (!$file) return null;

        $type = str_starts_with($file->getMimeType(), 'video/') ? 'video' : 'image';
        $path = $file->store("banners/{$type}", 'custom');

        return [
            'type' => $type,
            'path' => $path,
        ];
    }

    /**
     * Delete file from storage if it exists.
     */
    private function deleteFileIfExists($path)
    {
        if ($path && Storage::disk('custom')->exists($path)) {
            Storage::disk('custom')->delete($path);
        }
    }
}
