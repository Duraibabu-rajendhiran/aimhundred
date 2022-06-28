@extends('layouts.master')

@section('content')

<style>
    .form {
        margin-left: 30%;
        width: 50%;
        background-color: lightgray;
        padding: 5px 20px;
        margin-top: 10px;
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
    <form action="{{ route('medium.update', $medium->id) }}" method="POST">
    @csrf
    @method('PUT')
        <div class="mb-3">
            <h4 style="text-align:center;">Edit Medium</h4>
        </div>
        <div class="mb-3">
        <input type="hidden" name="updated" class="form-control" value="{{ $medium->updated }}">

            <label for="recipient-name" class="col-form-label">Medium Title</label>

                <input type="text" name="title" value="{{ $medium->title }}" class="form-control" id="recipient-name">

        </div>
  

        <button style="margin-left:34%;" type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection
