@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Edit role</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        @if($errors->any())
                        <div class="alert alert-dark alert-dismissible fade show" role="alert">
                            <strong>Check the fields!</strong>
                            @foreach($errors->all() as $error)
                            <span class="badge badge-alert">{{$error}}</span>
                            @endforeach
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        @endif
                        <!-- Model se utiliza para abrir un formulario basado en un modelo existente. Para crear usamos Open -->
                        <!-- Está recibiendo $role por props desde edit -->
                        {!! Form::model($role, ['method'=>'PATCH', 'route'=>['roles.update', $role->id]]) !!}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="">Role name</label>
                                    {!! Form::text('name', null, array('class'=>'form-control')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="">Role permissions</label>
                                    <br />
                                    @foreach($permission as $value)
                                    <!-- <label for="">
                                        {!! Form::checkbox('permissions[]', $value->id, false, array('class'=>'name')) !!}
                                        {{$value->name}}
                                    </label>
                                    <br /> -->
                                 
                                    <label>{!!Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermission))!!} 
                                             {{$value->name}}
                                        </label>
                                        <br>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection