<?php

namespace App\Http\Controllers;

use App\Models\ContribuicaoEqps;
use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContribuicaoEqpsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $contribuicoes = ContribuicaoEqps::orderBy('id', 'DESC')->limit(4)->get();
        //
        return view('admin.contribuicoes.index',['contribuicoes' => $contribuicoes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Games  $games
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        

        try {
            $idUser = Auth::user()->id;

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
                $localFile = 'public/img/contribuicao/'.$idUser.'/';
                // Upload Image
                $path = $request->file('arquivo')->storeAs($localFile, $fileNameToStore);
            } else {
                $fileNameToStore = 'noimage.png';
            }


            $dados = [
                'id_user' => $idUser, 
                'titulo' => $request->titulo, 
                'email' => $request->email, 
                'descricao' => $request->descricao,
                'imagem' => $fileNameToStore,
                'status' => 0
            ];

            //dd($dados);
            
            $players = ContribuicaoEqps::create($dados);



        }
        catch (QueryExecuted $exception) {
            $request->session()->flash('mensagem-falha', 'Erro ao Salvar!');
            return redirect()->back();
        }

        $request->session()->flash('mensagem-sucesso', 'Atualizado com sucesso!');
        return redirect()->back();

    }
}
