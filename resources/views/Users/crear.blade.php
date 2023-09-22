@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">New user</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        @if($errors->any())
                        <div class="alert alert-dark alert-dismissible fade show" role="aler">
                            <strong>Check the fields!</strong>
                            @foreach($errors->all() as $error)
                            <span class="badge badge-error">{{$error}}</span>
                            @endforeach
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span>&times;</span>
                            </button>
                        </div>
                        @endif
                        {!! Form::open(array('route'=>'users.store', 'method'=>'POST'))!!}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <!-- name es por label, null es para que el campo no tenga ningún value por defecto (no es lo mismo que placeholder) -->
                                    {!! Form::text('name', null , array('class'=>'form-control', 'placeholder'=>'Insert a name'))!!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    {!! Form::text('email', null , array('class'=>'form-control', 'placeholder'=>'Insert an Email'))!!}
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="">Roles</label>
                                    <!-- roles[] indica que es un campo de selección múltiple, [] es solo para indicar que "preseleccione" valores por defecto-->
                                    {!! Form::select('roles[]', $roles, [] , array('class'=>'form-control'))!!}
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <button type="submit" class="btn btn-submit">Submit</button>
                        </div>
                        {!! Form::close()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection