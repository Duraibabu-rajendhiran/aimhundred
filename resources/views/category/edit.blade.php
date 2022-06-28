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
    <form action="{{ route('category.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <h2 style="text-align:center;">Edit Category Data</h2>
        </div>
     
	<div class="mb-3">
		<label for="recipient-name" class="col-form-label">Board</label>
		<select name="board" class="form-select" id="board" required>
			<option value="{{ $category->board }}">{{ $category->boards }}</option>
			<option value="">Select Board</option>
			@foreach ($board as $data)
				<option value="{{ $data->id }}">{{ $data->title }}
				</option>
			@endforeach
		</select>
	</div>

	<div class="mb-3">
		<label for="recipient-name" class="col-form-label">Class</label>
		<select name="class" class="form-select" id="class" required>
			<option value="{{ $category->class}}">{{ $category->classes }}</option>
		  @foreach ($class as $data )
		  <option value="{{$data->id}}">{{$data->title}}</option>
		  @endforeach
		</select>
	</div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">No Of Question/subject</label>
            <input type="text" name="no_of_question_sub" class="form-control" value="{{ $category->no_of_question_sub }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">time Per question</label>
            <input type="text" name="time_per_question" class="form-control" value="{{ $category->time_per_question }}">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Start time</label>
            <input type="text" name="start_time" class="form-control" value="{{ $category->start_time }}">
        </div>
        <button style="margin-left:34%;" type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection