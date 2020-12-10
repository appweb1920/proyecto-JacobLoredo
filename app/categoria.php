<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{
    protected $table = 'categorias';

    protected $fillable=['Nombre'];
    public function producto()
    {
        return $this->hasMany(producto::class);
    }
}
