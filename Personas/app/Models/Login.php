<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Tb_Login extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    protected $table = "tb_usuarios";

	public $timestamps = false;

    protected $primaryKey = 'id';
    
    protected $fillable = ['idticket', 'fecharegistro', 'compromisos'];

    public function GetUsuario($correo)
	{ 
        $user = Tb_Login::where('correo', $correo)->get();
        
        return $user;
    }
}
