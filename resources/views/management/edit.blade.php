{{-- @extends('layouts.app')

@section('content') --}}

<style>
    .adj {
        padding: 10px;
    }
</style>
<div class="adj">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="text-center font-weight-bolder">
                <h4 class="font-weight-bold">Edit management</h4>
            </div>
     
    </div>
</div>
@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif



<form action="{{ route('management.update', $management->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Full Name</strong>
                <input type="text" value="{{$management->fullname}}" name="fullname" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>UserName</strong>
                <input type="text" value="{{$management->username}}" name="username" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Role</strong>
                <select name="role" class="form-select" id="">
                    <option value="{{$management->role}}">Select Role</option>
                    <option value="1">Super Admin</option>
                    <option value="2">Admin</option>
                    <option value="3">Teacher</option>
                    <option value="4">School</option>\
                </select>
            </div>
        </div>




        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email</strong>
                <input type="hidden" name="deleted_id" value="0">

                <input type="email" value="{{$management->email}}" style="text-transform:lowercase;"  name="email" class="form-control" placeholder="Name">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>phone</strong>
                <input type="hidden" name="deleted_id" value="0">

                <input type="text" value="{{$management->phone}}" style="text-transform:lowercase;"  name="phone" class="form-control" placeholder="phone">
            </div>
        </div>




        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong></strong>
                <input type="hidden" name="updated" class="form-control" value="{{ $management->updated }}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>



</form>
</div>
{{-- @endsection --}}