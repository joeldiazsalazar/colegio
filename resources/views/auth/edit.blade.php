@extends('layouts.admin')



@section('contenido')


<h1>EDITAR USUARIO</h1>

@if( session()->has('info'))
<div class="alert alert-success">{{ session('info')}}</div>

@endif

<form method="POST" action=" {{ route('users.update', $user->id)}} ">
	{!! method_field('PUT') !!}

	{!! csrf_field() !!}
	
<p><label for="nombre">
	Nombre

	<input class="form-control" type="text" name="name" value="{{ $user->name }}">

	{!! $errors->first('name','<span class=error>:message</span>')!!}
</label></p>

<p><label for="email">
	Email
	<input class="form-control" type="text" name="email" value="{{ $user->email}}">

	{!! $errors->first('email','<span class=error>:message</span>')!!}
</label></p>



<input class="btn btn-primary" type="submit" name="Enviar">

</form>

@stop