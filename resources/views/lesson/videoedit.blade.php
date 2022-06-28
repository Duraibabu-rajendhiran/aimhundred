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
    <form action="{{ route('videoupdate',$user->id) }}" method="POST"
        enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Board</label>
            <select name="board_id" id="board" class="form-select" required>
                <option value="{{ $user->board_id }}">{{ $user->board }}
                </option>
                @foreach ($board as $data)
                    <option value="{{ $data->id }}">{{ $data->title }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="recipient-name" class="col-form-label">medium</label>
            <select name="medium_id" class="form-select" id="medium"
                required>
                <option value="{{$user->medium_id }}">{{ $user->medium }}
                </option>
                @foreach ($medium as $data)
              
                    <option value="{{ $data->id }}">{{ $data->title }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Class</label>
            <select name="class_id" class="form-select" id="class" required>
                <option value="{{ $user->class_id }}">{{ $user->class }}
                </option>
                @foreach ($class as $data)
            
                    <option value="{{ $data->id }}">{{ $data->title }}
                    </option>
                @endforeach
            </select>
        </div>

       
        <div class="mb-3">
            <label for="recipient-name" class="col-form-label">subject</label>
            <select name="subject_id" class="form-select" id="subject">
            <option value="{{$user->subject_id}}">{{ $user->subject }}</option>
              
            </select>
        </div>
        <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Heading</label>
            <input name="heading" value="{{$user->heading}}" class="form-control" />
        </div>

        <div class="mb-3">
            <label for="recipient-name" class="col-form-label">description</label>
            <textarea name="descc" id="" value="{{$user->descc}}"  class="form-control" cols="30" rows="10">{{$user->descc}}</textarea>
        </div>
        <div class="mb-3">
            <label for="recipient-name" class="col-form-label">video</label>
            <input type="file" name="video"  value={{$user->video_url}} class="form-control">
        </div>


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