<?php

use App\Models\Players;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_classe');
            $table->string('nome');
            $table->string('email')->nullable();
            $table->string('nasc');
            $table->string('recrutado');
            $table->string('descricao')->nullable();
            $table->string('patrocinar_streamer')->nullable();
            $table->string('ativo');
            $table->string('arquivo');
            $table->timestamps();
            

            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_classe')->references('id')->on('classes');
        

        });

        $data =  array(
            ['id_user' => 1, 'id_classe'=> 1, 'nome' => 'Carlos', 'email' => 'Carlos@gmail.com', 'nasc' => '20/45/1992', 'recrutado' => 0, 'descricao' => 'the sims 2horas jogando', 'patrocinar_streamer' => 0, 'arquivo' => 'arquivo/cnh.pnj','ativo' => 1]
        );

        $this->postCreate($data);

    }

    private function postCreate($roles)  {
        foreach ($roles as $role) {

            $model = new Players();
            $model->setAttribute('id_user', $role['id_user']);
            $model->setAttribute('id_classe', $role['id_classe']);
            $model->setAttribute('nome', $role['nome']);
            $model->setAttribute('email', $role['email']);
            $model->setAttribute('nasc', $role['nasc']);
            $model->setAttribute('recrutado', $role['recrutado']);
            $model->setAttribute('descricao', $role['descricao']);
            $model->setAttribute('patrocinar_streamer', $role['patrocinar_streamer']);
            $model->setAttribute('arquivo', $role['arquivo']);
            $model->setAttribute('ativo', $role['ativo']);
            $model->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('players');
    }
}
