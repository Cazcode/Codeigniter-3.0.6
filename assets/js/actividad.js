function eventRowTable(){
	$('tbody tr').on('click',function(){
		var children = $(this).children();
		var json = {
			id_area: $(children[1]).text(),
			id_planta: $(children[2]).text(),
			descripcion: $(children[3]).text()
		}
		setFields(json);
	});
}

function clearFormFields(){
	$('#descripcion').val('');
	$('#idTecnico').prop('selectedIndex',0).select2("destroy").select2();
	$('#idTipo').prop('selectedIndex',0).select2("destroy").select2();
	$('#idFuncion').prop('selectedIndex',0).select2("destroy").select2();
	$('#idParte').prop('selectedIndex',0).select2("destroy").select2();
	$('#idUbicacion').prop('selectedIndex',0).select2("destroy").select2();
	$('#idDuracion').prop('selectedIndex',0).select2("destroy").select2();
	$('#fecha').val(getFechaActual());
    $('#tbRecurso').DataTable().clear().draw();
}

function jsonValuesForm(){
	var json = {
		'descripcion': $('#descripcion').val(),
		'idtecnico': $('#idTecnico').val(),
		'idtipo': $('#idTipo').val(),
		'idfuncion': $('#idFuncion').val(),
		'idparte': $('#idParte').val(),
		'idubicacion': $('#idUbicacion').val(),
		'idduracion': $('#idDuracion').val(),
		'fecha': getFechaActual(),
        'recursos': listadoRecursos(),
	};
    
	return json;
}

function insertActivity(){
	var json = jsonValuesForm();
    swal(
        {
            title: 'Confirmación de Registro',
            text: '¿Desea registrar la actividad?',
            type: 'warning',
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            showCancelButton: true,
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Aprobar',
            showLoaderOnConfirm: true,
            preConfirm: function () {
            return new Promise(function (resolve, reject) {
                $.ajax({
                    url: 'actividad/insertar_actividad',
                    type: "POST",
                    data: json
                })
                .done(function (data) {
                    fillTable(data);
                    clearFormFields();
                    resolve();
                })
                .fail(function (xhr, status, error){
                    swal(
                    {
                       title: "Error",
                       text: "Hubo un error tratar de guardar la orden de trabajo",
                       type: "error"
                    });
                });
            })
        },
        allowOutsideClick: false
    }).then(function (result) {
        swal({
            type: 'success',
            title: 'Se han guardado los cambios'
        })
    }).catch(swal.noop);
}

function fillTable(data){
	$('#tbActividad').DataTable().destroy();
	var htm = "<thead><tr><th>#</th><th>Actividad</th><th>Fecha Creación</th><th>Descripción</th><th>Función</th><th>Ubicación</th><th>Parte</th><th>Nivel Tecnico</th><th>Duración</th><th>Opción</th></tr></thead>";
    $('#tbActividad').html(htm);
    //Empty Requisicones
    if (data.length == 0) {
        htm += "<tr class='info'><td>N/A</td><td>N/A</td><td>N/A</td><td>N/A</td><td>N/A</td><td>N/A</td><td>N/A</td><td>N/A</td><td>N/A</td><td>N/A</td><td>N/A</td></tr>";
      //All Requisiciones
    } else{
    	var cont = 0;
        for (i = 0; i < data.length; i++) {
            var openModal = '<a id="openModal" onclick="openModal('+data[i].id_actividad+',\''+data[i].descripcion+'\')"type="button" class="btn btn-primary btn-block" data-toggle="modal"><i class="fa fa-edit"></i></a>';
            htm += "<tr class='info'>";
            htm += "<td>" +  ++cont+ "</td>";
            htm += "<td>" +  data[i].id_actividad  + "</td>";
            htm += "<td>" +  data[i].fecha_creacion  + "</td>";
            htm += "<td>" +  data[i].descripcion + "</td>";
            htm += "<td>" +  data[i].funcion  + "</td>";
            htm += "<td>" +  data[i].ubicacion  + "</td>";
            htm += "<td>" +  data[i].parte  + "</td>";
            htm += "<td>" +  data[i].nivel_tec  + "</td>";
            htm += "<td>" +  data[i].duracion  + "</td>";
            htm += "<td>" +  openModal + "</td>";
            htm += "</tr>";
        }
    }
    $('#tbActividad').html(htm);
    $('#tbActividad').DataTable(opciones);
}

function openModal(id,actividad){
    var json = {
        'id_actividad' : id,
    }
    $('#modal-title').text('Recursos de '+actividad);
    $.ajax({
        url: 'actividad/recursos',
        type: "GET",
        data: json
    })
    .done(function (data) {
        $('#tbRecursoActividad tbody').html('');
            var html = "";
            for (var i = 0; i < data.length; i++) {
                html += "<tr><th>"
                + data[i].id_linea+"</th><th>"
                + data[i].descripcion+"</th><th>"
                + data[i].cantidad_solicitada+"</th></tr>'";
            }
            $('#tbRecursoActividad tbody').html(html);
        $('#myModal').modal({
            show: 'true'
        });
    })
    .fail(function (xhr, status, error){
        swal(
        {
           title: "Error",
           text: "Hubo un error tratar de guardar la orden de trabajo",
           type: "error"
        });
    });
}


function existeVariable(variable){
	return (typeof variable === 'undefined' || variable ==null);
}

function validForm(){
	
	var descripValue = $('#descripcion');
	var text = "";
	var band = true;
    var duracion_select = $('#idDuracion');

	if($(duracion_select).val()==null){
		text = "\n"+$(duracion_select).attr("name");
		band = false;
	}
	if(descripValue.val().length<=0){
		band = false;
		text += "\n nombre actividad";
	}

	if(!band){
		msnError(text);
	}
	return band;
}

function msnError(msn){
	swal(
        {  
           title: "Error en formulario",
           text: "Los siguientes campos deben ser ingresados:\n"+msn,
           type: "warning"
        }
    );
}

function listadoRecursos(){
    var listado = [];
    var data    = $('#tbRecurso').DataTable().rows().data();
    for (var i = data.length - 1; i >= 0; i--) {
        listado.push({
            'id_recurso': data[i][0],
            'linea': data[i][1],
            'recurso': data[i][2],
            'cantidad': data[i][3],
            'tipo_req': data[i][4],
        });
    }
    return listado;
}

function eventAgregarRecurso(){
    $("#agregar_recurso").on('click',function(){
        var id_recurso = $('#idrecurso option:selected').val().trim();
        if(id_recurso!=0){
            var recurso = $('#idrecurso option:selected').text().trim();
            var linea = $('#idrecurso option:selected').attr("id").trim();
            var cantidad = $('#cantidad_solicitada').val().trim();
            var option = '<h5><a onclick = "removeRowDataTb(this)" class="eliminarRecurso label label-danger">Eliminar</a></h5>'
            var data = [
                id_recurso,
                linea,
                recurso,
                cantidad,
                'RPTOS',
            ];
            data.push(option);
            addRowDataTb($('#tbRecurso').DataTable(),data);
        }else{
            swal(
            {
               title: "Error",
               text: "Seleccione un recurso",
               type: "error"
            });
        }
    });
}

function eventAgregarServicio(){
    $("#agregar_servicio").on('click',function(){
        var id_recurso = $('#idservicio option:selected').val().trim();
        if(id_recurso!=0){
            var recurso = $('#idservicio option:selected').text().trim();
            var linea  = 'VARIOS';
            var cantidad = 1;
            var option = '<h5><a onclick = "removeRowDataTb(this)" class="eliminarRecurso label label-danger">Eliminar</a></h5>'
            var data = [id_recurso,linea,recurso,cantidad,'SER',];
            data.push(option);
            addRowDataTb($('#tbRecurso').DataTable(),data);
        }else{
            swal(
            {
               title: "Error",
               text: "Seleccione un recurso",
               type: "error"
            });
        }
    });
}

function removeRowDataTb(ele) {
    var tr = $(ele).parents()[2];
    $('#tbRecurso tr.selected').removeClass('selected');
    $(tr).addClass('selected');
    var id = $('#tbRecurso').DataTable().row('.selected').data()[0];
    $('#tbRecurso').DataTable().row('.selected').remove().draw( false );
}

function addRowDataTb(tb,data) {
    tb.row.add(data).draw(false);
}

$(function(){
    $('.selecte').select2();
    $('#addActivity').on('click',function(){
    	if(validForm()){
    		insertActivity();
    	}
    });
    eventAgregarRecurso();
    eventAgregarServicio();
    $('#fecha').val(getFechaActual());
    $('#tbActividad').DataTable(opciones);
}).ajaxStart(function() { Pace.restart(); });