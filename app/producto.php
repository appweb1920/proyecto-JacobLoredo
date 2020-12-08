<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    protected $table = 'productos';

    protected $fillable=['Nombre','Descripcion','Cantidad','Precio','category_id'];

    public function category()
    {
        return $this->belongsTo(categoria::class);
    }
}
