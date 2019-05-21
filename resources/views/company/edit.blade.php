@extends('layouts.app')
@section('content')
	<div class="row">
		<div class="col">
			{!! Form::model($company,
				[
				'method' => 'put',	
				'route' => ['company.update', $company->id],
				'class' => 'form'
				]
				)!!}

			@include('layouts._formContainer')	
		
			{!! Form::close() !!}
		</div>
	</div>	

@endsection