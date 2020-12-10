<?php

use Illuminate\Database\Seeder;
use App\producto;
class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p = new producto();
        $p->Nombre='Uva blanca sin semilla por kilo';
        $p->Descripcion = 'Sin duda, una fruta dulce que destaca por la facilidad de consumirla en cualquier momento es la uva blanca. Este alimento resulta siempre una gran opción para tener a la mano en casa. ';
        $p->Cantidad=10;
        $p->Precio="74.52";
        $p->category_id = 1;
        $p->categoria_id = 1;
        
        $p->Url_imag="\img\productos/uvasBlancas.jpg";
        $p->save();

        $p = new producto();
        $p->Nombre='Cerveza oscura Victoria 12 Latas de 355 ml c/u';
        $p->Descripcion = 'La cerveza oscura Victoria, ofrece un sabor exquisito y refrescante. Ideal para acompañar con diferentes tipos de platillos. Es una cerveza premium tipo lager y con estilo Vienna, color oscuro. ';
        $p->Cantidad=10;
        $p->Precio="163.00";
        $p->category_id = 2;
        $p->categoria_id = 2;
        $p->Url_imag="\img\productos/CervezaVictoria12Lata.jpg";
        $p->save();
        
        $p = new producto();
        $p->Nombre='Café soluble Nescafé clásico 225 g';
        $p->Descripcion = 'Si lo que quieres es comenzar tu día con la energía suficiente para realizar tu actividades al máximo, este café es para ti. Se trata del delicioso sabor de Nescafé clásico en su presentación de 225 gramos.';
        $p->Cantidad=10;
        $p->Precio="96.50";
        $p->category_id = 3;
        $p->categoria_id = 3;
        $p->Url_imag="\img\productos/cafe_nescafe.jpg";
        $p->save();

    }
}
