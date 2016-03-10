@extends('layouts.layout')

@section('title')
	About
 
@stop
<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}"/>  
@section('body')
<li><a href="contact">Contact</a></li>

	<p>{{$companyName}}</p>

	@if($isUserRegistered == true)
		<p>Hello mate!</p>
	@else
		<p>Please register!</p>
	@endif

	@for ($i = 0; $i < 10; $i++)
    	<p>The current value is {{ $i }}</p>
	@endfor

	@foreach($users as $data)
		{{$data}}<br>
	@endforeach
@stop

