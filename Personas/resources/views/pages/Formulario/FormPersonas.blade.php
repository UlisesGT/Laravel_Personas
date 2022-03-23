@extends('MasterHome')
			
@section('body')

@include('pages.v_head')

@include('pages.v_menu')

            
<div class="card p-3">
    <div class="row">	
    
        <div class="col-lg-12 col-md-12 mb-3">

            <form method="post" action="{{ url('/GuardarPersona') }}" baseurl="{{url('/')}}" files="true" id="FormPersona"  baseurl="{{ url('/') }}" enctype="multipart/form-data" name="Form">
                @csrf
                <div class="card">
                    <div class="card-header"><h4 class="card-title">Formulario persona</h4></div>
                    
                    <div class="row p-3">             
                        <input type="hidden" id="IdPersonaFisica" name="IdPersonaFisica">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <fieldset class="col-lg-4 col-md-4">
                            <label for="userinput8" style="margin-top: 10px;">Nombre</label>
                            <div class="input-group">
                                <input type="text" class="form-control position-relative btn-sm" id="Nombre" name="Nombre" placeholder="" required>
                            </div>
                        </fieldset>  
                        <fieldset class="col-lg-4 col-md-4">
                            <label for="userinput8" style="margin-top: 10px;">Apellido paterno</label>
                            <div class="input-group">
                                <input type="text" class="form-control position-relative btn-sm" id="ApellidoPaterno" name="ApellidoPaterno" placeholder="" required>
                            </div>
                        </fieldset>  
                        <fieldset class="col-lg-4 col-md-4">
                            <label for="userinput8" style="margin-top: 10px;">Apellido materno</label>
                            <div class="input-group">
                                <input type="text" class="form-control position-relative btn-sm" id="ApellidoMaterno" name="ApellidoMaterno" placeholder="" required>
                            </div>
                        </fieldset>   
                        
                        <fieldset class="col-lg-4 col-md-4">
                            <label for="userinput8" style="margin-top: 10px;">RFC</label>
                            <div class="input-group">
                                <input type="text" class="form-control position-relative btn-sm" id="RFC" name="RFC" placeholder="" required>
                            </div>
                        </fieldset> 
                        <fieldset class="col-lg-4 col-md-4">
                            <label for="userinput8" style="margin-top: 10px;">Fecha de nacimiento</label>
                            <div class="input-group">
                                <input type="date" class="form-control position-relative btn-sm" id="FechaNacimiento" name="FechaNacimiento" placeholder="" required>
                            </div>
                        </fieldset>  

                        <fieldset class="col-lg-2 col-md-2">
                            <label for="userinput8" style="margin-top: 10px;color:white;">*</label>
                            <div class="input-group">
                                <button type="submit" style="background:#0C48B0; color:#FFFFFFFF;" class="btn"> Guardar</button></br>
                            </div>
                        </fieldset>  
                        <fieldset class="col-lg-2 col-md-2">
                            <label for="userinput8" style="margin-top: 10px;color:white;">*</label>
                            <div class="input-group">
                                <button type="button" onclick="EliminarUser()" class="btn btn-danger"> Eliminar</button></br>
                            </div>
                        </fieldset>                          

                    </div>
                </div>
            </form>
        </div>

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header"><h4 class="card-title">Reportes</h4></div>
                <form class="form-horizontal" action="{{ url('/ObtenerReporte') }}" method="POST" files="true" enctype="multipart/form-data">
                @csrf
                    
                <div style="overflow-x:auto; height:600px" class="p-3">
                    <table class="table table-striped table-bordered bootstrap-3 tablescroll" baseurl="{{url('/')}}" id="Tablain">
                        <input type="hidden" name="_token2" value="{{ csrf_token() }}" id="val">
                        <thead>
                            <tr align="center">
                                <th>Id</th><th>FechaRegistro</th><th>FechaActualizacion</th><th>Nombre</th><th>ApellidoPaterno</th>
                                <th>ApellidoMaterno</th><th>RFC</th><th>FechaNacimiento</th><th>UsuarioAgrega</th>
                                <th>Activo</th>
                            </tr>
                        </thead>
                        <tbody id="contenido-tickets">
                            
                            @foreach($data as $row)

                                <tr align="center" OnClick="VerPersona({{$row->idPersonaFisica}}, '{{$row->nombre}}', '{{$row->apellidoPaterno}}', '{{$row->apellidoMaterno}}', '{{$row->rfc}}', '{{$row->fechaNacimiento}}')">
                                    <td>{{$row->idPersonaFisica}}</td><td>{{$row->fechaRegistro}}</td><td>{{$row->fechaActualizacion}}</td>
                                    <td>{{$row->nombre}}</td><td>{{$row->apellidoPaterno}}</td><td>{{$row->apellidoMaterno}}</td>
                                    <td>{{$row->rfc}}</td><td>{{$row->fechaNacimiento}}</td><td>{{$row->usuarioAgrega}}</td>
                                </tr>

                            @endforeach                    
                        
                        </tbody>
                    </table>			
                </div>			
            </div>
        </div>

    </div>
</div>

<div class="modal fade text-left" id="EliminarPersonaModal" tabindex="-1" role="dialog" aria-labelledby="basicModalLabel3" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form class="form-horizontal" baseurl="{{ url('/') }}" action="{{ url('/EliminarPersona') }}" method="POST">
            @csrf
                <input type="hidden" id="IdPersonaFisicaEliminar" name="IdPersonaFisica">
                <div class="modal-header">
                    <h3 class="modal-title" id="basicModalLabel3">Eliminar persona</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>¿Realmente deseas eliminar a esta persona fisica?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-secondary" data-dismiss="modal">Cancelar</button>						
                    <button type="submit" class="btn btn-danger block-page">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">

    function EliminarUser()
    {
        id = document.getElementById('IdPersonaFisica').value;
        document.getElementById('IdPersonaFisicaEliminar').value = id;

        $("#EliminarPersonaModal").modal("show");
    }

    function VerPersona(id, nombre, paterno, materno, rfc, nacimiento)
    {
        document.getElementById('IdPersonaFisica').value = id;
        document.getElementById('Nombre').value = nombre;
        document.getElementById('ApellidoPaterno').value = paterno;
        document.getElementById('ApellidoMaterno').value = materno;
        document.getElementById('RFC').value = rfc;
        document.getElementById('FechaNacimiento').value = nacimiento;
    }

    function Get()
    {
        var BaseURL = $("#FormPersona").attr("baseurl");

        $.ajax({
            beforeSend: function (xhr) {
                xhr.setRequestHeader('X-CSRF-Token', $('[name="_token"]').val());
            },
            url : BaseURL + "/GetToken",
            type: "post",
            dataType: "json",
            error: function(element){
                console.log(element);
            },
            success: function(r){
                console.log(r["Data"]);
            }
        });
    }

    function GetReporte()
    {
        var BaseURL = $("#FormPersona").attr("baseurl");

        $.ajax({
            beforeSend: function (xhr) {
                xhr.setRequestHeader('X-CSRF-Token', $('[name="_token"]').val());
            },
            url : BaseURL + "/GetRegistros",
            type: "post",
            dataType: "json",
            error: function(element){
                console.log(element);
            },
            success: function(r){
                console.log(r);
            }
        });
    }
</script>

@stop

    