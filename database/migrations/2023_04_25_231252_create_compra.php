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
        Schema::create('compra', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('cartao')->nullable();
            $table->unsignedBigInteger('id_user')->nullable();
            $table->double('total',10,2)->nullable();
            $table->date('data_compra')->nullable();
            $table->unsignedBigInteger('id_status')->nullable();
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_status')->references('id')->on('status_entrega');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compra');
    }
};
