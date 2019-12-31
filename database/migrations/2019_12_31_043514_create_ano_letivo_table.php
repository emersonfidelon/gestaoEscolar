<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnoLetivoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ano_letivo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('descricao');
            $table->integer('dias_letivos');
            $table->date('dt_inicio');
            $table->date('dt_fim');
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
        Schema::dropIfExists('ano_letivo');
    }
}
