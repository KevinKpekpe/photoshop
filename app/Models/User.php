<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Notifications\ResetPasswordNotification;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements CanResetPassword
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'postnom',
        'prenom',
        'sexe',
        'date_naissance',
        'adresse',
        'telephone',
        'code_postal',
        'photo',
        'email',
        'password',
        'role',
        'google_id',
        'code',
        'actif',
        'email_verification_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'date_naissance' => 'date',
    ];

    /**
     * Relation avec les commandes (orders).
     * Un utilisateur peut avoir plusieurs commandes.
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Relation avec les avis (reviews).
     * Un utilisateur peut avoir plusieurs avis.
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Relation avec la liste de souhaits (wishlists).
     * Un utilisateur peut avoir plusieurs articles dans sa liste de souhaits.
     */
    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

        /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));

    }
}
