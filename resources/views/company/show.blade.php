@extends('layouts.app')

@section('content')
<h1>{{$company->name}}</h1>
<p>
	Website: {{$company->website}} <br/>
	Email: {{$company->email}}
</p>
@endsection