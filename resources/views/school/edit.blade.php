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
    <form action="{{ route('school.update', $school->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <h2 style="text-align:center;">Edit School Data</h2>
        </div>

        <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Board</label>
            <select name="board_id" class="form-select" id="">
            <option value="{{$school->board_id}}">{{$school->title}}</option>
                @foreach ($board as $data)
                <option value="{{$data->id}}">{{$data->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">School</label>
            <input type="text" name="school_name" class="form-control" value="{{ $school->school_name }} " id="exampleInputPassword1">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Street</label>
            <input type="text" name="street" class="form-control" value="{{ $school->street }}">
        </div>


        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Door Number</label>
            <input type="text" name="door_number" class="form-control" value="{{ $school->door_number }}">
        </div>

        <div class="mb-3">
            <label for="message-text" class="col-form-label">Email:</label>
            <input class="form-control" style="text-transform: lowercase;" value="{{ $school->email }}" name="email" id="message-text" placeholder="Enter Email" required>
        </div>

        <div class="mb-3">
            <label for="message-text" class="col-form-label">Mobile:</label>
            <input class="form-control" name="mobile" id="message-text" type="number"  value="{{ $school->mobile }}"  placeholder="Enter Mobile" required>
        </div>

        <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Location</label>
        
            <select name="location_id" class="form-select" id="">
            <option value="{{$school->location_id}}">{{$school->district}} ,{{$school->state}} ,{{$school->city}}</option>
                @foreach ($location as $data)
                <option value="{{$data->id}}">{{$data->district}} ,{{$data->state}} ,{{$data->city}}</option>
                @endforeach
            </select>
        </div>
        <input type="hidden" name="updated" class="form-control" value="{{ $school->updated }}">

        <button style="margin-left:34%;" type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection