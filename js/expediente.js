$(document).ready(function(){
	$('#users').DataTable({
        "language" : {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        },
        ordering : false
    });

    $('#suir_info').click(function(event){
    	event.preventDefault();
    	tHis = $(this);
    	tHis.children('span').show();
    	form = $('#nueva_consulta');

    	var url  = form.attr('action');
    	var data = form.serialize();

    	$.post(url, data, function(){
    		location.reload(true);
    	}).fail(function(error){
    		alert('Ocurrio un error verifica tus datos');
    		tHis.children('span').hide();
    	}); 
    });

    $('#graficos').click(function(event){
        var ruta = $('#ruta_chart').attr('href');

        $.get(ruta,function(data){
            new Chart($('#lineChart'),{
                "type" : "line",
                "data" : {
                    
                    "labels"   : data.pr_fe,
                    
                    "datasets" : [
                        {
                            "label":"Comportamiento de la presión del paciente",
                            "data" : data.pr_pr,
                            "fill" : false,
                            "borderColor":"rgb(75, 192, 192)",
                            "lineTension":0.1
                        }
                    ]
                },
                "options":{}
            });
            new Chart($('#lineChart_p'),{
                "type" : "line",
                "data" : {
                    
                    "labels"   : data.ps_fe,
                    
                    "datasets" : [
                        {
                            "label":"Comportamiento de la presión del paciente",
                            "data" : data.ps_ps,
                            "fill" : false,
                            "borderColor":"rgb(75, 192, 192)",
                            "lineTension":0.1
                        }
                    ]
                },
                "options":{}
            });
        });
    });
});
