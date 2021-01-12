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
        
        $p->Url_imag="/img/productos/uvasBlancas.jpg";
        $p->save();

        $p = new producto();
        $p->Nombre='Fresas 454 g';
        $p->Descripcion = 'Aprovecha todos los beneficios de la fresa con este paquete que te permitirá crear alimentos saludables. ';
        $p->Cantidad=42;
        $p->Precio="59.00";
        $p->category_id = 1;
        $p->categoria_id = 1;
        
        $p->Url_imag="/img/productos/Fresas.jpg";
        $p->save();

        $p = new producto();
        $p->Nombre='Papa blanca alfa por kilo';
        $p->Descripcion = 'La papa es uno de los ingredientes más utilizados dentro de la gastronomía mexicana. Prepara para tu familia deliciosos platillos de la comida mexicana como una sopa de papa. ';
        $p->Cantidad=17;
        $p->Precio="24.90";
        $p->category_id = 1;
        $p->categoria_id = 1;
        
        $p->Url_imag="/img/productos/PapaBlanca.jpg";
        $p->save();

        $p = new producto();
        $p->Nombre='Zanahoria por kilo';
        $p->Descripcion = 'Este versátil vegetal es rico en beta caroteno, hierro, calcio, potasio y vitamina A, del grupo B y C. Además es un alimento con alto contenido en fibra, lo que favorece nuestro sistema digestivo.';
        $p->Precio="15.90";
        $p->category_id = 1;
        $p->categoria_id = 1;
        $p->Cantidad=13;
        $p->Url_imag="/img/productos/Zanahoria.jpg";
        $p->save();

        $p = new producto();
        $p->Nombre='Cerveza oscura Victoria 12 Latas de 355 ml c/u';
        $p->Descripcion = 'La cerveza oscura Victoria, ofrece un sabor exquisito y refrescante. Ideal para acompañar con diferentes tipos de platillos. Es una cerveza premium tipo lager y con estilo Vienna, color oscuro. ';
        $p->Cantidad=78;
        $p->Precio="163.00";
        $p->category_id = 2;
        $p->categoria_id = 2;
        $p->Url_imag="/img/productos/CervezaVictoria12Lata.jpg";
        $p->save();

        $p = new producto();
        $p->Nombre='Cerveza clara Coronita extra 12 botellas de 210 ml c/u';
        $p->Descripcion = 'Cerveza Corona es la cerveza de origen 100% mexicano más vendida en el mundo. Su origen data de 1925, y hoy en día está presente en más de 120 países, solo producida en México, y dedicada a promover lo mejor de nuestra cultura mexicana en el mundo.';
        $p->Cantidad=45;
        $p->Precio="110.00";
        $p->category_id = 2;
        $p->categoria_id = 2;
        $p->Url_imag="/img/productos/CevezaCoranaLata12.jpg";
        $p->save();

        $p = new producto();
        $p->Nombre='Ron Bacardí Carta Blanca Superior 980 ml';
        $p->Descripcion = 'Bacardí Carta Blanca es un ron blanco, suave y aromático con notas florales y afrutadas (durazno, coco y plátano). Sus notas ligeras de vainilla y de almendra provienen de su reposo en barricas de roble blanco americano.';
        $p->Cantidad=15;
        $p->Precio="210.00";
        $p->category_id = 2;
        $p->categoria_id = 2;
        $p->Url_imag="/img/productos/Bacardi.jpg";
        $p->save();
        
        $p = new producto();
        $p->Nombre='Café soluble Nescafé clásico 225 g';
        $p->Descripcion = 'Si lo que quieres es comenzar tu día con la energía suficiente para realizar tu actividades al máximo, este café es para ti. Se trata del delicioso sabor de Nescafé clásico en su presentación de 225 gramos.';
        $p->Cantidad=10;
        $p->Precio="96.50";
        $p->category_id = 3;
        $p->categoria_id = 3;
        $p->Url_imag="/img/productos/cafe_nescafe.jpg";
        $p->save();

        $p = new producto();
        $p->Nombre='Plátano Chiapas por kg';
        $p->Descripcion = 'Inicia tu día con un desayuno completo que te llene de energía para realizar tus actividades diarias. Prepara un cóctel de frutas, un licuado de plátano o alguna receta de comida que lleve alimentos con potasio.';
        $p->Cantidad=4;
        $p->Precio="23";
        $p->category_id = 1;
        $p->categoria_id = 1;
        $p->Url_imag="/img/productos/platanos.jpg";
        $p->save();

        $p = new producto();
        $p->Nombre='Cerveza Noche Buena Bohemia 12 pzas de 355 ml c/u';
        $p->Descripcion = 'Cerveza Noche Buena en pack de 12 piezas de 355 ml cada una, ideal para compartir.';
        $p->Cantidad=4;
        $p->Precio="198.00";
        $p->category_id = 1;
        $p->categoria_id = 1;
        $p->Url_imag="/img/productos/NocheBuena.jpg";
        $p->save();

    }
}
