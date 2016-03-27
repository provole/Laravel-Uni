@extends('layouts.layout')

@section('title')
	About
 
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

