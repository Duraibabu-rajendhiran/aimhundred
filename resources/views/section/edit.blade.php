@extends('layouts.master')
@section('content')


<style>
    .form {
        margin-left: 30%;
        width: 50%;
        background-color: lightgray;
        padding: 5px 20px;
        border-radius: 6px;
    }
    label {
        text-align: center;
    }
</style>

<div class="form">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="text-center font-weight-bolder">
                <h4 class="font-weight-bold">Edit section</h4>
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
    <form action="{{ route('section.update', $section->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>   Title:   </strong>
                    <input type="text" name="title" value="{{ $section->title }}" class="form-control" placeholder="Name">
               
                </div>
                </div>
        
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong></strong>
                 
                    <input type="hidden" name="school_id"  class="form-control" 
                        value="{{ session('SchoolId') }}">
                </div>
            </div>

       
        
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
</div>
@endsection
