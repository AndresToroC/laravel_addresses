@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Actualizar usuario: {{ $user->email }}</div>
                </div>
                <div class="card-body">
                    {{ Form::open(['route' => ['admin.users.update', $user->id], 'method' => 'PUT']) }}
                        <div class="row">
                            <div class="col-md-6">
                                {{ Form::bsText('name', $user->name) }}
                            </div>
                            <div class="col-md-6">
                                {{ Form::bsEmail('email', $user->email, ['readonly']) }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                {{ Form::bsPassword('password', 'Si no desea actualizar dejar en blanco') }}
                            </div>
                            <div class="col-md-6">
                                {{ Form::bsPassword('password_confirmation') }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                {{ Form::bsSelect('role', $roles, (isset($user->roles[0]['name']) ? $user->roles[0]['name'] : null), ['placeholder' => 'Seleccione el rol']) }}
                            </div>
                        </div>
                        {{ Form::submit('Actualizar', ['class' => 'btn btn-success']) }}
                        <a href="{{ route('admin.users.index') }}" class="btn btn-dark">Regresar</a>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection