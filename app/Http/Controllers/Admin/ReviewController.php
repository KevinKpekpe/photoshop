<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with(['product', 'user'])->latest()->paginate(20);
        return view('admin.reviews.index', compact('reviews'));
    }

    public function show(Review $review)
    {
        return view('admin.reviews.show', compact('review'));
    }

    public function update(Request $request, Review $review)
    {
        $validatedData = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        $review->update($validatedData);

        return redirect()->route('admin.reviews.show', $review)->with('success', 'Avis mis à jour avec succès.');
    }

    public function destroy(Review $review)
    {
        $review->update(['actif' => false]);
        return redirect()->route('admin.reviews.index')->with('success', 'Avis désactivé avec succès.');
    }
}
