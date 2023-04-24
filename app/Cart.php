<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    protected $table = 'carts';

    protected $fillable = ['user_id', 'product_id', 'price', 'time', 'quantity', 'date', 'subtotal'];

    public function user()
    {
        return$this->belongsTo(\App\User::class, 'user_id');
    }

    public function product()
    {
        return$this->belongsTo(\App\nogiar_publication_content::class, 'product_id');
    }
}
