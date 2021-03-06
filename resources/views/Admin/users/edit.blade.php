@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Usuario</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success"><strong>{{ session('info') }}</strong></div>
    @endif
    <div class="card">
        <div class="card-body">
            <h2 class="h5 text-center">Datos del Usuario</h2>
            {!! Form::open(['route' => ['admin.users.update', $user], 'method' => 'put']) !!}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('email', 'Correo Electronico') !!}
                        {!! Form::text('email', $user->email, ['class' => 'form-control']) !!}
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        {!! Form::label('password', 'Cambio de Contraseña') !!}
                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Ingrese una nueva contraseña']) !!}
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        {!! Form::label('Roles', 'Asignar Rol') !!}
                        @foreach ($roles as $role)
                            <div>
                                <label>
                                    {!! Form::checkbox('roles[]', $role->id, in_array($role->id, $userRol), ['class' => 'mr-1']) !!}
                                    {{ $role->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('name', 'Nombres') !!}
                        {!! Form::text('name', $user->people->name, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre completo']) !!}
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        {!! Form::label('app', 'Apellido Paterno') !!}
                        {!! Form::text('app', $user->people->app, ['class' => 'form-control', 'placeholder' => 'Ingrese el apellido paterno']) !!}
                        @error('app')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        {!! Form::label('apm', 'Apellido Materno') !!}
                        {!! Form::text('apm', $user->people->apm, ['class' => 'form-control', 'placeholder' => 'Ingrese el apellido materno']) !!}
                        @error('apm')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        {!! Form::label('ci', 'Carnet de Identidad') !!}
                        {!! Form::text('ci', $user->people->ci, ['class' => 'form-control', 'placeholder' => 'Ingrese el # Carnet de Identidad']) !!}
                        @error('ci')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        {!! Form::label('phone', 'Celular (Whatsapp)') !!}
                        {!! Form::text('phone', $user->people->phone, ['class' => 'form-control', 'placeholder' => 'Ingrese el # de celular Whatsapp']) !!}
                        @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        {!! Form::label('address', 'Dirección') !!}
                        {!! Form::text('address', $user->people->address, ['class' => 'form-control', 'placeholder' => 'Ingrese la Dirección']) !!}
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    {!! Form::submit('Actualizar Usuario', ['class' => 'btn btn-primary w-100']) !!}

                </div>


            </div>

                {{-- {!! Form::submit('Asignar Rol', ['class' => 'btn btn-primary mt-2']) !!} --}}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
