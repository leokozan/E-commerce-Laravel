<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comprasCorreto', function (Blueprint $table) {
            $table->id();
            $table->integer('quantidade');
            $table->double('total', 10,2);
            $table->date('data_compra');
            $table->unsignedBigInteger('id_produto');
            $table->foreign('id_produto')->references('id')->on('produtos');
            $table->unsignedBigInteger('id_comprador');
            $table->foreign('id_comprador')->references('id')->on('compradors');
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
        Schema::dropIfExists('comprasCorreto');
    }
};