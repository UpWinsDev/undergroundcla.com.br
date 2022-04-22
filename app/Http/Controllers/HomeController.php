<?php

namespace App\Http\Controllers;

use App\Models\Games;
use App\Models\Patrocinadores;
use App\Models\Players;
use App\Models\PlayerTimes;
use App\Models\Torneios;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /* public function __construct()
    {
        $this->middleware('auth');
    } */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $torneios = Torneios::orderBy('data_evento', 'DESC')->limit(4)->get();
        //

        $users = User::where([
            'nivel' => 1
        ])->limit(4)->get();

        $games = Games::all();

        

        $patrocinadores = Patrocinadores::all();

        $playersPatrocinados = Players::where([
            'patrocinar_streamer' => 1
        ])->limit(4)->get();

        $playersTimes = PlayerTimes::all();

        //dd($users[0]->user_players[0]);

        //dd($games[0]->games_time[0]->time_playes[0]);

        return view('website.home.index',['torneios' => $torneios, 'users' => $users, 'games' => $games, 'patrocinadores' => $patrocinadores, 'playersPatrocinados' => $playersPatrocinados, 'playersTimes'=>$playersTimes]);

    }

    public function sobre(){

        $patrocinadores = Patrocinadores::all();

        $users = User::where([
            'nivel' => 1
        ])->limit(4)->get();
        
        return view('website.sobre.index',['users' => $users,'patrocinadores' => $patrocinadores]);
    }

    public function torneios(){

        $torneios = Torneios::orderBy('data_evento', 'DESC')->limit(4)->get();

        $patrocinadores = Patrocinadores::all();
        
        return view('website.torneios.index',['torneios'=>$torneios,'patrocinadores' => $patrocinadores]);
    }

    public function recrutamento(){

        $torneios = Torneios::orderBy('data_evento', 'DESC')->limit(4)->get();

        $patrocinadores = Patrocinadores::all();
        
        return view('website.recrutamento.index',['torneios'=>$torneios,'patrocinadores' => $patrocinadores]);
    }

    public function contribuir(){

        $torneios = Torneios::orderBy('data_evento', 'DESC')->limit(4)->get();

        $patrocinadores = Patrocinadores::all();
        
        return view('website.contribuir.index',['torneios'=>$torneios,'patrocinadores' => $patrocinadores]);
    }

}
