@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Direcciones</div>
                    <div class="card-options">
                        <a href="{{ route('domicilary.addresses.create') }}" class="btn btn-success btn-sm">Nuevo <i class="fas fa-plus"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Carrea</th>
                                    <th>Calle</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($addresses as $address)
                                    <tr>
                                        <td>{{ Carbon\Carbon::parse($address->created_at)->format('Y-m-d') }}</td>
                                        <td>{{ $address->career }}</td>
                                        <td>{{ $address->street }}</td>
                                        <td class="text-right">
                                            <div class="row">
                                                <div class="col-md-10 col-sm-10">
                                                    {{ Form::open(['route' => ['domicilary.addresses.destroy', $address->id], 'method' => 'DELETE']) }}
                                                        {{ Form::button('Eliminar <i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm'] )  }}
                                                    {{ Form::close() }}
                                                </div>
                                                <div class="col-md-2 col-sm-2">
                                                    <a href="{{ route('domicilary.addresses.edit', $address->id) }}" class="btn btn-primary btn-sm">Editar <i class="fas fa-edit"></i></a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">No hay direcciones</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection