@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Usuarios</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <!-- Lleva al método create de users - devuelve una vista -->
                        <a class="btn btn-warning" href="{{route('users.create')}}">Nuevo</a>

                        <table class="table table-striped mt-2">
                            <thead style="background-color: #6777ef;">
                                <th style="color: #fff">ID</th>
                                <th style="color: #fff;">Name</th>
                                <th style="color: #fff;">E-mail</th>
                                <th style="color: #fff;">Role</th>
                                <th style="color: #fff;">Actions</th>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>

                                    <td>
                                        @if(!empty($user->getRoleNames()))
                                        @foreach($user->getRoleNames() as $roleName)
                                        <h5><span class="badge badge-dark">{{$roleName}}</span></h5>
                                        @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        <!-- edit en UserController devuelve una vista! -->
                                        <a class="btn btn-info" href="{{route('users.edit', $user->id)}}">Editar</a>
                                        <!-- Manejo de formulario con Laravel Collective. Es lo mismo que hacer uno tradicional con etiqueta <form action="" method=""/> -->
                                        <!-- users.destroy borra y devuelve la vista users -->
                                        {!! Form::open(['method'=> 'DELETE', 'route'=>['users.destroy', $user->id], 'style'=>'display:inline']) !!}
                                        {!! Form::submit('Delete', ['class'=>'btn btn-danger'])!!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="paginatio justify-content-end">
                            {!! $users->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection