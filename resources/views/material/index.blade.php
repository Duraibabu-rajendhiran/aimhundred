@extends('layouts.master')

@section('content')
    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0">
                            
                              <img width="30px" src="data:image/png;base64,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"/>
                       
                            Material</h1>
                    </div>
                    <div class="col-auto">
                        <div class="page-utilities">
                            <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                                <div class="col-auto">
                                    <style>
                                        input {
                                            text-transform: capitalize;
                                        }

                                        .cell {
                                            text-align: center;
                                        }

                                    </style>
                                </div>
                                <!--//col-->
                                
                                <button type="button" onMouseOver="this.style.color='#15A362'"
                                    onMouseOut="this.style.color='#676778'"
                                    style="border-radius:5px;padding:4px;background-color:white;border:1px solid #676778;;color:#676778; "
                                    class="col-auto" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    data-bs-whatever="@getbootstrap">Add material</button>


                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add material</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">

                                                <form action="{{ route('material.store') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label for="recipient-name" class="col-form-label">Board</label>
                                                        <select name="board_id" class="form-select" id="board" required>
                                                            <option value="">select Board</option>
                                                            @foreach ($board as $data)
                                                                <option value="{{ $data->id }}">{{ $data->title }}
                                                                </option>
                                                            @endforeach
                                                        </select>

                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="recipient-name" class="col-form-label">Medium</label>
                                                        <select name="medium_id" class="form-select" id="medium" required>
                                                            <option value="">select Medium</option>
                                                            @foreach ($medium as $data)
                                                                <option value="{{ $data->id }}">{{ $data->title }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="recipient-name" class="col-form-label">Class</label>
                                                        <select name="class_id" class="form-select" id="class" required>
                                                            <option value="">select Class</option>
                                                            @foreach ($class as $data)
                                                                <option value="{{ $data->id }}">{{ $data->title }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="recipient-name" class="col-form-label">Subject</label>
                                                        <select name="subject_id" class="form-select" id="subject" required>
                                                        
                                                       </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="recipient-name" class="col-form-label">lesson</label>
                                                        <select name="lesson_id" class="form-select" id="lesson" required>                                                          
                                                        </select>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="recipient-name" class="col-form-label">File Type</label>
                                                        <select name="file_type" class="form-select" id="mySelect" onchange="showDiv(this)"
                                                            required>
                                                            <option value="">Select File Type</option>
                                                            <option value="0">Pdf/Docment</option>
                                                            <option value="1">Video Url</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3" id="h1" style="display:none;">
                                                        <label for="recipient-name" class="col-form-label">Input Your
                                                            File</label>
                                                        <input type="file" name="file_name" class="form-control"
                                                            id="recipient-name" placeholder="Enter Video URL">
                                                    </div>
                                                    {{-- <h4 style="color:red;text-align:center;">[[OR]]</h4> --}}
                                                    <div class="mb-3" id="h2" style="display:none;">
                                                        <label for="recipient-name" class="col-form-label">Enter video URL</label>
                                                        <input type="text" style="text-transform: lowercase;" name="file_name1" class="form-control" placeholder="Enter Video URL">
                                                    </div>
                                                 </div>
                                            <div class="modal-footer">
                                                <a data-bs-dismiss="modal"
                                                aria-label="Close"
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
echo 'alert("'.$errors->first().'")';  
echo '</script>';  
?>  	
            @endif
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
                                                <th class="cell">Board</th>
                                                <th class="cell">Medium</th>
                                                <th class="cell">Class</th>
                                                <th class="cell">Subject</th>
                                                <th class="cell">Lesson</th>
                                                <th class="cell">File Type</th>
                                                <th class="cell">File Name</th>
                                                <th class="cell">Download</th>
                                                <th class="cell">Action</th>
                                            </tr>
                                        </thead>
<?php $i=0; ?>
                                        <tbody>
                                            @foreach ($user as $data)
                                                <tr>
                                                    <td class="cell">{{ ++$i }}</td>
                                                    <td class="cell"><span
                                                            class="truncate">{{ $data->board }}</span>
                                                    </td>
                                                    <td class="cell"><span
                                                            class="truncate">{{ $data->medium }}</span>
                                                    </td>
                                                    <td class="cell"><span
                                                            class="truncate">{{ $data->class }}</span>
                                                    </td>
                                                    <td class="cell"><span
                                                            class="truncate">{{ $data->subject }}</span>
                                                    </td>
                                                  
                                                
                                                    <td class="cell"><span
                                                            class="truncate">{{ $data->lesson }}</span>
                                                    </td>
                                                    <td class="cell"><span class="truncate">
                                                        <?php if ($data->file_type == 0) { ?>
                                                              Pdf
                                                        <?php } else { ?>
                                                              Video
                                                        <?php } ?>
                                                        </span>
                                                    </td>
                                                    <td class="cell"><span
                                                            class="truncate">{{ $data->file_name }}</span>
                                                    </td>
                                                    <?php if ($data->file_type == 0) { ?>
                                                   
                                                        <td>
                                                        
                                                         <a href="{{ url('/download', $data->file_name) }}"><i
                                                          class="fa fa-download fa-lg" aria-hidden="true"></i></a>
                                                    
                                                         </td>

                                                    <?php } else { ?>

                                                    <td><a href="{{ $data->file_name }}"><i
                                                                class="fab fa-youtube fa-lg"></i></a></td>
                                                    <?php } ?>
                                                    <td class="cell">
                                                        <a href="{{ route('material.edit', $data->id) }}"
                                                            class="btn btn-primary"><i class="fas fa-edit fa-1x"></i></a>
                                                        <form action="{{ route('material.destroy', $data->id) }}"
                                                            method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger"><i
                                                                    class="fas fa-trash"></i></button>
                                                    </td>
                                            </form>
                                            
                                                                                        @endforeach
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' type='text/javascript'></script>

                    <script>

                        function showDiv(select1) {
                            if (select1.value == "0") {
                                document.getElementById('h1').style.display = "inline";
                                document.getElementById('h2').style.display = "none";
                            } else if(select1.value == "1") {

                                document.getElementById('h1').style.display = "none";
                                document.getElementById('h2').style.display = "inline";
                             
                            }else{
                                document.getElementById('h1').style.display = "none";
                                document.getElementById('h2').style.display = "none";
                            }
                        }



                     
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
