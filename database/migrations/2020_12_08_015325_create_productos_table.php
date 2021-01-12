<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     * id->identificador unico del producto.
     * NOmbre->Nombre del producto.
     * Descripcion->Descripcion del prodcuto.
     * Cantidad->Cantidad total del producto.
     * Category_id = categoria_id ->Referencia a la categoria a la que pertenece el producto.
     * Url_imag->URL de la ubicacion de laimagen del producto.
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Nombre');
            $table->string('Descripcion');
            $table->bigInteger('Cantidad');
            $table->string('Precio');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('categoria_id');
            $table->string('Url_imag')->nullable();
            $table->timestamps();
            $table->foreign('category_id')
            ->references('id')
            ->on('productos')
            ->onDelete('cascade');
            $table->foreign('categoria_id')
            ->references('id')
            ->on('productos')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
