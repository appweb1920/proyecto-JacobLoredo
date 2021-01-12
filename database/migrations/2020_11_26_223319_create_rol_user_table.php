<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateRolUserTable extends Migration
{
    /**
     * Run the migrations.
     * Create table where the id_user and the rol of them is save.
     * id->identificador unico del user-rol.
     * rol_id->referencia al id del rol.
     * user_id->referencia al id del usuario.
     * Se indica que son llaves foreneas
     * @return void
     */
    public function up()
    {
        Schema::create('rol_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('rol_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->foreign('rol_id')
                ->references('id')
                ->on('rols')
                ->onDelete('cascade');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('rol_user');
    }
}
