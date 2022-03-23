
@extends('MasterLogIn')

@section('body')

	<form class="form-horizontal" id="FormLogin" action="{{ url('/validarlogin') }}" method="POST">
	@csrf
		<div class="login">
			<div class="login-screen">
				<div class="app-title">
					<h1>Personas</h1>
				</div>

				<div class="login-form">
					<div class="control-group">
					<input type="text" class="login-field" value="" placeholder="Correo" id="correo" name="correo">
					<label class="login-field-icon fui-user" for="login-name"></label>
					</div>

					<div class="control-group">
					<input type="password" class="login-field" value="" placeholder="Contraseña" id="pass" name="pass">
					<label class="login-field-icon fui-lock" for="login-pass"></label>
					</div>

					<button type="submit" class="btn btn-primary btn-large btn-block">Iniciar sesión</button>
				</div>
			</div>
		</div>
	</form>

@stop
	
		