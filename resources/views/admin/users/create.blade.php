@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Crear usuario</div>
                </div>
                <div class="card-body">
                    {{ Form::open(['route' => 'admin.users.store', 'method' => 'POST']) }}
                        <div class="row">
                            <div class="col-md-6">
                                {{ Form::bsText('name') }}
                            </div>
                            <div class="col-md-6">
                                {{ Form::bsEmail('email') }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                {{ Form::bsPassword('password') }}
                            </div>
                            <div class="col-md-6">
                                {{ Form::bsPassword('password_confirmation') }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                {{ Form::bsSelect('role', $roles, null, ['placeholder' => 'Seleccione el rol']) }}
                            </div>
                        </div>
                        {{ Form::submit('Guardar', ['class' => 'btn btn-success']) }}
                        <a href="{{ route('admin.users.index') }}" class="btn btn-dark">Regresar</a>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection