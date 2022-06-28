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
    <form action="{{ route('subject.update', $subject->id) }}" method="POST"   enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <h2 style="text-align:center;">Subject</h2>
        </div>

        <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Class</label>
            <select name="class_id" class="form-select" id="">
            <option value="{{$subject->class_id}}">{{$subject->class}}</option>
                @foreach ($class as $data)
                <option value="{{$data->id}}">{{$data->title}}</option>
                @endforeach
            </select>
        </div>


        <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Subject Image</label>
        <select name="subject_image" class="form-select" id="">
            <option value="{{$subject->subject_image}}">{{$subject->book_title}}</option>
            @foreach ($book as $item)
                
            <option value="{{$item->book_image}}">{{$item->book_title}}</option>
            @endforeach
            
  </select>
        </div>
        
        <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Board</label>
            <select name="board_id" class="form-select" id="">
            <option value="{{$subject->board_id}}">{{$subject->board}}</option>
                @foreach ($board as $data)
                <option value="{{$data->id}}">{{$data->title}}</option>
                @endforeach
            </select>
        </div>  
      
        <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Medium</label>
            <select name="medium_id" class="form-select" id="">
            <option value="{{$subject->medium_id}}">{{$subject->medium}}</option>
                @foreach ($medium as $data)
                <option value="{{$data->id}}">{{$data->title}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">subject</label>
            <input type="text" name="subject" class="form-control" value="{{ $subject->subject }}">
        </div>
        <input type="hidden" name="is_delete" class="form-control" value="{{ $subject->is_delete }}">
        <button style="margin-left:34%;" type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection