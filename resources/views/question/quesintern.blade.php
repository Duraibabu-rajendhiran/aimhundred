@extends('layouts.master')
@section('content')

    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    </head>

    <body>
        <style>
            table {
                width: 100% !important;
            }
        </style>
        <div class="app-wrapper">
            <div class="app-content pt-3 p-md-3 p-lg-4">
                <div class="container-xl">
                    <div class="row g-3 mb-4 align-items-center justify-content-between">
                        <div class="col-auto">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            <?php if(!isset($academic)){ ?>
                            <h2>Exam Management</h2>
                            <form action="{{ route('getquestion') }}" method="POST">
                                @csrf
                                @method('POST')
                                <label for="medium">lesson:</label>
                                <select name="lesson" id="medium" class="form-control" required>
                                    <option value="">Select lesson</option>
                                    <?php   foreach($lesson as $data){
                                        if($data->subject_id == $subject ){ 
                                          ?>
                                    <option value="{{ $data->id }}"> {{ $data->title }}</option>
                                    <?php  } }  ?>
                                </select>
                                <input type="hidden" name="board" value="{{ $board }}">
                                <input type="hidden" name="subject" value="{{ $subject }}">
                                <input type="hidden" name="period" value="{{ $class_id}}">
                                <input type="hidden" name="medium" value="{{ $media }}">
                                <input type="hidden" name="category_id" value="{{ $category }}">
                                <input type="hidden" name="time" value="{{ $time }}">
                                <br>
                                <label for="">Set Date For Next 5Days</label><br>
                                <input type="date" name="date" required>
                                <button style="margin:5%;" type="submit" name="submit" class="btn btn-success">Next</button>
                            </form>
                        </div>
                        <?php } ?>
                        
                        <?php if(isset($academic)){ ?>
                        <form action="{{ route('question.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <h2>uploade Question</h2>
                            <label for="medium">academic Year:</label>
                            <select name="academic_id" id="medium" class="form-control" required>
                                <option value="">Select Academic</option>
                                <?php   foreach($academic as $data){ ?>
                                <option value="{{ $data->id }}"> {{ $data->title }}</option>
                                <?php
                                } ?>
                            </select>
                        
                            <label for="medium">lesson:</label>
                            <select name="lesson_id" id="medium" class="form-control" required>
                                <option value="">Select lesson</option>
                                <?php   foreach($lesson as $data){ ?>
                                <option value="{{ $data->id }}"> {{ $data->title }}</option>
                                <?php  } ?>
                            </select>
                           
                            <input type="hidden" name="board_id" value="{{ $board }}">
                            <input type="hidden" name="subject_id" value="{{ $subject }}">
                            <input type="hidden" name="class_id" value="{{ $class_id }}">
                            <input type="hidden" name="medium_id" value="{{ $media }}">
                            <div class="mb-3">

                             <label class="form-label" for="customFile">Input CSV</label>
                                <input type="file" name="file" class="form-control" id="customFile" />
                            </div>

                            <button style="margin:5%;" type="submit" name="submit" class="btn btn-success">Next</button>
                        </form>
                    </div>
                    <?php } ?>
                </div>
                <div class="col-auto">
                    <div class="page-utilities">
                        <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                            <style>
                                input {
                                    text-transform: capitalize;
                                }

                            </style>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        </div>
     
        </div>

        </div>
    @endsection
