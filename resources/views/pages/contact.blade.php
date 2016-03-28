@extends('layouts.layout')

@section('title')
	About Us
@stop
<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}"/>
@section('body')
<div class = "menu">
<ul>
	@if (Auth::guest())
                        <li><a href="/auth/login">Login</a></li>
                        <li><a href="/auth/register">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }} <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="/auth/logout">Logout</a></li>
                            </ul>
                        </li>
                    @endif
</ul>
	</div>
@include('layouts.menu')

	<h1>This is the contact page.</h1>
	<input type="text">

	{!! Form::text('price', '50$', [
		'class' => "form-control",
		'placeholder' => "Give a price"
	]) !!}

	{!! Form::number('level', 10, [
		'max' => 20,
		'min' => -5
	]) !!}
@stop
