{{ Form::open(array('url' => 'pacientes','id' => 'form_nuevo_paciente')) }}
    @include('pacientes.form')
{{ Form::close() }}