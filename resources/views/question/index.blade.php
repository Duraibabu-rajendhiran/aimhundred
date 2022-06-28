@extends('layouts.master')
@section('content')
    <?php
    use Illuminate\Support\Facades\DB; ?>

    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0">
                            <img width="30px"
                                src="data:image/png;base64,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" />
                            Question
                        </h1>
                    </div>
                    <div class="col-auto">
                        <div class="page-utilities">
                            <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                                <div class="col-auto">
                                </div>


                                @if ($errors->any())
                                    <?php
                                    echo '<script type ="text/JavaScript">';
                                    echo 'alert("' . $errors->first() . '")';
                                    echo '</script>';
                                    ?>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>

<?php    if(isset($_GET["board_id"])){  ?>

<div style="display:flex;justify-content:space-around;">

    <?php
    
    $boardname = DB::table('boards')
->where('boards.id',$_GET["board_id"])
->first();

    $classname = DB::table('periods')
->where('periods.id',$_GET["class_id"])
->first();
    $subjectname = DB::table('subjects')
->where('subjects.id',$_GET["subject_id"])
->first();
    $mediumname = DB::table('media')
->where('media.id',$_GET["medium_id"])
->first();

?>
<h4><?php echo $boardname->title ?></h4>
<h4><?php echo $classname->title ?></h4>
<h4><?php echo $subjectname->subject ?></h4>
<h4><?php echo $mediumname->title ?>
<button class="btn btn-danger" onclick="resetdiv()">   Reset</button>
</h4>

</div>




                <?php
               } 

                ?>
<div id="displaycheck" style="display:<?php echo isset($_GET["board_id"])?"none":"block"; ?>">
    <form action="search" method="GET">
        @csrf
        <?php if (empty(session('SchoolId'))) { ?>
        <select class="form-select" name="board_id" aria-label="Default select example"
            style="width:100px;display:inline-block;text-transform:capitalize;" onchange='saveValue(this)' ;
            id="board2">
            <option value="">Board</option>
            @foreach ($board as $data)
                <option value="{{ $data->id }}">{{ $data->title }}</option>
            @endforeach
        </select>
        <?php } ?>
        <select class="form-select" name="medium_id" id="medium2" onchange='saveValue(this)' ;
            aria-label="Default select example"
            style="width:100px;display:inline-block;text-transform:capitalize;">
            <option value="">Medium</option>
            @foreach ($medium as $data)
                <option value="{{ $data->id }}">{{ $data->title }}</option>
            @endforeach
        </select>
        <?php if (!empty(session('SchoolId'))) { 
            
           $boardfind =  DB::table('schools')
            ->where('id',session('SchoolId'))
            ->get();
            ?>



        <input type="hidden"  name="board_id" value="{{$boardfind[0]->board_id}}" id="board2">

        <?php } ?>
        <select class="form-select" onchange='saveValue(this)' ; name="class_id" id="class2"
            aria-label="Default select example"
            style="width:100px;display:inline-block;text-transform:capitalize;">
            <option value="">class</option>
            @foreach ($class as $data)
                <option value="{{ $data->id }}">{{ $data->title }}</option>
            @endforeach
        </select>
        <select class="form-select" name="subject_id" onchange='saveValue(this)' ; id="subject2"
            aria-label="Default select example"
            style="width:100px;display:inline-block;text-transform:capitalize;">
        </select>
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-search"></i></button>
    </form>
</div>
             



                <?php
                if (isset($user) && sizeof($user)>0 ) {
                 
                   if (session('SchoolId') == 0){ 
                ?>
                <form action="{{ route('questionDelete') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div style="display:flex;justify-content:flex-end;">
                        <div>
                            <input type="hidden" name="lesson" value="{{ $_GET['lesson'] }}">

                            <select name="academic_id" class="form-select"
                                style="width:100px;display:inline-block;text-transform:capitalize;" required>
                                <option value="">Academic</option>
                                @foreach ($academic as $data)
                                    <option value="{{ $data->id }}">
                                        {{ $data->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <button class="btn btn-danger"
                                onclick="return confirm(' you want to delete All Question?');">Delete All</button>
                        </div>
                    </div>
                </form>

      <?php
                   }
    }

?>
                <div class="tab-content" id="orders-table-tab-content">
                    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                        <div class="app-card app-card-orders-table shadow-sm mb-5">
                            <div class="app-card-body">
                                <div class="table-responsive">
                                    @if ($message = Session::get('success'))
                                        <div class="alert alert-success">
                                            <p>{{ $message }}</p>
                                        </div>
                                    @endif
                                    <table class="table table-responsive w-100 d-block d-md-table">
                                     
                                            <?php $i = 1; ?>
<?php
if(isset($user1)){

?>
<tr>
    <th class="cell">Id</th>
    <th class="cell">Date</th>
    <th class="cell">View</th>
</tr>
    @foreach ($user as $data)
    <tr class="cell">
        <td>{{$i}}</td>
        <td>{{$data->created_at}}</td>  
        <td>
            
            <form action="{{ route('question.index') }}" method="GET">

                <input type="hidden" name="lesson"
                    value="{{$data->title}}">
                <button type="buttom" value="submit" class="btn btn-warning"
                    data-bs-toggle="modal"
                    data-bs-whatever="@getbootstrap">
                    View</button>
            </form> 
        
        </td>  
    </tr>
    @endforeach





                                            <?php
                                      }elseif (isset($user) ) {
                                            if(sizeof($user)>0){
                                        ?>
                                           <thead>
                                            <tr>
                                                <th class="cell">Id</th>
                                                <th class="cell">Question</th>
                                                <th class="cell">option 1</th>
                                                <th class="cell">option 2</th>
                                                <th class="cell">option 3</th>
                                                <th class="cell">option 4</th>
                                                <th class="cell">Answer</th>
                                                <th class="cell">Subject</th>
                                                <th class="cell">lesson</th>
                                                <th class="cell">class</th>
                                                <?php if (empty(session('SchoolId'))) { ?>
                                                <th class="cell">Action</th>
                                                <?php } ?>
                                            </tr>
                                            <?php } ?>

                                        </thead>
                                    
                                        <tbody>
                                            @foreach ($user as $data)
                                                <tr>
                                                    <td class="cell">{{ $i++ }}</< /td>
                                                    <td class="cell">
                                                        <?php
                                                if (!empty($data->title)) { ?>

                                                        <?php
                                                        echo $data->title;
                                                        ?>


                                                        <?php
                                                } else {  ?>
                                                        <a
                                                            href="{{ URL::asset('questions') }}/{{ $data->question_image }}">
                                                            <img src="{{ URL::asset('questions') }}/{{ $data->question_image }}"
                                                                width="40px" alt=""></a>
                                                        <?php  }
                                                ?>
                                                    </td>
                                                    <td class="cell">
                                                        <?php
                                                if (!empty($data->option_1)) { ?>
                                                        <?php
                                                        echo $data->option_1;
                                                        ?>
                                                        <?php
                                                } else {  ?>
                                                        <a
                                                            href="{{ URL::asset('questions') }}/{{ $data->option_image_1 }}">
                                                            <img src="{{ URL::asset('questions') }}/{{ $data->option_image_1 }}"
                                                                width="40px" alt=""></a>
                                                        <?php  }
                                                ?>
                                                    </td>
                                                    <td class="cell">
                                                        <?php
                                                if (!empty($data->option_2)) { ?>
                                                        <?php
                                                        echo $data->option_2;
                                                        ?>
                                                        <?php
                                                } else {  ?>
                                                        <a
                                                            href="{{ URL::asset('questions') }}/{{ $data->option_image_2 }}">
                                                            <img src="{{ URL::asset('questions') }}/{{ $data->option_image_2 }}"
                                                                width="40px" alt=""></a>
                                                        <?php  }
                                                ?>
                                                    </td>
                                                    <td class="cell">
                                                        <?php
                                                if (!empty($data->option_3)) { ?>
                                                        <?php
                                                        echo $data->option_3;
                                                        ?>
                                                        <?php
                                                } else {  ?>
                                                        <a
                                                            href="{{ URL::asset('questions') }}/{{ $data->option_image_3 }}">
                                                            <img src="{{ URL::asset('questions') }}/{{ $data->option_image_3 }}"
                                                                width="40px" alt=""></a>
                                                        <?php  }
                                                ?>
                                                    </td>
                                                    <td class="cell">
                                                        <?php
                                                if (!empty($data->option_4)) { ?>
                                                        <?php
                                                        echo $data->option_4;
                                                        ?>
                                                        <?php
                                                } else {  ?>
                                                        <a
                                                            href="{{ URL::asset('questions') }}/{{ $data->option_image_4 }}">
                                                            <img src="{{ URL::asset('questions') }}/{{ $data->option_image_4 }}"
                                                                width="40px" alt=""></a>
                                                        <?php  }
                                                ?>
                                                    </td>
                                                    <td class="cell">
                                                        <?php
                                                if (!empty($data->answer)) { ?>
                                                        <?php
                                                        echo $data->answer;
                                                        ?>
                                                        <?php
                                                } else {  ?>
                                                        <?php 
if($data->answer_image=="1"){
?>
                                                        <img src="{{ URL::asset('questions') }}/{{ $data->option_image_1 }}"
                                                            width="40px">
                                                        <?php
}elseif ($data->answer_image=="2") {?>
                                                        <img src="{{ URL::asset('questions') }}/{{ $data->option_image_2 }}"
                                                            width="40px">
                                                        <?php
}elseif ($data->answer_image=="3") {?>
                                                        <img src="{{ URL::asset('questions') }}/{{ $data->option_image_3 }}"
                                                            width="40px">
                                                        <?php
}elseif ($data->answer_image=="4") {?>
                                                        <img src="{{ URL::asset('questions') }}/{{ $data->option_image_4 }}"
                                                            width="40px">
                                                        <?php
}else{
    
    ?>

                                                        <img src="" alt="Please select answer Image" width="40px">
                                                        <?php
}
?>
                                                        <?php  }
                                                ?>
                                                    </td>
                                                    <td class="cell">{{ $data->subject }}</td>
                                                    <td class="cell">{{ $data->lesson }}</td>
                                                    <td class="cell">{{ $data->class }}</td>
                                                    <?php if (empty(session('SchoolId'))) { ?>
                                                    <td class="cell">
                                                        <a href="{{ route('question.edit', $data->id) }}"
                                                            class="btn btn-primary"><i class="fas fa-edit fa-1x"></i></a>

                                                        <form action="{{ route('question.destroy', $data->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
<?php 
 if (session('SchoolId')==0) { ?>
                                                            <button type="submit"
                                                                onclick="return confirm('you want to delete?');"
                                                                class="btn btn-danger">
                                                                <i class="fas fa-trash"></i></button>
                                                                <?php } ?>

                                                    </td>
                                                    <?php }  ?>
                                                    </form>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <?php  } else {
                                    $i = 1; ?>
                                        <tr>
                                            <th class="cell">Id</th>
                                            <th class="cell">lesson</th>
                                            <th class="cell">total Qusetions</th>
                                            <th class="cell">Question Upload</th>
                                            <th class="cell">total Material</th>
                                            <th class="cell">Material Upload</th>
                                        </tr>
                                        @foreach ($search as $key)
                                            <tr>
                                                <th class="cell">{{ $i++ }}</th>
                                                <th class="cell" style="text-align:left;">{{ $key->title }}
                                                </th>

                                                <th class="cell">
                                                    <?php
                                                    $size = DB::table('questions')
                                                        ->where('questions.lesson_id', '=', $key->id)
                                                        ->get();
                                                    ?>
                                                    {{ sizeof($size) }}
                                                </th>
                                                <th style="text-align:center;margin:auto;">
                                                    <div style="display:flex;">

                                                        <div>

                                                            <a href="{{ route('getuploadview', $key->id) }}"
                                                                class="btn btn-danger" style="padding:0%">Upload</a>




                                                        </div>



                                                        <div>
                                                            <button type="button" class="btn btn-primary" style="padding:0%"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#exam{{ $i }}"
                                                                data-bs-whatever="@getbootstrap">

                                                             CSV Upload

                                                            </button>
                                                        </div>

                                                        <div>
                                                            <form action="{{ route('groupquestion') }}" method="GET">

                                                                <input type="hidden" name="lesson"
                                                                    value="{{ $key->title }}">
                                                                <button type="buttom" value="submit" class="btn btn-warning"
                                                                    style="padding:0%" data-bs-toggle="modal"
                                                                    data-bs-whatever="@getbootstrap">
                                                                    View</button>
                                                            </form>
                                                        </div>
                                                    </div>


                                                </th>
                                                <th class="cell">
                                                    <?php $size1 = DB::table('materials')
                                                        ->where('materials.lesson_id', '=', $key->id)
                                                        ->get(); ?>

                                                    {{ sizeof($size1) }}

                                                </th>
                                                <th style="text-align:center;">
                                                    <div style="display:flex;">
                                                        <div>
                                                            <button type="button" class="btn btn-danger" style="padding:0%"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#examl{{ $i }}"
                                                                data-bs-whatever="@getbootstrap">

                                                            upload



                                                            </button>

                                                        </div>

                                                        <div class="modal fade" id="examl{{ $i }}"
                                                            tabindex="-1" aria-labelledby="exampleModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            Add
                                                                            material</h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <h3 style="color:#7209b7;text-align:center;">
                                                                            {{ $key->title }}
                                                                        </h3>
                                                                        <form action="{{ route('material.store') }}"
                                                                            method="POST" enctype="multipart/form-data">
                                                                            @csrf
                                                                            <input type="hidden" name="lesson_id"
                                                                                value="{{ $key->id }}">
                                                                            <div class="mb-3">
                                                                                <label for="recipient-name"
                                                                                    class="col-form-label">File
                                                                                    Type</label><br />
                                                                                <select name="file_type"
                                                                                    class="form-select" id="mySelect"
                                                                                    onchange="showDiv1(this,'val{{ $i }}','valb{{ $i }}')"
                                                                                    required>
                                                                                    <option value="">Select File Type
                                                                                    </option>
                                                                                    <option value="0">Pdf/Docment</option>
                                                                                    <option value="1">Video Url</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="mb-3"
                                                                                id="val{{ $i }}"
                                                                                style="display:none;">
                                                                                <label for="recipient-name"
                                                                                    class="col-form-label">Input
                                                                                    Your
                                                                                    File</label><br />
                                                                                <input type="file" name="file_name"
                                                                                    class="form-control"
                                                                                    id="recipient-name"
                                                                                    placeholder="Enter Video URL">
                                                                            </div>
                                                                            <div class="mb-3"
                                                                                id="valb{{ $i }}"
                                                                                style="display:none;">
                                                                                <label for="recipient-name"
                                                                                    class="col-form-label">Enter
                                                                                    video URL</label><br />
                                                                                <input type="text"
                                                                                    style="text-transform: lowercase;"
                                                                                    name="file_name1" class="form-control"
                                                                                    placeholder="Enter Video URL">
                                                                            </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <a data-bs-dismiss="modal" aria-label="Close"
                                                                            class="btn btn-secondary">Close</a>
                                                                        <button type="submit" name="submit"
                                                                            class="btn btn-primary">Save</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <form action="{{ route('material.index') }}" method="GET">
                                                                <input type="hidden" name="lesson"
                                                                    value="{{ $key->title }}">

                                                                <button type="buttom" value="submit" class="btn btn-primary"
                                                                    style="padding:0%" data-bs-toggle="modal"
                                                                    data-bs-whatever="@getbootstrap">
View
                                                                </button>
                                                            </form>
                                                        </div>


                                                    </div>

                                                </th>
                                                <div class="modal fade" id="exam{{ $i }}" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Add
                                                                    question
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h3 style="color:#7209b7;text-align:center;">
                                                                    {{ $key->title }}
                                                                </h3>
                                                                <form action="{{ route('question.store') }}"
                                                                    method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <input type="hidden" name="lesson_id"
                                                                        value="{{ $key->id }}">

                                                                    <label for="">upload input</label><br />
                                                                    <input type="file" class="form-control" name="file"
                                                                        required>
                                                                    <label for="">Select Academic</label><br />
                                                                    <select name="academic_id" class="form-select"
                                                                        required>
                                                                        <option value="">Academic</option>
                                                                        @foreach ($academic as $data)
                                                                            <option value="{{ $data->id }}">
                                                                                {{ $data->title }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>

                                                            </div>

                                                            <div class="modal-footer">
                                                                <a data-bs-dismiss="modal" aria-label="Close"
                                                                    class="btn btn-secondary">Close</a>
                                                                <button type="submit" name="submit"
                                                                    class="btn btn-primary">Save</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="modal fade" id="exam123{{ $i }}" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">

                                                </div>

                                                </form>
                                        @endforeach
                                        <?php } ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">

                    </div>
                    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet"
                        id="bootstrap-css">
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' type='text/javascript'></script>

                    <div class="modal fade" id="smallModal" tabindex="-1" role="dialog"
                        aria-labelledby="smallModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" id="smallBody">
                                    <div>
                                        <!-- the result to be displayed apply here -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' type='text/javascript'></script>
                    <script src="{{ URL::asset('assets/js/question.js') }}"></script>

                    <script>





                        function resetdiv() {
                            if(document.getElementById('displaycheck').style.display == "none"){
                            document.getElementById('displaycheck').style.display = "block";
                        }else{
                                document.getElementById('displaycheck').style.display = "none";

                            }
                        }

                        function showDiv(select1) {
                            if (select1.value == "0") {
                                document.getElementById('question').style.display = "inline";
                                document.getElementById('image').style.display = "none";
                            } else if (select1.value == "1") {
                                document.getElementById('question').style.display = "none";
                                document.getElementById('image').style.display = "inline";
                            } else if (select1.value == "2") {
                                document.getElementById('question').style.display = "inline";
                                document.getElementById('image').style.display = "inline";
                            } else {
                                document.getElementById('question').style.display = "none";
                                document.getElementById('image').style.display = "none";
                            }
                        }







                        function showDiv12(select1, id1, id2) {
                            if (select1.value == "0") {
                                document.getElementById(id1).style.display = "inline";
                                document.getElementById(id2).style.display = "none";
                            } else if (select1.value == "1") {
                                document.getElementById(id1).style.display = "none";
                                document.getElementById(id2).style.display = "inline";
                            } else if (select1.value == "2") {
                                document.getElementById(id1).style.display = "inline";
                                document.getElementById(id2).style.display = "inline";
                            } else {
                                document.getElementById(id1).style.display = "none";
                                document.getElementById(id2).style.display = "none";
                            }
                        }

                        function showDiv1(select1, val1, val2) {
                            if (select1.value == "0") {
                                document.getElementById(val1).style.display = "inline";
                                document.getElementById(val2).style.display = "none";
                            } else if (select1.value == "1") {
                                document.getElementById(val1).style.display = "none";
                                document.getElementById(val2).style.display = "inline";
                            } else {
                                document.getElementById(val1).style.display = "none";
                                document.getElementById(val2).style.display = "none";
                            }
                        }


                        $('#classd').change(function() {
                            var classID = $(this).val();
                            var boardID = $('#boardd').val();
                            var mediumID = $('#mediumd').val();
                            if (classID) {

                                $.ajax({
                                    type: "GET",
                                    url: "{{ url('classit') }}?class_id=" + classID + '&board_id=' + boardID +
                                        '&medium_id=' + mediumID,
                                    success: function(res) {
                                        if (res) {
                                            $("#subjectd").empty();
                                            $("#subjectd").append('<option>Select subject</option>');
                                            $.each(res, function(key, value) {
                                                $("#subjectd").append('<option value="' + key +
                                                    '">' + value +
                                                    '</option>');
                                            });
                                        } else {
                                            $("#subjectd").empty();
                                        }
                                    }
                                });

                            } else {

                                $("#subjectd").empty();
                                $("#per").empty();

                            }
                        });

                        $('#subjectd').on('change', function() {
                            var subjectID = $(this).val();
                            if (subjectID) {

                                $.ajax({
                                    type: "GET",
                                    url: "{{ url('subjectit') }}?subject_id=" + subjectID,
                                    success: function(res) {
                                        if (res) {
                                            $("#lessond").empty();
                                            $("#lessond").append('<option>lesson</option>');
                                            $.each(res, function(key, value) {
                                                $("#lessond").append('<option value="' + key +
                                                    '">' + value +
                                                    '</option>');
                                            });
                                        } else {
                                            $("#lessond").empty();
                                        }
                                    }
                                });

                            } else {
                                $("#lessond").empty();
                            }
                        });
                        $('#class').change(function() {
                            var classID = $(this).val();
                            var boardID = $('#board').val();
                            var mediumID = $('#medium').val();
                            if (classID) {
                                $.ajax({
                                    type: "GET",
                                    url: "{{ url('classit') }}?class_id=" + classID + '&board_id=' + boardID +
                                        '&medium_id=' + mediumID,
                                    success: function(res) {
                                        if (res) {
                                            $("#subject").empty();
                                            $("#subject").append('<option>Select subject</option>');
                                            $.each(res, function(key, value) {
                                                $("#subject").append('<option value="' + key +
                                                    '">' + value +
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
                                                $("#lesson").append('<option value="' + key + '">' +
                                                    value +
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

                        $('#class2').change(function() {
                            var classID = $(this).val();
                            var boardID = $('#board2').val();
                            var mediumID = $('#medium2').val();
                            if (classID) {
                                $.ajax({
                                    type: "GET",
                                    url: "{{ url('classit') }}?class_id=" + classID + '&board_id=' + boardID +
                                        '&medium_id=' + mediumID,
                                    success: function(res) {
                                        if (res) {
                                            $("#subject2").empty();
                                            $("#subject2").append('<option>Select subject</option>');
                                            $.each(res, function(key, value) {
                                                $("#subject2").append('<option value="' + key +
                                                    '">' + value +
                                                    '</option>');
                                            });
                                        } else {
                                            $("#subject2").empty();
                                        }
                                    }
                                });
                            } else {
                                $("#subject2").empty();
                                $("#per").empty();
                            }
                        });

                        $('#subject2').on('change', function() {
                            var subjectID = $(this).val();
                            if (subjectID) {
                                $.ajax({
                                    type: "GET",
                                    url: "{{ url('subjectit') }}?subject_id=" + subjectID,
                                    success: function(res) {
                                        if (res) {
                                            $("#lesson2").empty();
                                            $("#lesson2").append('<option>Select lesson</option>');
                                            $.each(res, function(key, value) {
                                                $("#lesson2").append('<option value="' + key +
                                                    '">' + value +
                                                    '</option>');
                                            });
                                        } else {
                                            $("#lesson2").empty();
                                        }
                                    }
                                });
                            } else {
                                $("#lesson2").empty();
                            }
                        });

                        $('#class1').change(function() {
                            var classID = $(this).val();
                            var boardID = $('#board1').val();
                            var mediumID = $('#medium1').val();
                            if (classID) {
                                $.ajax({
                                    type: "GET",
                                    url: "{{ url('classit') }}?class_id=" + classID + '&board_id=' + boardID +
                                        '&medium_id=' + mediumID,
                                    success: function(res) {
                                        if (res) {
                                            $("#subject1").empty();
                                            $("#subject1").append('<option>Select subject</option>');
                                            $.each(res, function(key, value) {
                                                $("#subject1").append('<option value="' + key +
                                                    '">' + value +
                                                    '</option>');
                                            });
                                        } else {
                                            $("#subject1").empty();
                                        }
                                    }
                                });
                            } else {
                                $("#subject1").empty();
                                $("#per").empty();
                            }
                        });

                        $('#subject1').on('change', function() {
                            var subjectID = $(this).val();
                            if (subjectID) {
                                $.ajax({
                                    type: "GET",
                                    url: "{{ url('subjectit') }}?subject_id=" + subjectID,
                                    success: function(res) {
                                        if (res) {
                                            $("#lesson1").empty();
                                            $("#lesson1").append('<option>Select lesson</option>');
                                            $.each(res, function(key, value) {
                                                $("#lesson1").append('<option value="' + key +
                                                    '">' + value +
                                                    '</option>');
                                            });
                                        } else {
                                            $("#lesson1").empty();
                                        }
                                    }
                                });
                            } else {
                                $("#lesson1").empty();
                            }
                        });

                        $(document).on('click', '#smallButton', function(event) {
                            event.preventDefault();
                            let href = $(this).attr('data-attr');
                            $.ajax({
                                url: href,
                                beforeSend: function() {
                                    $('#loader').show();
                                },
                                // return the result
                                success: function(result) {
                                    $('#smallModal').modal("show");
                                    $('#smallBody').html(result).show();
                                },
                                complete: function() {
                                    $('#loader').hide();
                                },
                                error: function(jqXHR, testStatus, error) {
                                    console.log(error);
                                    alert("Page " + href + " cannot open. Error:" + error);
                                    $('#loader').hide();
                                },
                                timeout: 8000
                            })
                        });



                        $(document).on('click', '#mediumButton', function(event) {
                            event.preventDefault();
                            let href = $(this).attr('data-attr');
                            $.ajax({
                                url: href,
                                beforeSend: function() {
                                    $('#loader').show();
                                },
                                // return the result
                                success: function(result) {
                                    $('#mediumModal').modal("show");
                                    $('#mediumBody').html(result).show();
                                },
                                complete: function() {
                                    $('#loader').hide();
                                },
                                error: function(jqXHR, testStatus, error) {
                                    console.log(error);
                                    alert("Page " + href + " cannot open. Error:" + error);
                                    $('#loader').hide();
                                },
                                timeout: 8000
                            })
                        });
                    </script>
                @endsection
