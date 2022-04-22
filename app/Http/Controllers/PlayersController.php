<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Players;
use App\Models\PlayerTimes;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isNull;

class PlayersController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $players = Players::all();

        $recrutaStatus = [
            0 => 'Pendente',
            1 => 'Aceito',
            2 => 'Rejeitado'
        ];
        //
        return view('admin.players.index',['players' => $players, 'recrutaStatus' => $recrutaStatus]);
    } 

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showTimes($id)
    {

        $playersTime = PlayerTimes::where([
            'id_player' => $id
        ])->get();

       if(empty($playersTime[0])){
            $playersTime = [ ];
       };
        
        return view('admin.players.times',['players' => $playersTime, 'id' => $id]);
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

        $player = Players::findOrFail($id);
        $classes = Classes::all();

        $recrutaStatus = [
            0 => 'Pendente',
            1 => 'Aceito',
            2 => 'Rejeitado'
        ];

        
        return view('admin.players.edit', ['player'=>$player, 'classes'=> $classes, 'recrutaStatus' => $recrutaStatus]);
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

            $player = Players::findOrFail($id);

            $dados = [
                'nome' => $request->nome, 
                'nasc' => $request->nasc,
                'email' => $request->email,
                'descricao' => $request->descricao,
                'id_classe' => $request->id_classe,
                'recrutado' => $request->id_recrutar,
                'patrocinar_streamer' => "0"
            ];

            
            if($request->patrocinar_streamer == 'on'){
                $dados['patrocinar_streamer'] = "1";
            }

 

            $player->update($dados);
        }
        catch (QueryException $exception) {
            $request->session()->flash('mensagem-falha', 'Erro ao atualizar!');
            return redirect()->back();
        }

        $request->session()->flash('mensagem-sucesso', 'Atualizado com sucesso!');
        return redirect()->back();

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Games  $games
     * @return \Illuminate\Http\Response
     */
    public function recrutar(Request $request)
    {
        //
        //dd($request->email);

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
                $localFile = 'public/img/user-doc/'.$idUser.'/';
                // Upload Image
                $path = $request->file('arquivo')->storeAs($localFile, $fileNameToStore);
            } else {
                $fileNameToStore = 'noimage.png';
            }


            $dados = [
                'id_user' => $idUser, 
                'nome' => $request->nome, 
                'email' => $request->email,
                'nasc' => $request->nasc,
                'descricao' => $request->descricao,
                'id_classe' => 2,
                'recrutado' => 0,
                'patrocinar_streamer' => "0",
                'arquivo' => $fileNameToStore,
                'ativo' => 1
            ];

            
            
            $players = Players::create($dados);



        }
        catch (QueryException $exception) {
            $request->session()->flash('mensagem-falha', 'Erro ao Salvar!');
            return redirect()->back();
        }

        $request->session()->flash('mensagem-sucesso', 'Atualizado com sucesso!');
        return redirect()->back();

    }

 
}
