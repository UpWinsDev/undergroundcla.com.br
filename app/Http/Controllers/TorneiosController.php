<?php

namespace App\Http\Controllers;

use App\Models\Games;
use App\Models\Torneios;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TorneiosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('website.torneio.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAdm()
    {

        $torneios = Torneios::all();
        //
        return view('admin.torneios.index',['torneios' => $torneios]);
    } 

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showForm()
    {

        $games = Games::all();
        //
        return view('admin.torneios.create',['games'=>$games]);
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
                $localFile = 'public/img/torneios';
                // Upload Image
                $path = $request->file('arquivo')->storeAs($localFile, $fileNameToStore);
            } else {
                $fileNameToStore = 'noimage.png';
            }
            //save in database
            $itens = Torneios::create([
                'titulo' => $request->titulo,
                'qtd_players' => $request->qtd_players,
                'premicacao' => $request->premiacao,
                'id_game' => $request->id_game,
                'duracao_media' => $request->duracao_media,
                'valor_inscricao' => $request->valor_inscricao,
                'data_evento' => $request->data_evento,
                'descricao' => $request->descricao,
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
     * @param  \App\Models\Torneios  $torneios
     * @return \Illuminate\Http\Response
     */
    public function show(Torneios $torneios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Torneios  $torneios
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $torneio = Torneios::findOrFail($id);
        $games = Games::all();

        return view('admin.torneios.edit', ['torneio'=>$torneio, 'games' => $games]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Torneios  $torneios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        try {

            $torneio = Torneios::findOrFail($id);

            $dados = [
                'titulo' => $request->titulo,
                'qtd_players' => $request->qtd_players,
                'premicacao' => $request->premiacao,
                'id_game' => $request->id_game,
                'duracao_media' => $request->duracao_media,
                'valor_inscricao' => $request->valor_inscricao,
                'data_evento' => $request->data_evento,
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
                $localFile = 'public/img/torneios';
                // Upload Image
                $path = $request->file('arquivo')->storeAs($localFile, $fileNameToStore);

                if($path){
                    Storage::delete($localFile.'/'.$torneio->imagem);
                    $dados['imagem'] = $fileNameToStore;
                }

                

            } else {
                // Não atualiza imagem
            }

            $torneio->update($dados);
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
     * @param  \App\Models\Torneios  $torneios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //

         try {
            $torneio = Torneios::findOrFail($id);
            
            if($torneio->delete()){
                Storage::delete("public/img/torneios/{$torneio->imagem}");
            }
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
