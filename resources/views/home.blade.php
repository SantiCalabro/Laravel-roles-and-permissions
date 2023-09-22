@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Dashboard</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 col-xl-4">
                                    <div style="padding:15px;" class="card bg-c-green order-card">
                                        <div class="card-blok">
                                                <h5>Users</h5>
                                                @php
                                                use App\Models\User;
                                                $users_count = User::count();
                                                @endphp
                                                <h2 class="text-right">
                                                    <i class="fa fa-users f-left"></i>
                                                    <span>{{$users_count}}</span>
                                                </h2>
                                                <p class="m-b-0 text-right">
                                                    <a href="/users" class="text-white">Watch more</a>
                                                </p>
                                        </div>
                                    </div>
                                </div>
                           
                            
                                <div class="col-md-4 col-xl-4">
                                    <div  style="padding:15px;" class="card bg-c-pink order-card">
                                        <div class="card-blok">
                                                <h5>Roles</h5>
                                                @php
                                                use Spatie\Permission\Models\Role;
                                                $roles_count = Role::count();
                                                @endphp
                                                <h2 class="text-right">
                                                    <i class="fa fa-users f-left"></i>
                                                    <span>{{$roles_count}}</span>
                                                </h2>
                                                <p class="m-b-0 text-right">
                                                    <a href="/roles" class="text-white">Watch more</a>
                                                </p>
                                        </div>
                                    </div>
                                </div>
                           
                                <div class="col-md-4 col-xl-4">
                                    <div  style="padding:15px;" class="card bg-c-blue order-card">
                                        <div class="card-blok">
                                                <h5>Blogs</h5>
                                                @php
                                                use App\Models\Blog;
                                                $blogs_count = Blog::count();
                                                @endphp
                                                <h2 class="text-right">
                                                    <i class="fa fa-users f-left"></i>
                                                    <span>{{$blogs_count}}</span>
                                                </h2>
                                                <p class="m-b-0 text-right">
                                                    <a href="/blogs" class="text-white">Watch more</a>
                                                </p>
                                        </div>
                                    </div>
                                </div>
                            



                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

