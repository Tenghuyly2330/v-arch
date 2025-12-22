<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Services\GoogleService;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
     public function index(GoogleService $google)
    {
        $categories = Category::all(); // MySQL (main source)
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request, GoogleService $google)
    {
        $validated = $request->validate([
            'name_en' => 'required|string|max:255',
            'name_km' => 'required|string|max:255',
            'name_ch' => 'required|string|max:255',
        ]);

        $slug = Str::slug($validated['name_en'], '-');

        DB::beginTransaction();

        try {
            // 1️⃣ Store in MySQL
            $category = Category::create([
                'name_en' => $validated['name_en'],
                'name_km' => $validated['name_km'],
                'name_ch' => $validated['name_ch'],
                'slug'    => $slug,
            ]);

            // 2️⃣ Store in Google Sheet (use same ID)
            $google->appendCategory([
                $category->id,
                $validated['name_en'],
                $validated['name_km'],
                $validated['name_ch'],
                $slug,
                'CREATED',
                now()->format('Y-m-d H:i:s'),
            ]);

            DB::commit();

            return redirect()->route('category.index')
                ->with('success', 'Category created in MySQL & Google Sheet');

        } catch (\Exception $e) {
            DB::rollBack();

            return back()->with('error', 'Failed to create category');
        }
    }

    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, string $id, GoogleService $google)
    {
        $validated = $request->validate([
            'name_en' => 'required|string|max:255',
            'name_km' => 'required|string|max:255',
            'name_ch' => 'required|string|max:255',
        ]);

        $slug = Str::slug($validated['name_en'], '-');

        DB::beginTransaction();

        try {
            // 1️⃣ Update MySQL
            $category = Category::findOrFail($id);
            $category->update([
                'name_en' => $validated['name_en'],
                'name_km' => $validated['name_km'],
                'name_ch' => $validated['name_ch'],
                'slug'    => $slug,
            ]);

            // 2️⃣ Update Google Sheet
            $google->updateCategory($id, [
                $id,
                $validated['name_en'],
                $validated['name_km'],
                $validated['name_ch'],
                $slug,
                'UPDATED',
                now()->format('Y-m-d H:i:s'),
            ]);

            DB::commit();

            return redirect()->route('category.index')
                ->with('success', 'Category updated in MySQL & Google Sheet');

        } catch (\Exception $e) {
            DB::rollBack();

            return back()->with('error', 'Failed to update category');
        }
    }

    public function delete(string $id, GoogleService $google)
    {
        DB::beginTransaction();

        try {
            // 1️⃣ Delete from MySQL
            Category::where('id', $id)->delete();

            // 2️⃣ Delete from Google Sheet
            $google->deleteCategory($id);

            DB::commit();

            return redirect()->route('category.index')
                ->with('success', 'Category deleted from MySQL & Google Sheet');

        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->route('category.index')
                ->with('error', 'Failed to delete category');
        }
    }
}
