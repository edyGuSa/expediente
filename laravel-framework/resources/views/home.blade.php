@extends('structure/structure')
    @section('homepage')
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <div class="box box-primary">
            <div class="box-header ui-sortable-handle" style="cursor: move;">
              <i class="ion ion-clipboard"></i>
              <h3 class="box-title">Home</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            </div>
        </div>
     @endsection

    @section('scripts')
        <script src="{{asset('/js/users.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/input-mask/jquery.inputmask.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>
    @endsection