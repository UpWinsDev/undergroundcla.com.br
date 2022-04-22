<?php

use App\Models\Games;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('descricao')->nullable();
            $table->string('imagem')->nullable();
            $table->string('ativo')->nullable();
            $table->timestamps();
        });

        $data =  array(
            ['nome' => 'GTA 4', 'descricao'=> 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry unchanged.'],['nome' => 'Minecraft', 'descricao'=> 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry unchanged.']
        );

        $this->postCreate($data);
    }

    private function postCreate($roles)  {
        foreach ($roles as $role) {

            $model = new Games();
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
        Schema::dropIfExists('games');
    }
}
