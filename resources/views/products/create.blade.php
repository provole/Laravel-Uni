@extends('layouts.layout')
@section('title')
Create new Product
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

	{!!Form::open(['route' => 'product.store'])!!}

	{!!Form::label('name', 'Name')!!}
	{!!Form::text('name', null, ['placeholder' => "Give a name"])!!}

	<br>

	{!!Form::label('descr', 'Descr')!!}
	{!!Form::text('descr', null, ['placeholder' => "Give a descr"])!!}
	<br>
	{!!Form::label('price', 'Price')!!}
	{!!Form::text('price', "0$", ['placeholder' => "Give a price"])!!}
	<br>
	{!! Form::label('image', 'Choose an image') !!}
    {!! Form::file('image') !!}


	{!!Form::submit('Create')!!}

	{!!Form::close()!!}
@stop