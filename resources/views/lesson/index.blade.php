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
                            lesson
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
                                    lesson</button>
                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add Lesson</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('lesson.store') }}" method="POST">
                                                    @csrf
                                                    <?php
                                                    if(isset($_GET["board"])){
                                                $boardname = DB::table('boards')
                                            ->where('boards.id',$_GET["board"])
                                            ->first();
                                                $classname = DB::table('periods')
                                            ->where('periods.id',$_GET["class"])
                                            ->first();
                                                $subjectname = DB::table('subjects')
                                            ->where('subjects.id',$_GET["subject_id"])
                                            ->first();
                                                $mediumname = DB::table('media')
                                            ->where('media.id',$_GET["medium"])
                                            ->first();
                                            
                                            ?>
                                                    <h4><?php echo $boardname->title; ?></h4>
                                                    <h4><?php echo $classname->title; ?></h4>
                                                    <h4><?php echo $subjectname->subject; ?></h4>
                                                    <input type="hidden" name="subject_id" value="{{$subjectname->id}}">
                                                    <h4><?php echo $mediumname->title; ?>
                                                        <button class="btn btn-danger" onclick="resetdiv()"> Reset</button>
                                                    </h4>
                                                    <?php } ?>
                                                    <div id="displaycheck" style="display:<?php echo isset($_GET['board']) ? 'none' : 'block'; ?>">
                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">Board</label>
                                                            <select name="board_id" id="board" class="form-select"
                                                                onchange='saveValue(this)' ; required>
                                                                @foreach ($board as $data)
                                                                
                                                                    <option value="{{ $data->id }}">{{ $data->title }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="recipient-name"
                                                                class="col-form-label">medium</label>
                                                            <select name="medium_id" class="form-select" id="medium"
                                                                onchange='saveValue(this)' ; required>
                                                                @foreach ($medium as $data)
                                                                
                                                                    <option value="{{ $data->id }}">{{ $data->title }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">Class</label>
                                                            <select name="class_id" class="form-select" id="class"
                                                                onchange='saveValue(this)' ; required>
                                                                @foreach ($class as $data)
                                                              
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
                                                        <label for="recipient-name" class="col-form-label">Lesson</label>
                                                        <input type="text" name="title" class="form-control"
                                                            id="recipient-name" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <input type="hidden" name="is_delete" value="0"
                                                            class="form-control" id="recipient-name" required>
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
                <?php    if(isset($_GET["board"])){  ?>
                <div style="display:flex;justify-content:space-around;">
                    <h4><?php echo $boardname->title; ?></h4>
                    <h4><?php echo $classname->title; ?></h4>
                    <h4><?php echo $subjectname->subject; ?></h4>
                    <h4><?php echo $mediumname->title; ?>
                        <button class="btn btn-danger" onclick="resetdiv()"> Reset</button>
                    </h4>
                </div>
                <?php  }  ?>


                <div id="displaycheck1" style="display:<?php echo isset($_GET['board']) ? 'none' : 'block'; ?>">
                    <form action="{{ route('searchlession') }}" method="GET">
                        @csrf
                        @method('GET')
                        <?php	if(empty(session('SchoolId'))){ ?>
                        <select class="form-select" name="board" id="board1" onchange='saveValue(this)'
                            ;aria-label="Default select example"
                            style="width:100px;display:inline-block;text-transform:capitalize;">
                            <option value="">Board</option>
                            @foreach ($board as $data)
                                <option value="{{ $data->id }}">{{ $data->title }}</option>
                            @endforeach
                        </select>
                        <select class="form-select" name="medium" id="medium1" onchange='saveValue(this)' ;
                            aria-label="Default select example"
                            style="width:100px;display:inline-block;text-transform:capitalize;">
                            <option value="">Medium</option>
                            @foreach ($medium as $data)
                                <option value="{{ $data->id }}">{{ $data->title }}</option>
                            @endforeach
                        </select>
                        <?php } ?>
                        <select class="form-select" name="class" onchange='saveValue(this)' ; id="class1"
                            aria-label="Default select example"
                            style="width:100px;display:inline-block;text-transform:capitalize;">
                            <option value="">class</option>
                            @foreach ($class as $data)
                                <option value="{{ $data->id }}">{{ $data->title }}</option>
                            @endforeach
                        </select>
                        <select name="subject_id" class="form-select" id="subject1" onchange='saveValue(this)' ;
                            aria-label="Default select example"
                            style="width:100px;display:inline-block;text-transform:capitalize;">
                        </select>

                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i></button>

                        </form> 
                    </div>
                    
                    
                    <?php $i = 0; ?>
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
                                                <th class="cell">medium</th>
                                                <th class="cell">class</th>
                                                <th class="cell">subject</th>
                                                <th class="cell">lesson</th>
                                                <th class="cell">Action</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        if (isset($search)) {
                                            $user = $search;
                                        } else {
                                            $user = $user;
                                        }
                                        ?>
                                        <tbody>
                                            @foreach ($user as $data)
                                                <tr>
                                                    <td class="cell">{{ ++$i }}</td>
                                                    <td class="cell">{{ $data->board }}</td>
                                                    <td class="cell">{{ $data->medium }}</td>
                                                    <td class="cell">{{ $data->class }}</td>
                                                    <td class="cell">{{ $data->subject }}</td>
                                                    <td class="cell">{{ $data->title }}</td>
                                                    <td class="cell">
                                                        <a href="{{ route('lesson.edit', $data->id) }}"
                                                            class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                        <form action="{{ route('lesson.destroy', $data->id) }}"
                                                            method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                onclick="return confirm(' you want to delete?');"
                                                                class="btn btn-danger"><i
                                                                    class="fas fa-trash"></i></button>
                                                        </form>
                                                    </td>
                                            @endforeach
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
if(!isset($search)){
?>
                    {!! $user->links() !!}
                    <?php
}
?>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
                    <script>
                        document.getElementById("class1").value = getSavedValue("class1"); // set the value to this
                        document.getElementById("board1").value = getSavedValue("board1"); // set the value to this 
                        document.getElementById("medium1").value = getSavedValue("medium1"); // set the value 
                        document.getElementById("subject1").value = getSavedValue("subject1"); // set the value 
                        document.getElementById("class").value = getSavedValue("class1"); // set the value to this
                        document.getElementById("board").value = getSavedValue("board1"); // set the value to this 
                        document.getElementById("medium").value = getSavedValue("medium1"); // set the value 
                        document.getElementById("subject").value = getSavedValue("subject1"); // set the value 
                        function saveValue(e) {
                            var id = e.id; // get the sender's id to save it . 
                            var val = e.value; // get the value. 
                            localStorage.setItem(id, val); // Every time user writing something, the localStorage's value will override . 
                        }
                        //get the saved value function - return the value of "v" from localStorage. 
                        function getSavedValue(v) {
                            if (!localStorage.getItem(v)) {
                                return ""; // You can change this to your defualt value. 
                            }
                            return localStorage.getItem(v);
                        }
                        function resetdiv() {
                            if (document.getElementById('displaycheck').style.display == "none") {
                                document.getElementById('displaycheck').style.display = "block";
                                document.getElementById('displaycheck1').style.display = "block";
                            } else {
                                document.getElementById('displaycheck').style.display = "none";
                                document.getElementById('displaycheck1').style.display = "none";
                            }
                        }
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
                                                $("#subject1").append('<option value="' + key + '">' + value +
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
