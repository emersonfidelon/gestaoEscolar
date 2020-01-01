<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCollumOnMatriculas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('matriculas', function (Blueprint $table) {
            $table->integer('ano_letivo_id');
            $table->integer('serie_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('matriculas', function (Blueprint $table) {
            $table->dropColumn('ano_letivo_id');
            $table->dropColumn('serie_id');
        });
    }
}
