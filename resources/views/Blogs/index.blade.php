@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Blogs</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        @can('create-blog')
                        <a class="btn btn-warning" href="{{route('blogs.create')}}">New Blog</a>
                        @endcan

                        <table class="table table-striped mt-2">
                            <thead style="background-color:#6777ef">
                            <th style="color:#fff">ID</th>
                                <th style="color:#fff">Title</th>
                                <th style="color:#fff">Content</th>
                                <th style="color:#fff">Actions</th>
                               
                            </thead>
                            <tbody>
                                @foreach($blogs as $blog)
                                <tr>
                                <td>{{$blog->id}}</td>
                                    <td>{{$blog->title}}</td>
                                   
                                    <td>{{$blog->content}}</td>
                                    <td>
                                        @can('edit-blog')
                                        <a class="btn btn-primay" href="{{route('blogs.edit', $blog->id)}}">Edit</a>
                                        @endcan

                                        @can('delete-blog')
                                        {!! Form::open(['method'=>'DELETE', 'route'=>['blogs.destroy', $blog->id], 'style'=>'display: inline'])!!}
                                        {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                        <div class="pagination justify-content-end">
                            {!! $blogs->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection