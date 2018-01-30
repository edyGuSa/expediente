$(document).ready(function(){
	
	//variables
	var pacientes = $('#pacientes');
	var nuevaConsulta = $('#nuevo_consulta');
	var formularioConsulta = $('#form_consulta');
	//Ver datos

	pacientes.change(function(event){
		event.preventDefault();
		var ruta   	= $('#ruta_show').attr('href');
		var loader	= $(this).siblings('span');
		loader.show(); 
		ruta = ruta + '/' + $(this).val();
		$.get(ruta,function(data){
			loader.hide();
			console.log(data);
			$('#datos_expediente').html(data.table)
		}).fail(function(error){
			loader.hide();
			alert('Ocurrio un error');
		});
	});

	/*nuevo_consulta.click(function(event){
		event.preventDefault();
		var ruta = $(this).attr('href') + '/' + pacientes.val();
		nuevo_consulta.siblings('.overlay').show();
		$.get(ruta,function(data){
			nuevo_consulta.siblings('.overlay').hide();
			formularioConsulta.show().html(data);
			$('#datos_expediente').html(data.table)
		}).fail(function(error){
			nuevo_consulta.siblings('.overlay').hide();
			alert('Ocurrio un error');
		});
	});*/


});