@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @role('domicilary')
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Generar guia</div>
                    </div>
                    <div class="card-body">
                        {{ Form::open(['route' => 'home.store', 'method' => 'POST']) }}
                            {{ Form::bsDate('date', \Carbon\Carbon::now()) }}
                            {{ Form::submit('Generar', ['class' => 'btn btn-success']) }}
                        {{ Form::close() }}
                    </div>
                </div>
            @endrole
        </div>
    </div>
@endsection