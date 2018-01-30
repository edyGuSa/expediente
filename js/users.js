$(document).ready(function(){
    
    $('#users').DataTable({
        "language" : {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        },
        ordering : false
    });
    //Variables
    var pacientesDataTable = $('#users').DataTable();
    var pacientesDivTable  = $('#table_pacientes');
    var pacienteDivForm    = $('#formulario_paciente');
    var buttonNuevo        = $('#nuevo_paciente');

    //Nuevo paciente
    buttonNuevo.click(function(event){
        event.preventDefault();
        
        buttonNuevo.siblings('.overlay').show(); 
        var ruta_create = buttonNuevo.attr('href');
        
        $.get( ruta_create,function(data){
            buttonNuevo.siblings('.overlay').hide();
            buttonNuevo.hide();
            pacientesDivTable.hide();
            pacienteDivForm.html(data);
            pacienteDivForm.show();
        }).fail(function(error){
            alert('Hubo un error');
            buttonNuevo.siblings('.overlay').hide(); 
        });
    });
    
    //Volver 
    pacienteDivForm.on('click','#cancel',function(event){
        event.preventDefault();
        pacienteDivForm.hide();
        pacientesDivTable.show();
        buttonNuevo.show();
    });
    
    //Guardar datos
    pacienteDivForm.on('click','#save',function(event){
        event.preventDefault();

        var buttonSave = $(this);
        buttonSave.siblings('div .overlay').show(); 
        var form       = $('#form_nuevo_paciente');
        var data       = form.serialize();
        var ruta_save  = form.attr('action'); 
        
        console.log(ruta_save);

        $.post(ruta_save, data, function(usuario){
            buttonSave.siblings('div .overlay').hide();
            pacienteDivForm.hide();
            $('#users tr').removeClass('success');
            var node = undefined;

            node = pacientesDataTable.row.add([
                usuario.name,
                usuario.lastname,
                usuario.email,
                usuario.direccion,
                usuario.alergias,
                usuario.edit + usuario.delete
            ]).draw().node();
            
            $(node).addClass('success');
            pacientesDataTable.page( 'last' ).draw( 'page' );
            $('#tables').show();
            pacientesDivTable.show();
            buttonNuevo.show();            
        }).fail(function(error){
           
            var errors = (JSON.parse(error.responseText))//Capturar el primer error
            $('.form-group').removeClass('has-error');
            $('.form-group').addClass('has-success');
            $('.error').html('');
            errors = errors.errors;
            $.each(errors, function(index, value){
                $('.error_' + index).parents('.form-group').removeClass('has-success');
                $('.error_' + index).parents('.form-group').addClass('has-error');
                $('.error_' + index).html('<strong>' + value +'</strong>');
            });
            $('#loader_save').hide();
            buttonSave.siblings('div .overlay').hide();
        });   
    });

    //Formulario Editar
    pacientesDataTable.on('click','.edit',function(event){
        event.preventDefault();
        var loader = $(this).siblings('span');
        loader.show();
        var url = $(this).attr('href');
        
        $('.edit').parents('tr').removeClass('success');
        
        $(this).parents('tr').addClass('success');
        
        $.get(url,function(data){
            loader.hide();
            buttonNuevo.siblings('.overlay').hide();
            buttonNuevo.hide();
            pacientesDivTable.hide();
            pacienteDivForm.html(data);
            pacienteDivForm.show();
        }).fail(function(){
            loader.hide();
            buttonNuevo.show();
        });
    })

    //Guardar datos actualizados
    pacienteDivForm.on('click','#update',function(event){
        
        event.preventDefault();
        
        var buttonSave = $(this);
        buttonSave.siblings('div .overlay').show(); 
        var form       = $('#form_edit_paciente');
        var data       = form.serialize();
        var ruta_save  = $(this).attr('href'); 
        
       $.ajax({
            url     : ruta_save,
            method  : 'PUT',
            data    : data,
            success : function(usuario){
                buttonSave.siblings('div .overlay').hide();
                pacienteDivForm.hide();
                pacientesDataTable.row( $('.success') ).data([
                    usuario.name,
                    usuario.lastname,
                    usuario.email,
                    usuario.direccion,
                    usuario.alergias,
                    usuario.edit + usuario.delete
                ]).draw(false);
                $('#tables').show();
                pacientesDivTable.show();
                buttonNuevo.show();
            },
            error : function(error){
                var errors = (JSON.parse(error.responseText))//Capturar el primer error
                $('.form-group').removeClass('has-error');
                $('.form-group').addClass('has-success');
                $('.error').html('');
                errors = errors.errors;
                $.each(errors, function(index, value){
                    $('.error_' + index).parents('.form-group').removeClass('has-success');
                    $('.error_' + index).parents('.form-group').addClass('has-error');
                    $('.error_' + index).html('<strong>' + value +'</strong>');
                });
                $('#loader_save').hide();
                buttonSave.siblings('div .overlay').hide();
            }
        });   
    });

    //Eliminar datos
    pacientesDataTable.on('click','.remove',function(event){
        event.preventDefault();
        var url = $(this).attr('href');
        $('.edit').parents('tr').removeClass('danger');
        $(this).parents('tr').addClass('danger');
        var temp = this;
        var data = {
            '_token' : $('meta[name="csrf-token"]').attr('content')
        }
        if(confirm("¿Desea borrar esta usuario?") == true) {
            $.ajax({
                url     : url,
                method  : 'delete',
                data    : data,
                success : function(data){
                    pacientesDataTable.row( $(temp).parents('tr') ).remove().draw();
                },
                fail    : function(error){
                    alert('Ocurrio un error');
                    console.log('error');
                }
            });
        }else{
            //you are not nothing
        }
    })

});