<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Cookie;

use App\Models\Login;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function LogOut()
	{
		\Cookie::queue(\Cookie::forget('myCookie'));
		Session::flush();
		
		return redirect('/');
	}

    public function validarlogin()
	{
		//$modelthis = new Login();
		
		$correo = $_POST['correo'];
		$password = $_POST['pass'];

        //$user = $modelthis->GetUsuario($correo);
			
        if($correo == 'admin@gmail.com')
        {
           if($password == 'PassAdmin2022')
           {
                $this->StartSession('Administrador', $correo, 1);//$user->nombre, $user->idusuario, $user->idnivel);
                        
                if(1 == 1)
                {
                    return redirect('/Personas');
                }
                else
                    return redirect('/');
           }
           else
            return redirect('/');
        }
        else
            return redirect('/');
	}

    public function StartSession($nombre, $Correo, $IdNivel)
	{
		Session::flush();

		Session::put('nombre', $nombre);			
		Session::put('idnivel', $IdNivel);
		Session::put('correo', $Correo);
		Session::put('idusuario', $Correo);
	}
}
