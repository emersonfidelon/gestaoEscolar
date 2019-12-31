<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCollumnsToAlunosExtra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('alunos', function (Blueprint $table) {
            $table->string('cpf');
            $table->string('sus');
            $table->string('plano_saude')->nullable();
            $table->string('hospital_emergencia')->nullable();
            $table->string('cpf_mae');
            $table->string('telefone_mae');
            $table->string('cpf_pai')->nullable();
            $table->string('telefone_pai')->nullable();
            $table->string('responsavel')->nullable();
            $table->string('cpf_responsavel')->nullable();
            $table->string('telefone_responsavel')->nullable();
            $table->integer('pai_responsavel_user_id')->nullable();
            $table->string('cep')->nullable();
            $table->string('logradouro')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cidade')->nullable();
            $table->string('estado')->nullable();
            $table->longText('observacao')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('alunos', function (Blueprint $table) {
            $table->dropColumn('cpf');
            $table->dropColumn('sus');
            $table->dropColumn('plano_saude');
            $table->dropColumn('hospital_emergencia');
            $table->dropColumn('cpf_mae');
            $table->dropColumn('telefone_mae');
            $table->dropColumn('cpf_pai');
            $table->dropColumn('telefone_pai');
            $table->dropColumn('responsavel');
            $table->dropColumn('cpf_responsavel');
            $table->dropColumn('telefone_responsavel');
            $table->dropColumn('pai_responsavel_user_id');
            $table->dropColumn('cep');
            $table->dropColumn('logradouro');
            $table->dropColumn('bairro');
            $table->dropColumn('cidade');
            $table->dropColumn('estado');
            $table->dropColumn('observacao');
        });
    }
}
