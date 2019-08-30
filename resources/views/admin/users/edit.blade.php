@extends('layouts.admin')


@section('content')


    <h1>Edit Users</h1>
    
    <div class="row">
        
        <div class="col-sm-3">

            <img src="{{$user->photo ? $user->photo->file : "https://via.placeholder.com/150"}}" class="img-responsive img-rounded" alt="">
            
        </div>

        <div class="col-sm-9">

            <form method="post" action="{{route('admin.users.update',['id'=>$user->id])}}" enctype="multipart/form-data">
                {{--<input type="hidden" name="_token" value="{{csrf_token()}}">--}}
                <input name="_method" type="hidden" value="PATCH">
                {{csrf_field()}}
        
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{$user->name}}">
        
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" value="{{$user->email}}">
                </div>
        
                <div class="form-group">
                    <label for="file">Photo</label>
                    <input type="file" name="photo_id" class="form-control">
                </div>
        
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" value="{{$user->password}}">
                </div>
                <div class="form-group">
                    <label for="role_id">Role</label>
                    <select name="role_id" class="form-control">
        
                        @foreach($roles as $id => $role)
                            @if ($user->role_id == $id)
                                <option value="{{$id}}" selected>{{$role}}</option>
                            @else
                                <option value="{{$id}}">{{$role}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="is_active" class="form-control">
                        @if ($user->is_active == 1)
                        <option value = "1" selected">Active</option>
                        <option value = "0">Not Active</option>
                        @else
                            <option value="0">Not Active</option>
                            <option value="1">Active</option>
                        @endif
                    </select>
                </div>
        
                <div class="form-group">
                    <input type="submit" name="create" value="Update User" class="btn btn-primary col-sm-6">
                </div>
        
            </form>
            <form method="post" action="{{route('admin.users.destroy',['id'=>$user->id])}}">
                <input type="hidden" name="_method" value="DELETE">
                {{csrf_field()}}

                <div class="form-group ">
                    <input type="submit" name="delete" value="Delete User" class="btn btn-danger col-sm-6">
                </div>

            </form>

        </div>
    </div>

    <div class="row">
        @include('includes.form_error')
    </div>

@stop