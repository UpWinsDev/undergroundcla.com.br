<?php

use App\Models\Times;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('times', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_game');
            $table->string('nome');
            $table->string('descricao')->nullable();
            $table->timestamps();

            $table->foreign('id_game')->references('id')->on('games');
        });

        $data =  array(
            ['id_game' => 1, 'nome' => 'Time_GTA', 'descricao'=> 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry unchanged.'],['id_game' => 2,'nome' => 'Time_vidaloka', 'descricao'=> 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry unchanged.']
        );

        $this->postCreate($data);
    }

    private function postCreate($roles)  {
        foreach ($roles as $role) {

            $model = new Times();
            $model->setAttribute('id_game', $role['id_game']);
            $model->setAttribute('nome', $role['nome']);
            $model->setAttribute('descricao', $role['descricao']);
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
        Schema::dropIfExists('times');
    }
}
