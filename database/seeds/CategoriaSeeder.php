<?php

use Illuminate\Database\Seeder;
use App\categoria;
class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoria = new categoria();
        $categoria->Nombre = 'Frutas y Verduras';
        $categoria->save();

        $categoria = new categoria();
        $categoria->Nombre = 'Vinos y Licores';
        $categoria->save();

        $categoria = new categoria();
        $categoria->Nombre = 'Jugos y Bebidas';
       
        $categoria->save();
    }
}
