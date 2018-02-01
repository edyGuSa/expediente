<div class="col-md-6">
    <div class="form-group">
        <label>Paciente:</label>
        <input class="form-control" placeholder="Nombre del paciente" type="text"
            value="{{ $paciente->name }}"
            name="name" 
        >
        <span class="text-danger error error_name"></span>
    </div>
    <div class="form-group">
        <label>Apellidos:</label>
        <input class="form-control" placeholder="Apellidos del paciente" type="text"
            value="{{ $paciente->lastname }}"
            name="lastname" 
        >
        <span class="text-danger error error_lastname"></span>
    </div>
    <div class="form-group">
        <label>Alergias:</label>
        <textarea class="form-control" placeholder="Alergias del paciente" type="text" rows="3"
            name="alergias" 
        >{{ $paciente->alergias }}</textarea>
        <span class="text-danger error error_alergias"></span>
    </div>
    <div class="form-group">
        <label>Sexo:</label>
        <select class="form-control"
            value="{{ $paciente->genero }}"
            name="genero" 
        >
            <option value="1">Hombre</option>
            <option value="2">Mujer</option>
        </select>
    </div>
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
            <input class="form-control" placeholder="Email" type="email"
                value="{{ $paciente->email }}"
                name="email" 
            >
        </div> 
        <span class="text-danger error error_email"></span>   
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label>Dirección:</label>
        <input class="form-control" placeholder="Dirección del paciente" type="text"
            value="{{ $paciente->direccion }}"
            name="direccion" 
        >
        <span class="text-danger error error_direccion"></span>
    </div>

    <div class="form-group">
        <label>Tipo sanguineo:</label>
        <select class="form-control"
            value="{{ $paciente->tipo_sangre }}"
            name="tipo_sangre" 
        >
            <option value ="1">O Negativo</option> 
            <option value ="2">O Positivo</option>
            <option value ="3">A Negativo</option>
            <option value ="4">A Positivo</option>
            <option value ="5">B Negativo</option>
            <option value ="6">B Positivo</option>
            <option value ="7">AB Negativo</option>
            <option value ="8">AB Positivo</option>
        </select>
    </div>


    <div class="form-group">
        <label>Fecha de nacimiento:</label>
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            <input type="text" class="form-control pull-right" id="datepicker" value="{{ $paciente->fecha_nacimiento}}"
                name="fecha_nacimiento">
        </div>
        <span class="text-danger error error_fecha_nacimiento"></span>
     </div>

</div>
<div class="col-md-12">
    <div class="row">
        <div class="col-md-5">
            <button id="cancel" class="btn btn-default">Cancelar</button>
            @if(!empty($paciente->id))
                <a id="update" class="btn btn-success" href="{{route('pacientes.update',['id'=>$paciente->id])}}">Actualizar</a>
            @else
                <button id="save" class="btn btn-success">Guardar</button>
            @endif
            <div class="overlay" hidden>
              <i class="fa fa-refresh fa-spin"></i>
            </div>
        </div>
    </div>   
</div>

<script type="text/javascript">
    $(function(){
        $('#datepicker').datepicker({
            autoclose : true
        });
    })
</script>


