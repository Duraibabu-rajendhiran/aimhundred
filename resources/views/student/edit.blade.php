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
        <form action="{{ route('student.update', $student->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <h4 style="text-align:center;">Edit student Data</h4>
            </div>
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Full Name</label>
                <input type="hidden" name="deleted_id" value="0" class="form-control" id="recipient-name">
                <input type="text" value="{{ $student->full_name }}" name="full_name" class="form-control"
                    id="recipient-name">

            </div>

            <label class="form-label" for="customFile">profile</label>
            <input type="file" name="profile_image" value="{{ $student->profile_image }}" class="form-control" />



            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Phone</label>

                <input type="text" value="{{ $student->phone }}" name="phone" class="form-control" id="recipient-name">

            </div>
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Date Of Birth</label>

                <input type="text" value="{{ $student->date_of_birth }}" name="date_of_birth" class="form-control"
                    id="recipient-name">

            </div>
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Father</label>

                <input type="text" value="{{ $student->father }}" name="father" class="form-control" id="recipient-name">

            </div>
            <div class="mb-3">
                {{-- <label for="recipient-name" class="col-form-label">Device Id</label> --}}
                <input type="hidden" value="{{ $student->device_id }}" name="device_id" class="form-control"
                    id="recipient-name">
                <input type="hidden" value="{{ $student->device_type }}" name="device_type" class="form-control"
                    id="recipient-name">
            </div>
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Adress</label>
                <input type="text" value="{{ $student->address }}" name="address" class="form-control"
                    id="recipient-name">
            </div>


            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Class</label>
                <select name="class_id" class="form-select" id="">
                    <option value="{{ $student->class_id }}">{{ $student->class }}</option>
                    @foreach ($period as $data)
                        <option value="{{ $data->id }}">{{ $data->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Section</label>
                <select name="section_id" class="form-select" id="">
                    <option value="{{ $student->section_id }}">{{ $student->section }}</option>
                    @foreach ($section as $data)
                        <option value="{{ $data->id }}">{{ $data->title }}</option>
                    @endforeach

                </select>
            </div>

   <?php	if(empty(session('SchoolId'))){ ?>
   
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Board</label>
                <select name="board_id" class="form-select" id="board">
                    <option value="{{ $student->board_id }}">{{ $student->board }}</option>
                    @foreach ($board as $data)
                        <option value="{{ $data->id }}">{{ $data->title }}</option>
                    @endforeach

                </select>
            </div>
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">School</label>
                <select name="school_id" class="form-select" id="school">

                    <option value="{{ $student->school_id }}">{{ $student->school_name }}</option>

                </select>
            </div>
            
        <?php }else{ ?>
        
        
        <input type="hidden" name="board_id" id="board" value="<?php echo $student->board_id; ?>">
        
        
        <input type="hidden" name="school_id" id="school" value="<?php echo $student->school_id; ?>">
        
        <?php } ?>

            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">medium</label>
                <select name="medium_id" class="form-select" id="">
                    <option value="{{ $student->medium_id }}">{{ $student->medium }}</option>
                    @foreach ($medium as $data)
                        <option value="{{ $data->id }}">{{ $data->title }}</option>
                    @endforeach
                </select>
            </div>


            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Academic Year</label>
                <select name="academic_year" class="form-select" id="">
                    <option value="{{ $student->academic_year }}">{{ $student->academic }}</option>
                    @foreach ($academic as $data)
                        <option value="{{ $data->id }}">{{ $data->from }} . {{ $data->to }}</option>
                    @endforeach
                </select>
            </div>

            <button style="margin-left:34%;" type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' type='text/javascript'></script>



    <script>
        $('#board').change(function() {
            var classID = $(this).val();
            if (classID) {
                $.ajax({
                    type: "GET",
                    url: "{{ url('boardt') }}?board_id=" + classID,
                    success: function(res) {
                        if (res) {
                            $("#school").empty();
                            $("#school").append('<option>Select school</option>');
                            $.each(res, function(key, value) {
                                $("#school").append('<option value="' + key + '">' + value +
                                    '</option>');
                            });
                        } else {
                            $("#school").empty();
                        }
                    }
                });
            } else {
                $("#school").empty();

            }
        });
    </script>
@endsection
