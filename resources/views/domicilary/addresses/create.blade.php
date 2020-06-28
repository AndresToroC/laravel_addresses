@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Agregar dirección</div>
                </div>
                <div class="card-body">
                    {{ Form::open(['route' => 'domicilary.addresses.store', 'method' => 'POST']) }}
                        {{ Form::hidden('user_id', Auth::user()->id) }}
                        <div class="row">
                            <div class="col-md-6">
                                {{ Form::bsText('career') }}
                            </div>
                            <div class="col-md-6">
                                {{ Form::bsText('street') }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                {{ Form::bsTextArea('description') }}
                            </div>
                        </div>
                        {{ Form::submit('Guardar', ['class' => 'btn btn-success']) }}
                        <a href="{{ route('domicilary.addresses.index') }}" class="btn btn-dark">Regresar</a>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection