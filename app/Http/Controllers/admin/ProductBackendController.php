<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Services\GoogleService;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductBackendController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::with('category')
            ->orderBy('created_at', 'desc')
            ->paginate(6);

        return view('admin.products.index', compact('products'));
    }


    public function create()
    {
        $cats = Category::all();
        return view('admin.products.create', compact('cats'));
    }

    public function store(Request $request, GoogleService $google)
    {
        $validated = $request->validate([
            'name_en' => 'required|string',
            'name_km' => 'required|string',
            'name_ch' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'colors' => 'nullable|array',
            'colors.*.name' => 'nullable|string',
            'colors.*.code' => 'nullable|string',
            'colors.*.images' => 'nullable|array',
            'colors.*.images.*' => 'image|max:10240',
            'content_en' => 'nullable|string',
            'content_km' => 'nullable|string',
            'content_ch' => 'nullable|string',
            'status' => 'nullable|boolean',
            'best_pick' => 'nullable|boolean',
        ]);

        /**
         * =========================
         * 1. BUILD COLORS (ONCE)
         * =========================
         */
        $colors = [];

        foreach ($request->colors ?? [] as $i => $color) {
            $localImages = [];
            $driveIds = [];

            if ($request->hasFile("colors.$i.images")) {
                foreach ($request->file("colors.$i.images") as $img) {

                    // Upload to Google Drive
                    $driveId = $google->uploadImage($img);
                    $driveIds[] = $driveId;

                    // Save local image
                    $filename = time() . '_' . uniqid() . '.' . $img->getClientOriginalExtension();
                    $img->move(public_path('products'), $filename);
                    $localImages[] = 'products/' . $filename;
                }
            }

            $colors[] = [
                'name' => $color['name'] ?? '',
                'code' => $color['code'] ?? '',
                'images' => $localImages, // LOCAL
                'drive_ids' => $driveIds, // GOOGLE DRIVE
            ];
        }

        /**
         * =========================
         * 2. SAVE TO MYSQL (FULL)
         * =========================
         */
        $product = Product::create([
            'name_en' => $validated['name_en'],
            'name_km' => $validated['name_km'],
            'name_ch' => $validated['name_ch'],
            'slug' => Str::slug($validated['name_en']),
            'category_id' => $validated['category_id'],
            'color' => $colors,
            'content_en' => $validated['content_en'] ?? null,
            'content_km' => $validated['content_km'] ?? null,
            'content_ch' => $validated['content_ch'] ?? null,
            'status' => $validated['status'] ?? false,
            'best_pick' => $validated['best_pick'] ?? false,
        ]);

        /**
         * =========================
         * 3. PREPARE COLORS FOR SHEET
         * =========================
         */
        $sheetColors = collect($colors)->map(function ($color) {
            return [
                'name' => $color['name'],
                'code' => $color['code'],
                'drive_ids' => $color['drive_ids'],
            ];
        })->values()->toArray();

        /**
         * =========================
         * 4. SAVE TO GOOGLE SHEET
         * =========================
         */
        $google->appendProduct([
            $product->id,
            $product->name_en,
            $product->name_km,
            $product->name_ch,
            $product->slug,
            $product->category_id,
            json_encode($sheetColors, JSON_UNESCAPED_SLASHES),
            $product->content_en,
            $product->content_km,
            $product->content_ch,
            $product->status ? 1 : 0,
            $product->best_pick ? 1 : 0,
            now()->format('Y-m-d H:i:s'),
        ]);

        return redirect()
            ->route('product_backend.index')
            ->with('success', '✅ Product created successfully!');
    }



    /** EDIT */
    public function edit(Product $product_backend)
    {
        $cats = Category::all();
        return view('admin.products.edit', compact('product_backend', 'cats'));
    }


    // public function update(Request $request, Product $product_backend, GoogleService $google)
    // {
    //     $validated = $request->validate([
    //         'name_en' => 'required|string',
    //         'name_km' => 'required|string',
    //         'name_ch' => 'required|string',
    //         'category_id' => 'required|exists:categories,id',
    //         'colors' => 'nullable|array',
    //         'colors.*.existing_images' => 'nullable|array',
    //         'colors.*.images.*' => 'nullable|image|max:10240',
    //         'content_en' => 'nullable|string',
    //         'content_km' => 'nullable|string',
    //         'content_ch' => 'nullable|string',
    //         'status' => 'nullable|boolean',
    //         'best_pick' => 'nullable|boolean',
    //     ]);

    //     $colors = [];
    //     foreach ($request->colors ?? [] as $i => $color) {
    //         $images = $color['existing_images'] ?? [];

    //         if ($request->hasFile("colors.$i.images")) {
    //             foreach ($request->file("colors.$i.images") as $img) {
    //                 // local storage
    //                 $filename = time() . '_' . uniqid() . '.' . $img->getClientOriginalExtension();
    //                 $img->move(public_path('products'), $filename);
    //                 $images[] = 'products/' . $filename;

    //                 // Google Drive
    //                 $google->uploadImage($img);
    //             }
    //         }

    //         $colors[] = [
    //             'name' => $color['name'] ?? '',
    //             'code' => $color['code'] ?? '',
    //             'images' => $images,
    //         ];
    //     }

    //     // Update MySQL
    //     $product_backend->update([
    //         'name_en' => $validated['name_en'],
    //         'name_km' => $validated['name_km'],
    //         'name_ch' => $validated['name_ch'],
    //         'slug' => Str::slug($validated['name_en']),
    //         'category_id' => $validated['category_id'],
    //         'color' => $colors,
    //         'content_en' => $validated['content_en'] ?? null,
    //         'content_km' => $validated['content_km'] ?? null,
    //         'content_ch' => $validated['content_ch'] ?? null,
    //         'status' => $validated['status'] ?? false,
    //         'best_pick' => $validated['best_pick'] ?? false,
    //     ]);

    //     // Update Google Sheet
    //     $google->updateProduct($product_backend->id, [
    //         $product_backend->id,
    //         $product_backend->name_en,
    //         $product_backend->name_km,
    //         $product_backend->name_ch,
    //         $product_backend->slug,
    //         $product_backend->category_id,
    //         json_encode($colors),
    //         $product_backend->content_en,
    //         $product_backend->content_km,
    //         $product_backend->content_ch,
    //         $product_backend->status,
    //         $product_backend->best_pick,
    //     ]);

    //     return redirect()->route('product_backend.index')
    //         ->with('success', '✅ Product updated successfully!');
    // }


    public function update(Request $request, Product $product_backend, GoogleService $google)
    {
        $validated = $request->validate([
            'name_en' => 'required|string',
            'name_km' => 'required|string',
            'name_ch' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'colors' => 'nullable|array',
            'colors.*.name' => 'nullable|string',
            'colors.*.code' => 'nullable|string',
            'colors.*.existing_images' => 'nullable|array',
            'colors.*.existing_drive_ids' => 'nullable|array',
            'colors.*.images.*' => 'nullable|image|max:10240',
            'deleted_images' => 'nullable|array',
            'content_en' => 'nullable|string',
            'content_km' => 'nullable|string',
            'content_ch' => 'nullable|string',
            'status' => 'nullable|boolean',
            'best_pick' => 'nullable|boolean',
        ]);

        // 1️⃣ Delete explicitly removed images
        foreach ($request->deleted_images ?? [] as $value) {
            if (str_starts_with($value, 'gdrive:')) {
                $google->deleteImage(str_replace('gdrive:', '', $value));
            } elseif (file_exists(public_path($value))) {
                @unlink(public_path($value));
            }
        }

        // 2️⃣ Rebuild colors and upload new images
        $colors = [];

        foreach ($request->colors ?? [] as $i => $color) {
            $localImages = $color['existing_images'] ?? [];
            $driveIds = $color['existing_drive_ids'] ?? [];

            if ($request->hasFile("colors.$i.images")) {
                // Remove old images
                foreach ($localImages as $old) if (file_exists(public_path($old))) @unlink(public_path($old));
                foreach ($driveIds as $oldId) $google->deleteImage($oldId);

                $localImages = [];
                $driveIds = [];

                // foreach ($request->file("colors.$i.images") as $file) {
                //     $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                //     $file->move(public_path('products'), $filename);
                //     $localImages[] = 'products/' . $filename;

                //     $driveId = $google->uploadImage($file);
                //     if ($driveId) $driveIds[] = $driveId;
                // }
                foreach ($request->file("colors.$i.images") as $file) {
                    if (!$file->isValid()) continue;

                    // 1️⃣ Upload to Google Drive first
                    $driveId = $google->uploadImage($file);

                    // 2️⃣ Then save locally
                    $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('products'), $filename);

                    $localImages[] = 'products/' . $filename;
                    if ($driveId) $driveIds[] = $driveId;
                }
            }

            // Skip empty
            if (empty($color['name']) && empty($color['code']) && empty($localImages) && empty($driveIds)) continue;

            $colors[] = [
                'name' => $color['name'] ?? '',
                'code' => $color['code'] ?? '',
                'images' => $localImages,
                'drive_ids' => $driveIds,
            ];
        }

        // 3️⃣ Update MySQL
        $product_backend->update([
            'name_en' => $validated['name_en'],
            'name_km' => $validated['name_km'],
            'name_ch' => $validated['name_ch'],
            'slug' => Str::slug($validated['name_en']),
            'category_id' => $validated['category_id'],
            'color' => $colors,
            'content_en' => $validated['content_en'] ?? null,
            'content_km' => $validated['content_km'] ?? null,
            'content_ch' => $validated['content_ch'] ?? null,
            'status' => $validated['status'] ?? false,
            'best_pick' => $validated['best_pick'] ?? false,
        ]);

        // 4️⃣ Update Google Sheet
        $sheetColors = collect($colors)->map(fn($c) => [
            'name' => $c['name'],
            'code' => $c['code'],
            'drive_ids' => array_values($c['drive_ids']),
        ])->values()->toArray();

        $google->updateProduct($product_backend->id, [
            $product_backend->id,
            $product_backend->name_en,
            $product_backend->name_km,
            $product_backend->name_ch,
            $product_backend->slug,
            $product_backend->category_id,
            json_encode($sheetColors, JSON_UNESCAPED_SLASHES),
            $product_backend->content_en,
            $product_backend->content_km,
            $product_backend->content_ch,
            $product_backend->status ? 1 : 0,
            $product_backend->best_pick ? 1 : 0,
        ]);

        return redirect()->route('product_backend.index')->with('success', '✅ Product updated successfully!');
    }




    /** DELETE ITEM + CLOUDINARY IMAGES */
    // public function delete(Product $product_backend, GoogleService $google)
    // {
    //     // Delete local images
    //     foreach ($product_backend->color ?? [] as $color) {
    //         foreach ($color['images'] ?? [] as $imgPath) {
    //             $fullPath = public_path($imgPath);
    //             if (file_exists($fullPath)) {
    //                 unlink($fullPath);
    //             }
    //         }
    //     }

    //     // Delete from Google Sheet
    //     $google->deleteProduct($product_backend->id);

    //     // Delete from MySQL
    //     $product_backend->delete();

    //     return redirect()->route('product_backend.index')
    //         ->with('success', '✅ Product deleted successfully!');
    // }

    public function delete(Product $product_backend, GoogleService $google)
    {
        DB::transaction(function () use ($product_backend, $google) {

            // 1️⃣ Delete local images & Google Drive images
            foreach ($product_backend->color ?? [] as $color) {
                if (empty($color)) continue;

                // Local images
                foreach ($color['images'] ?? [] as $imgPath) {
                    $fullPath = public_path($imgPath);
                    if (file_exists($fullPath)) {
                        try {
                            @unlink($fullPath);
                        } catch (\Throwable $e) {
                            logger()->error("Failed to delete local image: $imgPath", ['exception' => $e]);
                        }
                    }
                }

                // Google Drive images
                foreach ($color['drive_ids'] ?? [] as $driveId) {
                    if (!$google->deleteImage($driveId)) {
                        logger()->warning("Failed to delete Drive image: $driveId");
                    }
                }
            }

            // 2️⃣ Delete from Google Sheet
            try {
                $google->deleteProduct($product_backend->id);
            } catch (\Throwable $e) {
                logger()->error("Failed to delete product from Google Sheet: {$product_backend->id}", ['exception' => $e]);
            }

            // 3️⃣ Delete from MySQL
            $product_backend->delete();
        });

        return redirect()->route('product_backend.index')
            ->with('success', '✅ Product deleted successfully!');
    }
}
