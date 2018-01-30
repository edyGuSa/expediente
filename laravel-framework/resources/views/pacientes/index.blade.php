@extends('structure/structure')



	@section('homepage')
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <div class="box box-primary">
            <div class="box-header ui-sortable-handle" style="cursor: move;">
              <i class="ion ion-clipboard"></i>

              <h3 class="box-title">Pacientes</h3>

              <div class="box-tools pull-right">
                <a id="nuevo_paciente" type="button" class="btn btn-success pull-right" href="{{ route('pacientes.create') }}">
                    <i class="fa fa-plus"></i> Nuevo paciente
                </a>
                <div id="loader" class="overlay" hidden>
                  <i class="fa fa-refresh fa-spin"></i>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div id="table_pacientes">
                    <table id="users">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>email</th>
                            <th>Dirección</th>
                            <th>Alergias</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pacientes as $user)
                            <tr class="paciente">
                                <td>{{$user->name}}</td>
                                <td>{{$user->lastname}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->direccion}}</td>
                                <td>{{$user->alergias}}</td>
                                <td>
                                    <a href="{{ route('pacientes.edit',['id'=>$user->id]) }}" class="edit">
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </a>
                                    <span hidden>
                                        <i class="fa fa-spinner fa-spin" style="font-size:24px"></i>
                                    </span>
                                    <a href="{{ route('pacientes.destroy',['id'=>$user->id]) }}" class="remove">
                                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div id="formulario_paciente" hidden>
                    
                </div>
            </div>
        </div>
     @endsection

    @section('scripts')
        <script src="{{asset('/js/users.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/input-mask/jquery.inputmask.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>
    @endsection