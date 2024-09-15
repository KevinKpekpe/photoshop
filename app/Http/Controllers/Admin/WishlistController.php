<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlists = Wishlist::with(['user', 'product'])->latest()->paginate(20);
        return view('admin.wishlists.index', compact('wishlists'));
    }

    public function show(Wishlist $wishlist)
    {
        return view('admin.wishlists.show', compact('wishlist'));
    }

    public function destroy(Wishlist $wishlist)
    {
        $wishlist->update(['actif' => false]);
        return redirect()->route('admin.wishlists.index')->with('success', 'Liste de souhaits désactivée avec succès.');
    }
}
