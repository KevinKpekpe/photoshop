<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'price',
        'stock',
        'category_id',
        'marque_id',
        'image',
        'code',
        'actif'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function marque()
    {
        return $this->belongsTo(Marque::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }
       /**
     * Récupère une courte partie de la description.
     *
     * @param int $length Longueur maximale de la description courte
     * @return string
     */
    public function shortDescription($length = 100)
    {
        return strlen($this->description) > $length
            ? substr($this->description, 0, $length) . '...'
            : $this->description;
    }

    /**
     * Formate l'affichage du prix.
     *
     * @return string
     */
    public function formattedPrice()
    {
        return number_format($this->price, 2, ',', ' ') . ' €';
    }
}
