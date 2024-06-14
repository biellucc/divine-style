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
        Schema::create('pedido', function (Blueprint $table) {
            $table->id();
            $table->decimal('valor', 8, 2);
            $table->string('status', '20');
            $table->foreignId('fisico_id')->constrained('fisico');
            $table->foreignId('cartao_id')->constrained('cartao');
            $table->foreignId('carrinho_id')->constrained('carrinho');
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
        Schema::dropIfExists('pedido');
    }
};
