<?php

namespace App\Http\Controllers;

use App\Models\Games;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $games = Games::all();
        //
        return view('admin.games.index',['games' => $games]);
    } 

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showForm()
    {
        //
        return view('admin.games.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        

        try {

            // Handle File Upload
            if($request->hasFile('arquivo')){
                // Get filename with the extension
                $filenameWithExt = $request->file('arquivo')->getClientOriginalName();
                // Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $request->file('arquivo')->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore= $filename.'_'.time().'.'.$extension;
                // local arquivo
                $localFile = 'public/img/games';
                // Upload Image
                $path = $request->file('arquivo')->storeAs($localFile, $fileNameToStore);
            } else {
                $fileNameToStore = 'noimage.png';
            }

            if($request->game_principal == 'on'){
                $request->game_principal = "1";
            }
            
            //save in database
            $itens = Games::create([
                'nome' => $request->titulo,
                'descricao' => $request->descricao,
                'ativo'=> $request->game_principal,
                'imagem' => $fileNameToStore
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
     * Display the specified resource.
     *
     * @param  \App\Models\Games  $games
     * @return \Illuminate\Http\Response
     */
    public function show(Games $games)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Games  $games
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $game = Games::findOrFail($id);
        return view('admin.games.edit', ['game'=>$game]);
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
        if($request->game_principal == 'on'){
            $request->game_principal = "1";
        }


        try {

            $game = Games::findOrFail($id);

            $dados = [
                'nome' => $request->titulo, 
                'ativo'=> $request->game_principal,
                'descricao' => $request->descricao
                
                
            ];

            
            // Handle File Upload
            if($request->hasFile('arquivo')){

                // Deleta imagens anterior

                // Get filename with the extension
                $filenameWithExt = $request->file('arquivo')->getClientOriginalName();
                // Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $request->file('arquivo')->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore= $filename.'_'.time().'.'.$extension;
                // local arquivo
                $localFile = 'public/img/games';
                // Upload Image
                $path = $request->file('arquivo')->storeAs($localFile, $fileNameToStore);

                if($path){
                    Storage::delete($localFile.'/'.$game->imagem);
                    $dados['imagem'] = $fileNameToStore;
                }

                

            } else {
                // Não atualiza imagem
            }

            $game->update($dados);
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
            $game = Games::findOrFail($id);
            
            if($game->delete()){
                Storage::delete("public/img/games/{$game->imagem}");
            }
        }
        catch (QueryException $exception) {
            $request->session()
            ->flash(
                'mensagem-falha',
                'Falha ao deletar, Provavelmente o game esta vinculado a um time.'
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
