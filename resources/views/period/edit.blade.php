@extends('layouts.master')
@section('content')
<style>
    .form {
        margin-top: 5%;
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
    <form action="{{ route('period.update', $period->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <h2 style="text-align:center;">Edit class Data</h2>
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Title</label>
        <input type="text" name="title" class="form-control" value="{{ $period->title }}">     
        <input type="hidden" name="updated" class="form-control" value="{{ $period->updated }}">
        </div>
   
        <button style="margin-left:34%;" type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>


@endsection