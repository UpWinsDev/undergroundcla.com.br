<?php

namespace App\Http\Controllers;

use App\Models\Patrocinadores;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PatrocinadoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $patrocinadores = Patrocinadores::all();
        //
        return view('admin.patrocinadores.index',['patrocinadores' => $patrocinadores]);
    } 

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showForm()
    {
        //
        return view('admin.patrocinadores.create');
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
                $localFile = 'public/img/patrocinadores';
                // Upload Image
                $path = $request->file('arquivo')->storeAs($localFile, $fileNameToStore);
            } else {
                $fileNameToStore = 'noimage.png';
            }
            //save in database
            $itens = Patrocinadores::create([
                'nome' => $request->titulo,
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
     * Show the form for editing the specified resource.
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $patrocinador = Patrocinadores::findOrFail($id);
        return view('admin.patrocinadores.edit', ['patrocinador'=>$patrocinador]);
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

            $patrocinador = Patrocinadores::findOrFail($id);

            $dados = [
                'nome' => $request->titulo, 
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
                $localFile = 'public/img/patrocinadores';
                // Upload Image
                $path = $request->file('arquivo')->storeAs($localFile, $fileNameToStore);

                if($path){
                    Storage::delete($localFile.'/'.$patrocinador->imagem);
                    $dados['imagem'] = $fileNameToStore;
                }

                

            } else {
                // Não atualiza imagem
            }

            $patrocinador->update($dados);
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
            $patrocinador = Patrocinadores::findOrFail($id);
            
            if($patrocinador->delete()){
                Storage::delete("public/img/patrocinadores/{$patrocinador->imagem}");
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
