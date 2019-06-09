<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetallePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_pedidos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cantidad');
            $table->decimal('precio',5,2);
            $table->bigInteger('idarticulo')->unsigned();
            $table->foreign('idarticulo')
                  ->references('id')
                  ->on('articulos')
                  ->onDelete('cascade');
            $table->bigInteger('idpedido')->unsigned();
            $table->foreign('idpedido')
                  ->references('id')
                  ->on('pedidos')
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
        Schema::dropIfExists('detalle_pedidos');
    }
}
