<?php

use App\Models\PlayerTimes;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayerTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_times', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_player');
            $table->unsignedBigInteger('id_time');
            $table->string('funcao')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();

            $table->foreign('id_player')->references('id')->on('players');
            $table->foreign('id_time')->references('id')->on('times');
        });

        $data =  array(
            ['id_player' => 1, 'id_time' => 2, 'funcao'=> 'Lider de squad', 'status'=> 1],['id_player' => 1, 'id_time' => 1, 'funcao'=> 'Jogador', 'status' => 0]
        );

        $this->postCreate($data);
    }

    private function postCreate($roles)  {
        foreach ($roles as $role) {

            $model = new PlayerTimes();
            $model->setAttribute('id_player', $role['id_player']);
            $model->setAttribute('id_time', $role['id_time']);
            $model->setAttribute('funcao', $role['funcao']);
            $model->setAttribute('status', $role['status']);
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
        Schema::dropIfExists('player_times');
    }
}
