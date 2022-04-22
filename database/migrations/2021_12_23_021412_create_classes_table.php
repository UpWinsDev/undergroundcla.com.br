<?php

use App\Models\Classes;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->timestamps();
        });

        $data =  array(
            ['nome' => 'Administrador'],['nome' => 'Player']
        );

        $this->postCreate($data);
    }

    private function postCreate($roles)  {
        foreach ($roles as $role) {

            $model = new Classes();
            $model->setAttribute('nome', $role['nome']);
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
        Schema::dropIfExists('classes');
    }
}
