<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre', 150);
            $table->text('descripcion');
            $table->string('resumen', 200);
            $table->decimal('precio', 5, 2);
            $table->string('imagen', 300);
            $table->boolean('visible');
            $table->bigInteger('idcategoria')->unsigned();
            $table->foreign('idcategoria')
                  ->references('id')
                  ->on('categorias')
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articulos');
    }
}
