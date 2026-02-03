<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Banner;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $data['categories'] = Category::get();
        $data['banners'] = Banner::find(5);


        $category = $request->query('category', 'all');

        $query = Product::join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.slug');

        if ($category !== 'all') {
            $query->where('categories.slug', $category);
        }

        // ✅ paginate directly on query builder
        $data['products'] = $query->paginate(12);

         if ($request->ajax()) {
            return view('frontend.partials.product-list', $data)->render();
        }

        return view('frontend.product', $data);
    }

    public function showProduct($id)
    {
        $banners = Banner::find(5);

        $product = Product::where('id', $id)->firstOrFail();

        $relatedItems = Product::with('category')
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->inRandomOrder()
            ->take(8)
            ->get()
            ->map(function ($related) {
                $colors = is_array($related->color) ? $related->color : json_decode($related->color ?? '[]', true);
                $firstColor = $colors[0] ?? null;
                $firstImage = $firstColor['images'][0] ?? null;

                return (object) [
                    'id' => $related->id,
                    // 'name' => $related->name,
                    'slug' => $related->slug,
                    'status' => $related->status,
                    'best_pick' => $related->best_pick,
                    'image' => $firstImage ?? 'assets/images/default.jpg',
                    'color' => $colors,
                ];
            });

        return view('frontend.showProduct', compact('product', 'relatedItems', 'banners'));
    }
}
