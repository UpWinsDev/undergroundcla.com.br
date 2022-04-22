<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('avatar');
            $table->string('email')->unique()->nullable();
            $table->string('steamid')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('nivel');
            $table->string('ativo');
            $table->rememberToken();
            $table->timestamps();
        });

        $data =  array(
            ['name' => '', 'username'=> 'wedleys8', 'avatar' => 'https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/45/4528edee36f62b2a1fe1195557c80f158ff654ca_full.jpg', 'steamid' => '76561198875386352', 'nivel' => '1', 'ativo' => '1']
        );

        $this->postCreate($data);
    }

    private function postCreate($roles)  {
        foreach ($roles as $role) {

            $model = new User();
            $model->setAttribute('username', $role['username']);
            $model->setAttribute('avatar', $role['avatar']);
            $model->setAttribute('steamid', $role['steamid']);
            $model->setAttribute('nivel', $role['nivel']);
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
        Schema::dropIfExists('users');
    }
}
