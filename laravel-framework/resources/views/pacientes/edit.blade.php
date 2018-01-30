{{ Form::open(
	[
		'id' => 'form_edit_paciente'
	]
)}}
@include('pacientes.form')
{!! Form::close() !!}