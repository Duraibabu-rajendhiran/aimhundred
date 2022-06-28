@extends('layouts.master')
@section('content')
    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0">
                            <img width="30px"
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAABmJLR0QA/wD/AP+gvaeTAAABV0lEQVRoge2aMU7DQBBFHwjJQoAEEgVSGtqU3CJUkbgHNClyhtwpB0gkinQpaCA5AtDQJIXXiot4cWZ3vWNpnmS5sHb0n72etWyD0T8K4BVYAD/ALvMmYgCsFIQPEilqEmtgDNxICkVCLPLGQeI2ZiIhYpGlGziOGkeOWOTbDcw5neqIRYK6RAK8ec6FRUfAlvAOdGzbuPrR8J2BTSKJuswpecQiKaddU+0kU0sdJqINqcjW7VM9S1X1o+C7uUak61xN7dcWxF5hItowEW2YiDZMRBsmog0T0YaJaMNEtGEi2mgjcg1MgXfgl7SvSv97u9LImedYNfgTeGwh3BW+zEepn40F8AzcRw7VCZXEHLjInCWISmSYO0gof5QiRe4gbfB1rS+3f+oiSEpmlFdkBVxmzhLEHYfvhGvgBXjImiiAIfBBvkXw5IXRxxUwofyBoLc/1Rhdswc810cdKdAPjgAAAABJRU5ErkJggg==" />
                            Subject
                        </h1>
                    </div>
                    <style>
                        input {
                            text-transform: capitalize;
                        }
                    </style>
                    <div class="col-auto">
                        <div class="page-utilities">
                            <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                                <button type="button" onMouseOver="this.style.color='#15A362'"
                                    onMouseOut="this.style.color='#676778'"
                                    style="border-radius:5px;padding:4px;background-color:white;border:1px solid #676778;;color:#676778; "
                                    class="col-auto" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    data-bs-whatever="@getbootstrap"><i class="fa fa-plus" aria-hidden="true"></i>
                                    AddSubject</button>
                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add subject</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('subject.store') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <?php
                                                    if(isset($_GET["board"])){
                                                $boardname = DB::table('boards')
                                            ->where('boards.id',$_GET["board"])
                                            ->first();
                                                $classname = DB::table('periods')
                                            ->where('periods.id',$_GET["class"])
                                            ->first();
                                            
                                                $mediumname = DB::table('media')
                                            ->where('media.id',$_GET["medium"])
                                            ->first();
                                            ?>
                                                    <h4><?php echo $boardname->title; ?></h4>
                                                    <h4><?php echo $classname->title; ?></h4>
                                                  
                                                    <h4><?php echo $mediumname->title; ?>
                                                        <button class="btn btn-danger" onclick="resetdiv()"> Reset</button>
                                                    </h4>
                                                    <?php } ?>
                                                    <div id="displaycheck" style="display:<?php echo isset($_GET['board']) ? 'none' : 'block'; ?>">
                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">Board</label>
                                                            <select name="board_id" class="form-select" id="" required>
                                                                @foreach ($board as $data)
                                                                <?php if(isset($_GET["board"])){
                                                                    if( $_GET["board"] == $data->id){
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
                                                            <input type="hidden" name="is_delete" value="0"
                                                                class="form-control" id="recipient-name" required>
                                                            <select name="class_id" class="form-select" id="" required>
                                                                @foreach ($class as $data)
                                                                <?php if(isset($_GET["board"])){
                                                                    if( $_GET["class"] == $data->id){
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
                                                                class="col-form-label">Medium</label>
                                                            <select name="medium_id" class="form-select" id="" required>
                                                                @foreach ($medium as $data)
                                                                <?php if(isset($_GET["board"])){
                                                                    if( $_GET["medium"] == $data->id){
                                                                    ?>
                                                                   <option value="{{ $data->id }}" selected>{{ $data->title }}</option>
                                        
                                                                <?php } } ?>
                                                                    <option value="{{ $data->id }}">
                                                                        {{ $data->title }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="recipient-name" class="col-form-label">Subject</label>
                                                        <input type="text" name="subject" class="form-control"
                                                            placeholder="Enter Subject Name" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="recipient-name" class="col-form-label">Subject
                                                            image</label>
                                                        <select name="subject_image" class="form-select" id="">
                                                            @foreach ($book as $item)
                                                                <option value="{{ $item->book_image }}">
                                                                    {{ $item->book_title }}</option>
                                                            @endforeach
                                                        </select>
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
                <form action="{{ route('searchsub') }}" method="GET">
                    @csrf
                    @method('GET')
                    <?php	if(empty(session('SchoolId'))){ ?>
                    <select name="board" id="bo" class="form-select" onchange='saveValue(this)' ;
                        style="width:100px;display:inline-block;text-transform:capitalize;" required>
                        <option value="">Board</option>
                        @foreach ($board as $data)
                   
                            <option value="{{ $data->id }}">{{ $data->title }}</option>
                        @endforeach
                    </select>
                    <select name="medium" id="med" class="form-control" onchange='saveValue(this)' ;
                        style="width:100px;display:inline-block;text-transform:capitalize;" required>
                        <option value="">Medium</option>
                        @foreach ($medium as $data)
                     
                            <option value="{{ $data->id }}">{{ $data->title }}</option>
                        @endforeach
                    </select>
                    <?php } ?>
                    <select name="class" id="cl" class="form-control" onchange='saveValue(this)' ;
                        style="width:100px;display:inline-block;text-transform:capitalize;" required>
                        <option value="">class</option>
                        @foreach ($class as $data)
                            <option value="{{ $data->id }}">{{ $data->title }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-search"></i></button>
                </form>
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
                                    <p></p>
                                    <p></p>
                                    <table class="table app-table-hover mb-0 text-left">
                                        <thead>
                                            <tr>
                                                <th class="cell">Id</th>
                                                <th class="cell">subject</th>
                                                <th class="cell">Board</th>
                                                <th class="cell">Class</th>
                                                <th class="cell">Medium</th>
                                                <th class="cell">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0;
                                            if (isset($search)) {
                                                $user = $search;
                                            } else {
                                                $user = $user;
                                            }
                                            ?>
                                            @foreach ($user as $data)
                                                <tr>
                                                    <td class="cell">{{ ++$i }}</td>
                                                    <td class="cell">{{ $data->subject }}</td>
                                                    <td class="cell">{{ $data->board }}</td>
                                                    <td class="cell">{{ $data->class }}</td>
                                                    <td class="cell">{{ $data->medium }}</td>
                                                    <td class="cell">
                                                        <a href="{{ route('subject.edit', $data->id) }}"
                                                            class="btn btn-primary"><i class="fas fa-edit fa-1x"></i></a>
                                                        <form action="deletesubject/{{ $data->id }}" method="POST"
                                                            style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                onclick="return confirm(' you want to delete?');"
                                                                class="btn btn-danger"><i
                                                                    class="fas fa-trash fa-1x"></i></button>
                                                    </td>
                                                    </form>
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
                    @if ($errors->any())
                        <?php
                        echo '<script type ="text/JavaScript">';
                        echo 'alert("' . $errors->first() . '")';
                        echo '</script>';
                        ?>
                    @endif
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' type='text/javascript'></script>
                    <script>
                        document.getElementById("bo").value = getSavedValue("bo"); // set the value to this input
                        document.getElementById("cl").value = getSavedValue("cl"); // set the value to this input
                        document.getElementById("med").value = getSavedValue("med"); // set the value 
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
                            if(document.getElementById('displaycheck').style.display == "none"){
                            document.getElementById('displaycheck').style.display = "block";
                        }else{
                                document.getElementById('displaycheck').style.display = "none";

                            }
                        }
                    </script>
                @endsection
