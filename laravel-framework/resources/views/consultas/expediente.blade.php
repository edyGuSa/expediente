@extends('structure/structure')
    @section('homepage')
    <section class="content-header">
        <h1>
            Expediente
        </h1>
    </section>
    <!-- Contenido principal -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <h3 class="profile-username text-center">{{ $paciente->name.' '.$paciente->lastname}}</h3>
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Edad:</b> <a class="pull-right">{{ $paciente->edad }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Peso</b> <a class="pull-right">{{ $paciente->peso}} Kg</a>
                        </li>
                        <li class="list-group-item">
                            <b>Altura</b> <a class="pull-right">{{ $paciente->altura }} cm</a>
                        </li>
                        <li class="list-group-item">
                            <b>IMC</b> <a class="pull-right">{{ $paciente->imc }}</a>
                        </li>
                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            <!-- About Me Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Información básica</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <strong><i class="fa fa-book margin-r-5"></i>Tipo Sangre</strong>
                    <p class="text-muted">{{ $paciente->tipo_sangre }}</p>
                    <hr>
                    <strong><i class="fa fa-map-marker margin-r-5"></i>Dirección</strong>
                    <p class="text-muted">{{ $paciente->direccion }}</p>
                    <hr>
                    <strong><i class="fa fa-file-text-o margin-r-5"></i>Alergias</strong>
                    <p>{{ $paciente->alergias }}</p>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#activity" data-toggle="tab">Diagnosticos</a></li>
                <li><a href="#timeline" data-toggle="tab" id="graficos">Graficos</a></li>
                <a id="ruta_chart" hidden href="{{ route('chart_data',$paciente->id) }}"></a>
                <li><a href="#settings" data-toggle="tab">Nueva Consulta</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                @foreach($consultas as $consulta )
                <!-- Post -->
                  <div class="post">
                    <div class="user-block">
                      <span class="username">
                        <a href="#">{{ $consulta->diagnostico }}</a>
                      </span>
                      <span class="description">{{ $consulta->created_at }}</span>
                    </div>
                    <!-- /.user-block -->
                    <strong>Notas del médico: </strong>
                    <p>{{ $consulta->notas_medicas }}</p>
                    <strong>Tratamiento: </strong>
                    <p>{{ $consulta->medicación }}</p>
                    <ul class="list-inline">
                      <li>
                        
                      </li>
                    </ul>
                  </div>
                <!-- /.post -->
                @endforeach
              </div>
              
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                <h3 class="box-title">Presión</h3>
                <div class="chart">
                  <canvas id="lineChart" style="height: 250px; width: 510px;" width="510" height="250"></canvas>
                </div>
                <h3 class="box-title">Peso</h3>
                <div class="chart">
                  <canvas id="lineChart_p" style="height: 250px; width: 510px;" width="510" height="250"></canvas>
                </div>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="settings">
                <form id="nueva_consulta"class="form-horizontal" action="{{ route('storeConsulta',$paciente->id) }}">
                  {!! csrf_field() !!}
                  
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Diagnóstico:</label>

                    <div class="col-sm-10">
                      <textarea class="form-control" name="diagnostico" placeholder="Diagnóstico"></textarea>
                    </div>
                  </div>

                  <div class="form-group ">
                    <label for="inputEmail" class="col-sm-2 control-label">Peso:</label>
                    <div class="col-sm-10">
                      <input type="number" name="peso" 
                                           class="form-control" 
                                           id="inputEmail" 
                                           placeholder="peso"
                                           step="any"
                                           min="3" 
                                           max="170"
                                          >
                    </div>
                  </div>
                  
                  <div class="form-group ">
                    <label for="inputEmail" class="col-sm-2 control-label">Presión:</label>
                    <div class="col-sm-10">
                      <input type="number" name="presion" 
                                           class="form-control" 
                                           id="inputEmail" 
                                           placeholder="Presión"
                                           step="any"
                                           min="50" 
                                           max="200"
                                          >
                    </div>
                  </div>

                  <div class="form-group ">
                    <label for="inputName" class="col-sm-2 control-label">Altura:</label>
                    <div class="col-sm-10">
                      <input type="number"  name="estatura" 
                                            class="form-control"
                                            id="inputName" 
                                            placeholder="Altura"
                                            step="1"
                                            min="30" 
                                            max="200"
                                          >
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Notas médicas:</label>

                    <div class="col-sm-10">
                      <textarea class="form-control" name="notas_medicas" placeholder="Notas"></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Tratamiento:</label>

                    <div class="col-sm-10">
                      <textarea class="form-control" name="medicación" placeholder="Tratamiento"></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-success" id="suir_info">
                        <span hidden>
                          <i class="fa fa-refresh fa-spin"></i>  
                        </span>
                        Enviar
                      </button>
                    </div>
                    
                  </div>

                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    @endsection
    @section('scripts')
        <script src="{{asset('/js/expediente.js')}}"></script>
    @endsection