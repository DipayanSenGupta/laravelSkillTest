@extends('layouts.app')
@section('content')
	<div class="row">
		<div class="col">
			{!! Form::open(
				['route' => 'company.store'],
				['class' => 'form']
				)!!}
			@include('layouts._formContainer')	
			{!! Form::close() !!}
		</div>
	</div>	

@endsection