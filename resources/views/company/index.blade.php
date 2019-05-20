@extends('layouts.app')
@section('content')
<h1>Companies</h1>

<ul>
	@forelse ($companies as $company)
		<li>{{ $company->name }}</li>
	@empty
		<li>No Company Found</li>
	@endforelse
</ul>
	{!! $companies->links('vendor.pagination.bootstrap-4') !!}

@endsection