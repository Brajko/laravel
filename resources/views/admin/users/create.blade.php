@extends('layouts.admin')


@section('content')


    <h1>Create Users</h1>


    <form method="post" action="{{route('admin.users.store')}}" enctype="multipart/form-data">
        {{--<input type="hidden" name="_token" value="{{csrf_token()}}">--}}
        {{csrf_field()}}

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control">

        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control">
        </div>

        <div class="form-group">
            <label for="file">Photo</label>
            <input type="file" name="photo_id" class="form-control">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="form-group">
            <label for="role_id">Role</label>
            <select name="role_id" class="form-control">
                <option value selected="selected">Choose Role</option>
            @foreach($roles as $id => $role)
                    <option value="{{$id}}">{{$role}}</option>
            @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="is_active" class="form-control">
                <option value selected="selected">Choose Status</option>
                <option value="0">Not Active</option>
                <option value="1">Active</option>
            </select>
        </div>

        <div class="form-group">
            <input type="submit" name="create" class="btn btn-primary">
        </div>

    </form>

    @include('includes.form_error')

@stop