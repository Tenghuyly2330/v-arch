<?php

namespace App\Http\Controllers\admin;

use App\Models\History;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class HistoryController extends Controller
{
    public function index()
    {
        $histories = History::get();
        return view('admin.histories.index', compact('histories'));
    }

    public function create()
    {
        return view('admin.histories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'year' => 'nullable|string|max:255',
            'content_en' => 'nullable|string',
            'content_km' => 'nullable|string',
            'content_ch' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        $data = $request->except('_token', 'image');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('histories', 'custom');
        }

        History::create($data);

        return redirect()->route('history.index')->with('success', 'Created successfully.');
    }


    public function edit(string $id)
    {
        $history = History::findOrFail($id);

        return view('admin.histories.edit', compact('history'));
    }

    public function update(Request $request, string $id)
    {
        $history = History::findOrFail($id);

        $validated = $request->validate([
            'year' => 'nullable|string|max:255',
            'content_en' => 'nullable|string',
            'content_km' => 'nullable|string',
            'content_ch' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $data = $request->except('_token', 'image', '_method');

        if ($request->hasFile('image')) {

            // Delete old image
            if ($history->image && Storage::disk('custom')->exists($history->image)) {
                Storage::disk('custom')->delete($history->image);
            }

            // Store new image
            $data['image'] = $request->file('image')->store('histories', 'custom');
        }

        $update = $history->update($data);

        if ($update) {
            return redirect()->route('history.index')->with('success', 'Updated Successfully!');
        } else {
            return redirect()->route('history.edit')
                ->with('error', 'Failed to update History.')
                ->withInput();
        }
    }
}
