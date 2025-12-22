<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutBackendController extends Controller
{
    public function index()
    {
        $abouts = About::get();
        return view('admin.abouts.index', compact('abouts'));
    }

    public function create()
    {
        return view('admin.abouts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title_en' => 'nullable|string|max:255',
            'title_km' => 'nullable|string|max:255',
            'title_ch' => 'nullable|string|max:255',
            'content1_en' => 'nullable|string',
            'content1_km' => 'nullable|string',
            'content1_ch' => 'nullable|string',
            'content2_en' => 'nullable|string',
            'content2_km' => 'nullable|string',
            'content2_ch' => 'nullable|string',
            'content3_en' => 'nullable|string',
            'content3_km' => 'nullable|string',
            'content3_ch' => 'nullable|string',
            'content4_en' => 'nullable|string',
            'content4_km' => 'nullable|string',
            'content4_ch' => 'nullable|string',
            'content5_en' => 'nullable|string',
            'content5_km' => 'nullable|string',
            'content5_ch' => 'nullable|string',
        ]);

        $data = $request->except('_token');

        About::create($data);

        return redirect()->route('about_backend.index')->with('success', 'Created successfully.');
    }


    public function edit(string $id)
    {
        $about = About::findOrFail($id);

        return view('admin.abouts.edit', compact('about'));
    }

    public function update(Request $request, string $id)
    {
        $about = About::findOrFail($id);

        $validated = $request->validate([
            'title_en' => 'nullable|string|max:255',
            'title_km' => 'nullable|string|max:255',
            'title_ch' => 'nullable|string|max:255',
            'content1_en' => 'nullable|string',
            'content1_km' => 'nullable|string',
            'content1_ch' => 'nullable|string',
            'content2_en' => 'nullable|string',
            'content2_km' => 'nullable|string',
            'content2_ch' => 'nullable|string',
            'content3_en' => 'nullable|string',
            'content3_km' => 'nullable|string',
            'content3_ch' => 'nullable|string',
            'content4_en' => 'nullable|string',
            'content4_km' => 'nullable|string',
            'content4_ch' => 'nullable|string',
            'content5_en' => 'nullable|string',
            'content5_km' => 'nullable|string',
            'content5_ch' => 'nullable|string',
        ]);

        $data = $request->except('_token', '_method');

        $update = $about->update($data);

        if ($update) {
            return redirect()->route('about_backend.index')->with('success', 'Updated Successfully!');
        } else {
            return redirect()->route('about_backend.edit')
                ->with('error', 'Failed to update About.')
                ->withInput();
        }
    }
}
