<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{
    protected $table = 'categorias';

    protected $fillable=['Nombre'];
    public function products()
    {
        return $this->hasMany(producto::class)->withTimestamps();
    }
}
