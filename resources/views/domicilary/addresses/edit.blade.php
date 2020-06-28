@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Editar dirección</div>
                </div>
                <div class="card-body">
                    {{ Form::open(['route' => ['domicilary.addresses.update', $address->id], 'method' => 'PUT']) }}
                        {{ Form::hidden('user_id', $address->user_id) }}
                        <div class="row">
                            <div class="col-md-6">
                                {{ Form::bsText('career', $address->career) }}
                            </div>
                            <div class="col-md-6">
                                {{ Form::bsText('street', $address->street) }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                {{ Form::bsTextArea('description', $address->desciption) }}
                            </div>
                        </div>
                        {{ Form::submit('Actualizar', ['class' => 'btn btn-success']) }}
                        <a href="{{ route('domicilary.addresses.index') }}" class="btn btn-dark">Regresar</a>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection