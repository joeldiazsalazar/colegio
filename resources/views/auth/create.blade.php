@extends('layouts.admin')

@section('contenido')

<h1 class="text-center">Agregar Usuario</h1>


@if(session()->has('info'))


<div class="alert alert-success">{{ session('info')}}</div>

@else

<form method="POST" action=" {{ route('users.store')}} ">

{!! csrf_field() !!}
    
<p><label for="name">
    Nombre

    <input class="form-control" type="text" name="name" value="{{ old('name')}}">

    {!! $errors->first('name','<span class=error>:message</span>')!!}
</label></p>

<p><label for="email">
    Email
    <input class="form-control" type="text" name="email" value="{{ old('email')}}">

    {!! $errors->first('email','<span class=error>:message</span>')!!}
</label></p>



<p><label for="password">
    password
    <input class="form-control" type="password" name="password" value="{{ old('password')}}">

    {!! $errors->first('password','<span class=error>:message</span>')!!}
</label></p>


<p><label for="role">
    role
    <input class="form-control" type="text" name="role_id" value="{{ old('role_id')}}">

    {!! $errors->first('role_id','<span class=error>:message</span>')!!}
</label></p>



<input class="btn btn-primary" type="submit" name="Enviar">

</form>
@endif
<hr>
@stop