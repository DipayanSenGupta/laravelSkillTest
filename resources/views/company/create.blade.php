@extends('layouts.app')
@section('content')
	<div class="row">
		<div class="col">
			{!! Form::open(
				['route' => 'company.store'],
				['class' => 'form']
				)!!}
			<div class="form-group">
				{!! Form::label('name','Company Name',
					['class' => 'control-label']
				)!!}
				{!! Form::text('name', null,
					[
						'class' => 'form-control input-lg',
						'placeholder' => 'company name'
					])
				!!}
			</div>

			<div class="form-group">
				{!! Form::label('email','Company Email',
					['class' => 'control-label']
				)!!}
				{!! Form::text('email', null,
					[
						'class' => 'form-control input-lg',
						'placeholder' => 'company email'
					])
				!!}
			</div>

			<div class="form-group">
				{!! Form::label('website','Company website',
					['class' => 'control-label']
				)!!}
				{!! Form::text('website', null,
					[
						'class' => 'form-control input-lg',
						'placeholder' => 'company website'
					])
				!!}
			</div>

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