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
        Schema::create('cartao', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fisico_id')->constrained('fisico');
            $table->string('cvc','5');
            $table->string('numero', '20');
            $table->date('validade');
            $table->string('tipo', '20');
            $table->tinyInteger('status');
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
        Schema::dropIfExists('cartao');
    }
};
