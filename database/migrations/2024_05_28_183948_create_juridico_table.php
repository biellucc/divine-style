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
        Schema::create('juridico', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id')->constrained('users');
            $table->string('nomeEmpresarial', '100');
            $table->string('cnpj', '19');
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
        Schema::dropIfExists('juridico');
    }
};
