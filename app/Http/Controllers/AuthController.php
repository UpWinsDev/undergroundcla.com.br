<?php

namespace App\Http\Controllers;

use App\Models\Players;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Invisnik\LaravelSteamAuth\SteamAuth;



class AuthController extends Controller
{
    /**
     * The SteamAuth instance.
     *
     * @var SteamAuth
     */
    protected $steam;

    /**
     * The redirect URL.
     *
     * @var string
     */
    protected $redirectURL = '/';

    /**
     * AuthController constructor.
     * 
     * @param SteamAuth $steam
     */
    public function __construct(SteamAuth $steam)
    {
        $this->steam = $steam;
    }

    /**
     * Redirect the user to the authentication page
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function redirectToSteam()
    {
        return $this->steam->redirect();
    }

    /**
     * Get user info and log in
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function handle()
    {

        



        //! LOGIN TEMPORARIO
        //$idsteam = ['steamID64'=> '76561198875386352'];
        //$idsteam = ['steamID64'=> '4654654'];
        //$idsteam = ['steamID64'=> '6546545'];
        //dd('76561198875386352');
        /* if($idsteam){

            $user = User::where('steamid', $idsteam)->first();
            Auth::login($user, true);
            
            // direcionar niveis de acesso
    
            if(Auth::user()->nivel == 1){
                
                return view('admin.dashboard.index');   
            }else{
                
                return redirect()->route('home.index');
            }
        } */
        //! LOGIN TEMPORARIO

   

        if ($this->steam->validate()) {
            $info = $this->steam->getUserInfo();

            if (!is_null($info)) {
                /* $user = $this->findOrNewUser($info);

                Auth::login($user, true);

                return redirect($this->redirectURL); */ // redirect to site

                $user = $this->findOrNewUser($info);
                Auth::login($user, true);

                //Liberar area adm por player
                //Players::findOrFail(Auth::user());
                
                // direcionar niveis de acesso

                if(Auth::user()->nivel == 1){
                 
                    return view('admin.dashboard.index');
                }else{
                    
                    return redirect()->route('home.index');
                }


            }
        }
        return $this->redirectToSteam();
    }

    /**
     * Getting user by info or created if not exists
     *
     * @param $info
     * @return User
     */
    protected function findOrNewUser($info)
    {

        

        $user = User::where('steamid', $info->steamID64)->first();

        if (!is_null($user)) {
            return $user;
        }

        return User::create([
            'username' => $info->personaname,
            'avatar' => $info->avatarfull,
            'steamid' => $info->steamID64,
            'nivel' => 0,
            'ativo' => 1
        ]);


         
    }


}
