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




<div class="form" style="margin-top:3%;">
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
    <form action="{{ route('lesson.update', $lesson->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <h2 style="text-align:center;">Edit lesson Data</h2>
        </div> 
    
        <div class="mb-3">
            <label for="recipient-name" class="col-form-label">board</label>
            <select name="board_id" class="form-select" id="board">
            <option value="{{$lesson->board_id}}">{{ $lesson->board }}</option>
                @foreach ($board as $data)
                <option value="{{$data->id}}">{{$data->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Medium</label>
            <select name="medium_id" class="form-select" id="medium">
            <option value="{{$lesson->medium_id}}">{{ $lesson->medium }}</option>
                @foreach ($medium as $data)
                <option value="{{$data->id}}">{{$data->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Class</label>
            <select name="class_id" class="form-select" id="class">
            <option value="{{$lesson->class_id}}">{{ $lesson->class }}</option>
                @foreach ($class as $data)
                <option value="{{$data->id}}">{{$data->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="recipient-name" class="col-form-label">subject</label>
            <select name="subject_id" class="form-select" id="subject">
            <option value="{{$lesson->subject_id}}">{{ $lesson->subject }}</option>
              
            </select>
        </div>


        

 
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Lesson</label>
            <input type="text" name="title" class="form-control" value="{{ $lesson->title }}">
        </div>


        <input type="hidden" name="is_delete" class="form-control" value="{{ $lesson->is_delete }}">
        <button style="margin-left:34%;" type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script>


$('#class').change(function() {
                            var classID = $(this).val();
							var boardID = $('#board').val();
							var mediumID = $('#medium').val();
                            if (classID) {
                                $.ajax({
                                    type: "GET",
                                    url: "{{ url('classit') }}?class_id=" + classID+'&board_id='+boardID+'&medium_id='+mediumID,
                                    success: function(res) {
                                        if (res) {
                                            $("#subject").empty();
                                            $("#subject").append('<option>Select subject</option>');
                                            $.each(res, function(key, value) {
                                                $("#subject").append('<option value="' + key + '">' + value +
                                                    '</option>');
                                            });
                                        } else {
                                            $("#subject").empty();
                                        }
                                    }
                                });
                            } else {
                                $("#subject").empty();
                                $("#per").empty();
                            }
                        });






</script>

@endsection