<?php

namespace App\Http\Controllers;

use App\Models\Games;
use App\Models\Times;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TimesController extends Controller
{
 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        
        $times = Times::all();
        //
        return view('admin.times.index',['times' => $times]);
    } 

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showForm()
    {
        //

        $games = Games::all();

        return view('admin.times.create', ['games'=> $games]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        try {

            //save in database
            $itens = Times::create([
                'nome' => $request->titulo,
                'descricao' => $request->descricao,
                'id_game'=> $request->id_game
            ]);

            
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
     * Show the form for editing the specified resource.
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $time = Times::findOrFail($id);
        $games = Games::all();
        
        return view('admin.times.edit', ['time'=>$time, 'games'=>$games]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Games  $games
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        try {

            $time = Times::findOrFail($id);

            $dados = [
                'nome' => $request->titulo, 
                'descricao' => $request->descricao,
                'id_game' => $request->id_game
                
            ];


            $time->update($dados);
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
     * @param  \App\Models\Games  $games
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //

         try {
            $time = Times::findOrFail($id);
            $time->delete();

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
