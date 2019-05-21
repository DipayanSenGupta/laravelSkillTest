@extends('layouts.app')
@section('content')
<h1>Companies</h1>

<ul>
	@forelse ($companies as $company)
		<li>
		<div class="row">
			<div class="col-3">
				<span >{{ $company->name }}</span>	
				<span >{{ $company->website }}</span>	 
 				<span >{{ $company->email }}</span>	 
			</div>
			
			<div class="col-1">
				<button type="button" class="btn btn-info " style="text-align: center;">
					{{ link_to_route('company.edit','Edit', ['company'=>$company])}}			
				</button>
			</div>

			<div class="col-1">
			{!! Form::open(
			[
			'route' => ['company.destroy', $company],
			'method' => 'delete'
			]) !!}
			{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
			{!! Form::close() !!}
			</div>

		</div>
		</li>
			<br/>
	@empty
		<li>No Company Found</li>
	@endforelse
</ul>
	{!! $companies->links('vendor.pagination.bootstrap-4') !!}

@endsection