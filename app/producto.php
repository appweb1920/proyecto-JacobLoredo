<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    protected $table = 'productos';

    protected $fillable=['Nombre','Descripcion','Cantidad','Precio','category_id','Url_imag'];

    public function category()
    {
        return $this->belongsTo(categoria::class);
    }
    public function carrito()
    {
        return $this->belongsToMany(Carrito::class)->withTimestamps();
    }
}
