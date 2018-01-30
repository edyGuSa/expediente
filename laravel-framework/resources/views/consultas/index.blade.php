@extends('structure/structure')



	@section('homepage')
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <div class="box box-primary">
            <div class="box-header ui-sortable-handle" style="cursor: move;">
              <i class="ion ion-clipboard"></i>

              <h3 class="box-title">Expedientes</h3>

              <div class="box-tools pull-right">
                <a id="nuevo_consulta" type="button" class="btn btn-success pull-right" href="">
                    <i class="fa fa-plus"></i> Consulta
                </a>
                <div id="loader" class="overlay" hidden>
                  <i class="fa fa-refresh fa-spin"></i>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4 pull-right-3">
                        <label>Buscar Paciente:</label>
                        {{ Form::select('pacientes_selec',$pacientes,null,['class'=>'form-control','id'=>'pacientes']) }}
                        <a id="ruta_show" href="{{route('consultas.show',[''])}}" hidden></a>
                        <span clas="loader" hidden>
                            <i class="fa fa-spinner fa-spin" style="font-size:24px"></i>
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>E-mail</th>
                                    <th>Alergias</th>
                                    <th>Estatura</th>
                                    <th>Peso</th>
                                    <th>Glucosa</th>
                                    <th>Edad</th> 
                                </tr>
                            </thead>
                            <tbody id="datos_expediente">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12" id="form_consulta" hidden>
                        
                    </div>
                </div>
            </div>
        </div>
     @endsection

    @section('scripts')
        <script src="{{asset('/js/expediente.js')}}"></script>
    @endsection