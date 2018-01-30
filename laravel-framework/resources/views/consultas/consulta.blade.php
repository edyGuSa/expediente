{{ Form::open(array('url' => route('consultas.store'),'id' => 'form_consulta')) }}
    @include('consultas.formconsulta')
{{ Form::close() }}