<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;


class APIController extends Controller
{   
    public function AgregarUsuario($Nombre, $ApellidoPaterno, $ApellidoMaterno, $RFC, $FechaNacimiento, $Fecha, $IdUsuario)
    {
        try
        {
            $client = new Client();
            
            $response = $client->request('POST', 'https://localhost:44355/api/Persona/Agregar', 
            [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Basic dUFwaVRva2FpbnRlcm5hY2lvbmFsOmpeRmt0MyZGQWhEVXVyWGI='
                    ],
                'json' => [
                    "nombre" => "string",
                    "apellidoPaterno" => "string",
                    "apellidoMaterno" => "string",
                    "rfc" => "string",
                    "fechaNacimiento" => "2022-03-22T17:44:25.107Z",
                    "usuarioAgrega" => 0
                 ]
            ]);
                        
            $respuesta = json_decode($response->getBody()->GetContents());

            return $respuesta;

        } catch (ClientException $exception) {
            
            $respuesta = $exception->getResponse()->getBody(true);

            return $respuesta;
        }
    } 
    
    public function ActualizarUsuario($Nombre, $ApellidoPaterno, $ApellidoMaterno, $RFC, $FechaNacimiento, $Fecha, $IdUsuario)
    {
        try
        {
            $client = new Client();
            
            $response = $client->request('PUT', 'https://localhost:44355/api/Persona/Actualizar', 
            [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Basic dUFwaVRva2FpbnRlcm5hY2lvbmFsOmpeRmt0MyZGQWhEVXVyWGI='
                    ],
                'json' => [
                    "idPersonaFisica" => 0,
                    "nombre" => "string",
                    "apellidoPaterno" => "string",
                    "apellidoMaterno" => "string",
                    "rfc" => "string",
                    "fechaNacimiento" => "2022-03-22T17:44:25.107Z",
                    "usuarioAgrega" => 0
                 ]
            ]);
                        
            $respuesta = json_decode($response->getBody()->GetContents());

            return $respuesta;

        } catch (ClientException $exception) {
            
            $respuesta = $exception->getResponse()->getBody(true);

            return $respuesta;
        }
    }

    public function EliminarUsuario($IdPersonaFisica)
    {
        try
        {
            $client = new Client();
            
            $response = $client->request('DELETE', 'https://localhost:44355/api/Persona/Eliminar?IdPersonaFisica='.$IdPersonaFisica, 
            [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Basic dUFwaVRva2FpbnRlcm5hY2lvbmFsOmpeRmt0MyZGQWhEVXVyWGI='
                    ],
                'json' => []
            ]);
                        
            $respuesta = json_decode($response->getBody()->GetContents());

            return $respuesta;

        } catch (ClientException $exception) {
            
            $respuesta = $exception->getResponse()->getBody(true);

            return $respuesta;
        }
    }

    public function ObtenerUsuario()
    {
        try
        {
            //dd($tarjeta.' - '.$idusuario);
            $client = new Client();

            $response = $client->request('GET', 'https://localhost:44355/api/Persona/Obtener', 
            [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Basic ZGVtbzpwQDU1dzByZA=='
                   
                    ],
                'json' => []
            ]);
                        
            $respuesta = json_decode($response->getBody()->GetContents());

            dd($respuesta);

            return $respuesta;

        } catch (ClientException $exception) {
            
            $respuesta = $exception->getResponse()->getBody(true);

            return $respuesta;
        }
    } 

    public function GetToken()
    {
        try
        {
            //dd($tarjeta.' - '.$idusuario);
            $client = new Client();

            $response = $client->request('POST', 'https://api.toka.com.mx/candidato/api/login/authenticate', 
            [
                'headers' => [
                    'Content-Type' => 'application/json'
                    ],
                'json' => [
                    "Username" => 'ucand0021',
                    "Password" => 'yNDVARG80sr@dDPc2yCT!'
                    ]
            ]);
                        
            $respuesta = json_decode($response->getBody()->GetContents());

            return $respuesta;

        } catch (ClientException $exception) {
            
            $respuesta = $exception->getResponse()->getBody(true);

            return $respuesta;
        }
    }   

    public function GetRegistros($Token)
    {
        try
        {
            //dd($tarjeta.' - '.$idusuario);
            $client = new Client();

            $response = $client->request('GET', 'https://api.toka.com.mx/candidato/api/customers', 
            [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'AuthorizationBearer' => 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1bmlxdWVfbmFtZSI6InVjYW5kMDAyMSIsInJvbGUiOiJEZXZlbG9wZXIiLCJuYmYiOjE2NDc5NzMyMDEsImV4cCI6MTY0Nzk3MzM4MSwiaWF0IjoxNjQ3OTczMjAxLCJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjQyMDAiLCJhdWQiOiJodHRwOi8vbG9jYWxob3N0OjQyMDAifQ.2JhfcdbsllJnoPVSFQxDQDc3bt4OJAEjb-z9aBJohiQ'
                    ],
                'json' => []
            ]);
                        
            $respuesta = json_decode($response->getBody()->GetContents());

            return $respuesta;

        } catch (ClientException $exception) {
            
            $respuesta = $exception->getResponse()->getBody(true);

            return $respuesta;
        }
    }   
}








