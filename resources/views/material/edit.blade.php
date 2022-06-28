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
    <form action="{{ route('material.update', $material->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')     


      <input type="hidden" value="{{ $material->id}}" name="id">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">File Type</label>
            <select name="file_type" class="form-select" id="mySelect" required>
                <?php if($material->file_type == 0){ ?>
                    <option value="0">Pdf</option>
                   
                    <?php }else{?>
                    <option value="1">Video URL</option>
               
                    <?php } ?>
                </select>
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">File Name</label>

            <?php if($material->file_type == 0){ ?>
                <input type="file"  class="form-control" name="file_name"   value="{{ $material->file_name}}">
                <?php }else{?>
                <input type="text"  class="form-control" name="file_name" value="{{ $material->file_name}}">
                <?php } ?>
        </div>
   <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Board</label>

            <select  name="board_id" class="form-select" id="board" required>
                
                    <option value={{ $material->board_id}}>{{ $material->board}}</option>

                    @foreach ($board as $less )
                    <option value={{$less->id}}>{{$less->title}}</option>
                    @endforeach
                
                </select>
         
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Medium</label>
            <select  name="medium_id" class="form-select" id="medium" required>
                    <option value={{ $material->medium_id}}>{{ $material->medium}}</option>
                    @foreach ($medium as $less )
                    <option value={{$less->id}}>{{$less->title}}</option>
                    @endforeach
       </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Class</label>
            <select  name="class_id" class="form-select" id="class" required>
                    <option value={{ $material->class_id}}>{{ $material->class}}</option>
                    @foreach ($class as $less )
                    <option value={{$less->id}}>{{$less->title}}</option>
                    @endforeach
                </select>
        </div>
    

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Subject</label>
            <select  name="subject_id" class="form-select" id="subject" required>
                    <option value={{ $material->subject_id}}>{{ $material->subject}}</option>
                </select>
         
        </div>


        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Lesson</label>
            <select  name="lesson_id" class="form-select" id="lesson" required>
                    <option value={{ $material->lesson_id}}>{{ $material->lesson}}</option>
                </select>
         
        </div>
        <button style="margin-left:34%;" type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' type='text/javascript'></script>

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

    $('#subject').on('change', function() {
        var subjectID = $(this).val();
        if (subjectID) {
            $.ajax({
                type: "GET",
                url: "{{ url('subjectit') }}?subject_id=" + subjectID,
                success: function(res) {
                    if (res) {
                        $("#lesson").empty();
                        $("#lesson").append('<option>lesson</option>');
                        $.each(res, function(key, value) {
                            $("#lesson").append('<option value="' + key + '">' + value +
                                '</option>');
                        });

                    } else {
                        $("#lesson").empty();
                    }
                }
            });
        } else {
            $("#lesson").empty();
        }
    });
</script>
@endsection