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
        Schema::create('roupa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('juridico_id')->constrained('juridico');
            $table->string('tipo','100');
            $table->string('tamanho', '4');
            $table->string('cor','21');
            $table->text('descricao')->nullable();
            $table->decimal('preco',6,2);
            $table->string('imagem');
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
        Schema::dropIfExists('roupa');
    }
};
