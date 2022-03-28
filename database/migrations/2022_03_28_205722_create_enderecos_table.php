<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnderecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->bigIncrements('id')->nullable(false);
            $table->string('cep')->unique()->nullable(false);
            $table->string('logradouro')->nullable(false);
            $table->string('complemento')->nullable(false);
            $table->string('bairro')->nullable(false);
            $table->string('localidade')->nullable(false);
            $table->char('uf', 2)->nullable(false);
            $table->integer('ibge')->nullable(false);
            $table->integer('gia')->nullable(false);
            $table->integer('ddd')->nullable(false);
            $table->integer('siafi')->nullable(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enderecos');
    }
}
