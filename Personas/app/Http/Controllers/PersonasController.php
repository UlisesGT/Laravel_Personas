<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use App\Http\Controllers\APIController;


class PersonasController extends Controller
{   
    public function Personas()
    {
        $API = new APIController();
        $data["Personas"] = null;//$API->ObtenerUsuario();
    
        return view('pages.Formulario/FormPersonas')->with($data);
    }

    public function Reportes()
    {
        return view('pages.Reportes/Reporte');
    }

    public function GuardarPersona(Request $request){

		$IdPersonaFisica = strip_tags($_POST["IdPersonaFisica"]);
		$Nombre = strip_tags($_POST["Nombre"]);
		$ApellidoPaterno = strip_tags($_POST["ApellidoPaterno"]);
		$ApellidoMaterno = strip_tags($_POST["ApellidoMaterno"]);
		$RFC = strip_tags($_POST["RFC"]);
		$FechaNacimiento = strip_tags($_POST["FechaNacimiento"]);
        
		$IdUsuario = Session::get('idusuario');

        $API = new APIController();

        if($IdPersonaFisica == null)
            $Usuario = $API->AgregarUsuario($Nombre, $ApellidoPaterno, $ApellidoMaterno, $RFC, $FechaNacimiento, $IdUsuario);
        else
            $Usuario = $API->ActualizarUsuario($IdPersonaFisica, $Nombre, $ApellidoPaterno, $ApellidoMaterno, $RFC, $FechaNacimiento, $IdUsuario);
		
		return redirect('/Personas');
	}

    public function EliminarPersona(Request $request){

		$IdPersonaFisica = strip_tags($_POST["IdPersonaFisica"]);

        $API = new APIController();

        $API->EliminarUsuario($IdPersonaFisica);
		
		return redirect('/Personas');
	}

    public function GetToken(Request $request){
        
        $API = new APIController();

        $data = $API->GetToken();
		
		return response()->json($data);
	}

    public function GetRegistros(Request $request){
        
        $API = new APIController();

        $data = $API->GetToken();
        //dd($data->Data);
        $Token = $data->Data;
        $data = $API->GetRegistros($Token);
		
		return response()->json($data);
	}
}








