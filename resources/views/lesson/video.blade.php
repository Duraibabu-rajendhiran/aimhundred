@extends('layouts.master')

@section('content')
    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0">
                            <img width="30px"
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAABmJLR0QA/wD/AP+gvaeTAAACoUlEQVRoge2Zv2sUQRTHPxc1RCJWxiABtRItJIiCBCwULaKJYmOp6Wz8AwxJk8JC0mjsUmoltokKhnSRFNokmIDYaCKKgkZFMSTmYvHektlj725nd2YzB/eFZWHmvfm+787b+QlNNNFEVvQCy8Cm52dJubxhqQARphhviEh8wwlPi4NAgkBIQoaBE0DJdcNFp1b0fAEeAdeAvS4JfCPiGQc+Ehf1F3gO3AIO5yXwDZOnhKTXMDALbBAX9ga4C5zOSuATtXg6gAHgCfCDuKgRFwQukZZnF3AOuKf231wT5IUtT4/avzULQxp+0+Kyvp+mdQi1R+bV/rwvAoAjGfxs7A+q7U+g1axwmVp7gDGH7SWhX98vgLW0TjZfahL4Tnx49MHzTG0HLNq3IkhamrvmaUdm+g1gv0X7mX92X0Kuqt3LpMpGGn779D1p6xhSj5TYWlAe9x1QVr809qfU5kM1g0ZJrWjYncjiHFKPvFabixniCUbIAaAM/Abaqhk1Qmr1Iz/7FLBazahRhIDFarcSIax+25CUKgNdPghcohbPJa17Va+R0FMrSivr2dxECD3yXutO+iJwiWo83Vr+iRSnjyGnlplWuT7odvfIrJZf8UXgGkk8HcgGahXZQtdFqKnVh8Q2jcwjdVFLyLK+k7axLh+TyxQCOWZzE70Uc/1WeYfYihz3bAKHXAhJQjty0jcOfK4I6A+yX7hJjuUEcEHbm8sVqQVakIlqBNkvlIkLW0CuAM5gdwt1X/3vuAzWBp3ADeQK4BdxUV9Jfwv1Tn16vEVqgd1Iiowh+2xT1DowA9wGjlb4HWNL+I6igrVBNzCEnEn9Iy5sERgFzgKDWvZwe8K0wz7gOvAYWCF5JMs9mxeNnUhPjCKDwwrwAA9X1E0Ujf+HL1vpX4px4QAAAABJRU5ErkJggg==" />

                            Add Video
                        </h1>
                    </div>
                    <div class="col-auto">
                        <div class="page-utilities">
                            <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                                <div class="col-auto">

                                    <style>
                                        input {
                                            text-transform: capitalize;
                                        }
                                    </style>
                                </div>
                                <button type="button" onMouseOver="this.style.color='#15A362'"
                                    onMouseOut="this.style.color='#676778'"
                                    style="border-radius:5px;padding:4px;background-color:white;border:1px solid #676778;;color:#676778; "
                                    class="col-auto" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    data-bs-whatever="@getbootstrap"><i class="fa fa-plus" aria-hidden="true"></i> Add
                                    Video</button>
                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add video</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                  
                                            <div class="modal-body">

                                             
                                                <form action="{{ route('videocreate') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                   
                                                    <?php
                                                    if(isset($_GET["board_id"])){
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
                                            <div id="theInput" style="display: block;">
                                                    <h4><?php echo $boardname->title; ?></h4>
                                                    <h4><?php echo $classname->title; ?></h4>
                                                    <h4><?php echo $subjectname->subject; ?></h4>
                                                    <h4>
                                                        <span><?php echo $mediumname->title; ?></span>    </h4>
                                                    <input type="hidden" name="subject_id" value="{{$subjectname->id}}">
                                                    <input type="hidden" name="board_id" value="{{$boardname->id}}">
                                                    <input type="hidden" name="medium_id" value="{{$mediumname->id}}">
                                                    <input type="hidden" name="class_id" value="{{$classname->id}}">
                                                </div>
                                            
                                                        <div class="btn btn-danger" onclick="resetdiv()"> Reset</div>
                                                 
                                                    <?php } ?>
                                                    <div id="displaycheck1" style="display:<?php echo isset($_GET['board_id']) ? 'none' : 'block'; ?>">
                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">Board</label>
                                                            <select name="board_id" id="board" class="form-select"
                                                                onchange='saveValue(this)' ; >
                                                                @foreach ($board as $data)
                                                                <?php if(isset($_GET["board_id"]) ){
                                                                    if($data->id == $_GET["board_id"]){
                                                                    ?>
                                                                   <option value="{{ $data->id }}" selected>{{ $data->title }}</option>
                                        
                                                                <?php } } ?>
                                                                
                                                                    <option value="{{ $data->id }}">{{ $data->title }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="recipient-name"
                                                                class="col-form-label">medium</label>
                                                            <select name="medium_id" class="form-select" id="medium"
                                                                onchange='saveValue(this)' ; >
                                                                @foreach ($medium as $data)
                                                                <?php if(isset($_GET["medium_id"]) ){
                                                                    if( $_GET["medium_id"] == $data->id){
                                                                    ?>
                                                                   <option value="{{ $data->id }}" selected>{{ $data->title }}</option>
                                        
                                                                <?php } } ?>
                                                                    <option value="{{ $data->id }}">{{ $data->title }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">Class</label>
                                                            <select name="class_id" class="form-select" id="class"
                                                                onchange='saveValue(this)' ; >
                                                                @foreach ($class as $data)
                                                                <?php if(isset($_GET["class_id"])){
                                                                    if( $_GET["class_id"] == $data->id){
                                                                    ?>
                                                                   <option value="{{ $data->id }}" selected>{{ $data->title }}</option>
                                        
                                                                <?php } } ?>
                                                              
                                                                    <option value="{{ $data->id }}">
                                                                        {{ $data->title }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="recipient-name"
                                                                class="col-form-label">Subject</label>
                                                            <select name="subject_id" class="form-select" id="subject"
                                                                onchange='saveValue(this)'; >
                                                            </select>
                                                        </div>


                                                    </div>
                                               
                                               
                                                    <div class="mb-3">
                                                        <label for="recipient-name" class="col-form-label">Heading</label>
                                                        <input name="heading"  class="form-control" />
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="recipient-name" class="col-form-label">description</label>
                                                        <textarea name="descc" id="" class="form-control" cols="30" rows="10"></textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="recipient-name" class="col-form-label">Video</label>
                                                        <input type="file" name="video" class="form-control">
                                                    </div>
                                            </div>

                                            <div class="modal-footer">
                                                <a data-bs-dismiss="modal" aria-label="Close"
                                                    class="btn btn-secondary">Close</a>
                                                <button type="submit" name="submit" class="btn btn-primary">Save</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                @if ($errors->any())
                    <?php
                    echo '<script type ="text/JavaScript">';
                    echo 'alert("' . $errors->first() . '")';
                    echo '</script>';
                    ?>
                @endif




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
                        <form action={{ route('searchvideo') }} method="GET">
                            @csrf
                            <?php if (empty(session('SchoolId'))) { ?>
                            <select class="form-select" name="board_id" aria-label="Default select example"
                                style="width:100px;display:inline-block;text-transform:capitalize;" ;
                                id="board2">
                                <option value="">Board</option>
                                @foreach ($board as $data)
                                    <option value="{{ $data->id }}">{{ $data->title }}</option>
                                @endforeach
                            </select>
                            <?php } ?>
                            <select class="form-select" name="medium_id" id="medium2" ;
                                aria-label="Default select example"
                                style="width:100px;display:inline-block;text-transform:capitalize;">
                                <option value="">Medium</option>
                                @foreach ($medium as $data)
                                    <option value="{{ $data->id }}">{{ $data->title }}</option>
                                @endforeach
                            </select>
                            <?php if (!empty(session('SchoolId'))) { ?>
                            <input type="hidden" value="{{ $boardif->board_id }}" id="board2">
                            <?php } ?>
                            <select class="form-select" ; name="class_id" id="class2"
                                aria-label="Default select example"
                                style="width:100px;display:inline-block;text-transform:capitalize;">
                                <option value="">class</option>
                                @foreach ($class as $data)
                                    <option value="{{ $data->id }}">{{ $data->title }}</option>
                                @endforeach
                            </select>
                            <select class="form-select" name="subject_id" ; id="subject2"
                                aria-label="Default select example"
                                style="width:100px;display:inline-block;text-transform:capitalize;">
                            </select>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-search"></i></button>
                        </form>
                    </div>
                            
                <?php $i = 0; ?>
          
                <p></p>
                <p></p>
                <p></p>

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
                                    <table class="table app-table-hover mb-0 text-left">
                                        <thead>
                                            <tr>
                                                <th class="cell">Id</th>
                                                <th class="cell">board</th>
                                                <th class="cell">heading</th>
                                                <th class="cell">class</th>
                                                <th class="cell">medium</th>
                                                <th class="cell">Subject</th>
                                                <th class="cell">descc</th>
                                                <th class="cell">video</th>
                                                <th class="cell">Action</th>
                                            </tr>
                                        </thead>
                                        
                                        <?php
                                        if (isset($search)) {
                                            $video = $search;
                                        } else {
                                            $video = $video;
                                        }
                                        
                                        ?>
                                        <tbody>
                                            @foreach ($video as $data)
                                                <tr>
                                                    <td class="cell">{{ ++$i }}</td>
                                                    <td class="cell">{{ $data->board }}</td>
                                                    <td class="cell">{{ $data->heading }}</td>
                                                    <td class="cell">{{ $data->class }}</td>
                                                    <td class="cell">{{ $data->medium }}</td>
                                                    <td class="cell">{{ $data->subject }}</td>
                                                    <td class="cell">{{ $data->descc }}</td>
                                                    <td class="cell">video File</td>
<td class="cell">
                                                        <a href="{{ route('videoedit', $data->id) }}"
                                                            class="btn btn-primary"><i class="fas fa-edit"></i></a>




                                                            <a href="{{ route('videodelete', $data->id) }}"
                                                            class="btn btn-danger"><i class="fas fa-trash"></i></a>    
                                                  
                                                    </td>                                                    
                                            @endforeach

                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                                <!--//table-responsive-->

                            </div>
                            <!--//app-card-body-->
                        </div>
                        <!--//app-card-->
                    </div>


                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' type='text/javascript'></script>
                    <script>


function resetdiv() {
                            if(document.getElementById('displaycheck').style.display == "none"){
                            document.getElementById('displaycheck').style.display = "block";
                            document.getElementById('displaycheck1').style.display = "block";
                            document.getElementById('theInput').style.display = "none";
                        }else{
                                document.getElementById('displaycheck').style.display = "none";
                                document.getElementById('displaycheck1').style.display = "none";
                                document.getElementById('theInput').style.display = "block";

                            }
                        }


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
                    </script>
                @endsection
