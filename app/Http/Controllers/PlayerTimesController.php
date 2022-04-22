<?php

namespace App\Http\Controllers;

use App\Models\Players;
use App\Models\PlayerTimes;
use App\Models\Times;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class PlayerTimesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        
        $playersTime = PlayerTimes::where([
            'id_time' => $id
        ])->get();

        $time = Times::first();

        
        return view('admin.playerTimes.index',['players' => $playersTime, 'time' => $time]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showForm($id)
    {

        //g
        $player = Players::findOrFail($id);
        $times = Times::all();

        return view('admin.playerTimes.create',['times' => $times, 'player' => $player]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id)
    {
        //

        // VERIFICA SE JÁ POSSUI EQUIPE

        $playersTime = PlayerTimes::where([
            'id_time' => $request->time,
            'id_player' => $id
        ])->exists();
 
        if($playersTime){
            $request->session()->flash('mensagem-falha', 'Player já faz parte desse time!');
            return redirect()->back();
        }

        try {

            //save in database
            $playersTimes = PlayerTimes::create([
                'id_player' => $id,
                'id_time' => $request->time,
                'funcao'=> $request->funcao,
                'status' => "0"  
            ]);

            if($request->lider_squad == 'on'){
                $dados['status'] = "1";
            }

            
        }
        catch (QueryException $exception) {
            $request->session()->flash('mensagem-falha', 'Falha ao cadastrar!');
        return redirect()->back();
        }

        $request->session()->flash('mensagem-sucesso', 'Cadastrado com sucesso com sucesso!');
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PlayerTimes  $playerTimes
     * @return \Illuminate\Http\Response
     */
    public function show(PlayerTimes $playerTimes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlayerTimes  $playerTimes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
  
        $playerTime = PlayerTimes::findOrFail($id);

        return view('admin.playerTimes.edit', ['playerTime' => $playerTime]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PlayerTimes  $playerTimes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        try {

            $playerTime = PlayerTimes::findOrFail($id);

            $dados = [
                'funcao' => $request->funcao,
                'status' => "0"     
            ];

            if($request->lider_squad == 'on'){
                $dados['status'] = "1";
            }

            $playerTime->update($dados);
        }
        catch (QueryException $exception) {
            $request->session()->flash('mensagem-falha', 'Erro ao atualizar!');
            return redirect()->back();
        }

        $request->session()->flash('mensagem-sucesso', 'Atualizado com sucesso!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PlayerTimes  $playerTimes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        try {
            $playerTime = PlayerTimes::findOrFail($id);
            $playerTime->delete();

        }
        catch (QueryException $exception) {
            $request->session()
            ->flash(
                'mensagem-falha',
                'Falha ao deletar, Provavelmente esta vinculado a outro cadastro.'
            );

            return redirect()->back();
        }

        $request->session()
            ->flash(
                'mensagem-sucesso',
                'Deletado com sucesso'
            );

            return redirect()->back();
    }
}
