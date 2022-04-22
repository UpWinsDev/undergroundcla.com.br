<?php

use App\Models\Torneios;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTorneiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('torneios', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('descricao')->nullable();
            $table->unsignedBigInteger('id_game');
            $table->string('qtd_players')->nullable();
            $table->string('valor_inscricao')->nullable();
            $table->string('premicacao')->nullable();
            $table->string('duracao_media')->nullable();
            $table->string('data_evento')->nullable();
            $table->string('imagem')->nullable();
            $table->timestamps();

            $table->foreign('id_game')->references('id')->on('games');
        });

        

        $data =  array(
            ['titulo' => 'Se vira nos 30', 'descricao'=> 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry unchanged.', 'id_game' => 1, 'qtd_players' => '20', 'valor_inscricao' => '15.00', 'premicacao' => '1, 2', 'duracao_media' => '2 horas', 'data_evento' => '15/01/2022', 'imagem' => '/imd/asdf.png'],['titulo' => 'Se vira nos 40', 'descricao'=> 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry unchanged.', 'id_game' => 1, 'qtd_players' => '50', 'valor_inscricao' => '15.00', 'premicacao' => '1, 2', 'duracao_media' => '2 horas', 'data_evento' => '15/01/2022', 'imagem' => '/imd/asdf.png']
        );

        $this->postCreate($data);
    }

    private function postCreate($roles)  {
        foreach ($roles as $role) {

            $model = new Torneios();
            $model->setAttribute('titulo', $role['titulo']);
            $model->setAttribute('descricao', $role['descricao']);
            $model->setAttribute('id_game', $role['id_game']);
            $model->setAttribute('qtd_players', $role['qtd_players']);
            $model->setAttribute('valor_inscricao', $role['valor_inscricao']);
            $model->setAttribute('premicacao', $role['premicacao']);
            $model->setAttribute('duracao_media', $role['duracao_media']);
            $model->setAttribute('data_evento', $role['data_evento']);
            $model->setAttribute('imagem', $role['imagem']);
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
        Schema::dropIfExists('torneios');
    }
}
