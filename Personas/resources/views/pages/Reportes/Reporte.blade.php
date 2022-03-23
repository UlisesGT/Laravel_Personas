
@extends('MasterHome')
			
@section('body')

@include('pages.v_head')

@include('pages.v_menu')

            
<div class="card p-3">
    <div class="row">	

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header"><h4 class="card-title">Reportes</h4></div>
                <form class="form-horizontal" action="{{ url('/ObtenerReporte') }}" method="POST" files="true" enctype="multipart/form-data">
                @csrf
                   
                <div style="overflow-x:auto; height:600px" class="p-3">
                <button onclick="exportExcel('Tablain', 'Reporte')">Exportar a excel</button>
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
                        
                            
                        
                        </tbody>
                    </table>			
                </div>			
            </div>
        </div>

    </div>
</div>

<script type="text/javascript">

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
                console.log(r);
            }
        });
    }

    function exportExcel(tableID, filename = '')
    {
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'excel_data.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
}
</script>

@stop

    