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
			
			<div class="form-group">
				{!!	Form::submit('Add Company',
					[
						'class' => 'btn btn-info btn-lg',
						'style' => 'width:100%'
					])
				 !!}
			</div>			
			
			{!! Form::close() !!}
		</div>
	</div>	

@endsection