@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Usuarios</div>
                    <div class="card-options">
                        <a href="{{ route('admin.users.create') }}" class="btn btn-success btn-sm">Nuevo <i class="fas fa-plus"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Rol</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>@isset($user->roles[0]['name']) {{ $user->roles[0]['name'] }} @endisset </td>
                                    <td class="text-right">
                                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary btn-sm">Editar <i class="fas fa-edit"></i></a>
                                    </td>
                                </tr>
                                @endforeach 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection