<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Product;
use Illuminate\Support\Str;

class ReviewController extends Controller
{
    public function store(Request $request, $productId)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:1000',
        ]);

        $product = Product::findOrFail($productId);

        $review = new Review();
        $review->product_id = $product->id;
        $review->user_id = auth()->id();
        $review->rating = $request->rating;
        $review->comment = $request->comment;
        $review->code = Str::random(10);
        $review->save();

        return redirect()->back()->with('success', 'Votre avis a été ajouté avec succès.');
    }
}
