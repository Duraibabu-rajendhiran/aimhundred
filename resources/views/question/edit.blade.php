@extends('layouts.master')
@section('content')
    <script src="https://cdn.ckeditor.com/4.16.2/standard-all/ckeditor.js"></script>
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
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <form action="{{ route('question.update', $question->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">

                <h4 style="text-align:center;">Edit question Data</h4>
                <?php
                $s_char = substr($question->title, -1);
                
                ?>

            </div>
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Question Name</label>
                <?php
                if($s_char == ">"){
?>
                <textarea cols="20" id="editor1" name="title" data-sample-short> {{ $question->title }} </textarea>
                <?php
                }else{
                    ?>
                <input type="text" class="form-control" name="title" value="{{ $question->title }}">
                <?php
                }
         ?>






                <script>
                    CKEDITOR.plugins.addExternal('ckeditor_wiris', 'https://www.wiris.net/demo/plugins/ckeditor/', 'plugin.js');


                    var mathElements = [
                        'math',
                        'maction',
                        'maligngroup',
                        'malignmark',
                        'menclose',
                        'merror',
                        'mfenced',
                        'mfrac',
                        'mglyph',
                        'mi',
                        'mlabeledtr',
                        'mlongdiv',
                        'mmultiscripts',
                        'mn',
                        'mo',
                        'mover',
                        'mpadded',
                        'mphantom',
                        'mroot',
                        'mrow',
                        'ms',
                        'mscarries',
                        'mscarry',
                        'msgroup',
                        'msline',
                        'mspace',
                        'msqrt',
                        'msrow',
                        'mstack',
                        'mstyle',
                        'msub',
                        'msup',
                        'msubsup',
                        'mtable',
                        'mtd',
                        'mtext',
                        'mtr',
                        'munder',
                        'munderover',
                        'semantics',
                        'annotation',
                        'annotation-xml',
                        'mprescripts',
                        'none'
                    ];

                    CKEDITOR.replace('editor1', {
                        extraPlugins: 'ckeditor_wiris',
                        athJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-AMS_HTML',
                        height: 120,
                        removePlugins: 'filetools,uploadimage,uploadwidget,uploadfile,filebrowser,easyimage',
                        height: 120,
                        // Update the ACF configuration with MathML syntax.
                        extraAllowedContent: mathElements.join(' ') +
                            '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
                    });
                </script>

            </div>


<?php   
echo $question->option_1;

?>

            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Option1</label>
            
                <?php


                $s_char = substr($question->option_1, -1);

                if($s_char == ">"){
?>
            
            <textarea cols="20" id="editor2" name="option_1" data-sample-short> {{ $question->option_1 }} </textarea>
           
                <?php
                }else{
                    ?>
                <input type="text" class="form-control"  name="option_1"  value="{{ $question->option_1 }}">
                <?php
                }
         ?>
           <script>
                    CKEDITOR.plugins.addExternal('ckeditor_wiris', 'https://www.wiris.net/demo/plugins/ckeditor/', 'plugin.js');


                    var mathElements = [
                        'math',
                        'maction',
                        'maligngroup',
                        'malignmark',
                        'menclose',
                        'merror',
                        'mfenced',
                        'mfrac',
                        'mglyph',
                        'mi',
                        'mlabeledtr',
                        'mlongdiv',
                        'mmultiscripts',
                        'mn',
                        'mo',
                        'mover',
                        'mpadded',
                        'mphantom',
                        'mroot',
                        'mrow',
                        'ms',
                        'mscarries',
                        'mscarry',
                        'msgroup',
                        'msline',
                        'mspace',
                        'msqrt',
                        'msrow',
                        'mstack',
                        'mstyle',
                        'msub',
                        'msup',
                        'msubsup',
                        'mtable',
                        'mtd',
                        'mtext',
                        'mtr',
                        'munder',
                        'munderover',
                        'semantics',
                        'annotation',
                        'annotation-xml',
                        'mprescripts',
                        'none'
                    ];

                    CKEDITOR.replace('editor2', {
                        extraPlugins: 'ckeditor_wiris',
                        athJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-AMS_HTML',
                        height: 120,
                        removePlugins: 'filetools,uploadimage,uploadwidget,uploadfile,filebrowser,easyimage',
                        height: 120,
                        // Update the ACF configuration with MathML syntax.
                        extraAllowedContent: mathElements.join(' ') +
                            '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
                    });
                </script>

            </div>

            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Option2</label>


             
                <?php
                if($s_char == ">"){
?>
            
            <textarea cols="20" id="editor3" name="option_2" data-sample-short> {{ $question->option_2 }} </textarea>

                <?php
                }else{
                    ?>
                <input type="text" class="form-control"  name="option_2"  value="{{ $question->option_2 }}">
                <?php
                }
                 ?>




                <script>
                    CKEDITOR.plugins.addExternal('ckeditor_wiris', 'https://www.wiris.net/demo/plugins/ckeditor/', 'plugin.js');


                    var mathElements = [
                        'math',
                        'maction',
                        'maligngroup',
                        'malignmark',
                        'menclose',
                        'merror',
                        'mfenced',
                        'mfrac',
                        'mglyph',
                        'mi',
                        'mlabeledtr',
                        'mlongdiv',
                        'mmultiscripts',
                        'mn',
                        'mo',
                        'mover',
                        'mpadded',
                        'mphantom',
                        'mroot',
                        'mrow',
                        'ms',
                        'mscarries',
                        'mscarry',
                        'msgroup',
                        'msline',
                        'mspace',
                        'msqrt',
                        'msrow',
                        'mstack',
                        'mstyle',
                        'msub',
                        'msup',
                        'msubsup',
                        'mtable',
                        'mtd',
                        'mtext',
                        'mtr',
                        'munder',
                        'munderover',
                        'semantics',
                        'annotation',
                        'annotation-xml',
                        'mprescripts',
                        'none'
                    ];

                    CKEDITOR.replace('editor3', {
                        extraPlugins: 'ckeditor_wiris',
                        athJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-AMS_HTML',
                        height: 120,
                        removePlugins: 'filetools,uploadimage,uploadwidget,uploadfile,filebrowser,easyimage',
                        height: 120,
                        // Update the ACF configuration with MathML syntax.
                        extraAllowedContent: mathElements.join(' ') +
                            '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
                    });
                </script>

            </div>
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Option3</label>
            

                <?php
                if($s_char == ">"){
?>
            
            <textarea cols="20" id="editor4" name="option_3" data-sample-short> {{ $question->option_3 }} 
            </textarea>
                <?php
                }else{
                    ?>
                <input type="text" class="form-control"  name="option_3"  value="{{ $question->option_3}}">
                <?php
                }
                 ?>




                <script>
                    CKEDITOR.plugins.addExternal('ckeditor_wiris', 'https://www.wiris.net/demo/plugins/ckeditor/', 'plugin.js');


                    var mathElements = [
                        'math',
                        'maction',
                        'maligngroup',
                        'malignmark',
                        'menclose',
                        'merror',
                        'mfenced',
                        'mfrac',
                        'mglyph',
                        'mi',
                        'mlabeledtr',
                        'mlongdiv',
                        'mmultiscripts',
                        'mn',
                        'mo',
                        'mover',
                        'mpadded',
                        'mphantom',
                        'mroot',
                        'mrow',
                        'ms',
                        'mscarries',
                        'mscarry',
                        'msgroup',
                        'msline',
                        'mspace',
                        'msqrt',
                        'msrow',
                        'mstack',
                        'mstyle',
                        'msub',
                        'msup',
                        'msubsup',
                        'mtable',
                        'mtd',
                        'mtext',
                        'mtr',
                        'munder',
                        'munderover',
                        'semantics',
                        'annotation',
                        'annotation-xml',
                        'mprescripts',
                        'none'
                    ];

                    CKEDITOR.replace('editor4', {
                        extraPlugins: 'ckeditor_wiris',
                        athJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-AMS_HTML',
                        height: 120,
                        removePlugins: 'filetools,uploadimage,uploadwidget,uploadfile,filebrowser,easyimage',
                        height: 120,
                        // Update the ACF configuration with MathML syntax.
                        extraAllowedContent: mathElements.join(' ') +
                            '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
                    });
                </script>

            </div>

            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Option4</label>


        


                <?php
                if($s_char == ">"){
?>
            
            <textarea cols="20" id="editor5" name="option_4" data-sample-short> {{ $question->option_4 }} </textarea>


                <?php
                }else{
                    ?>
                <input type="text" class="form-control"  name="option_4"  value="{{ $question->option_4}}">
                <?php
                }
                 ?>
                <script>
                    CKEDITOR.plugins.addExternal('ckeditor_wiris', 'https://www.wiris.net/demo/plugins/ckeditor/', 'plugin.js');


                    var mathElements = [
                        'math',
                        'maction',
                        'maligngroup',
                        'malignmark',
                        'menclose',
                        'merror',
                        'mfenced',
                        'mfrac',
                        'mglyph',
                        'mi',
                        'mlabeledtr',
                        'mlongdiv',
                        'mmultiscripts',
                        'mn',
                        'mo',
                        'mover',
                        'mpadded',
                        'mphantom',
                        'mroot',
                        'mrow',
                        'ms',
                        'mscarries',
                        'mscarry',
                        'msgroup',
                        'msline',
                        'mspace',
                        'msqrt',
                        'msrow',
                        'mstack',
                        'mstyle',
                        'msub',
                        'msup',
                        'msubsup',
                        'mtable',
                        'mtd',
                        'mtext',
                        'mtr',
                        'munder',
                        'munderover',
                        'semantics',
                        'annotation',
                        'annotation-xml',
                        'mprescripts',
                        'none'
                    ];

                    CKEDITOR.replace('editor5', {
                        extraPlugins: 'ckeditor_wiris',
                        athJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-AMS_HTML',
                        height: 120,
                        removePlugins: 'filetools,uploadimage,uploadwidget,uploadfile,filebrowser,easyimage',
                        height: 120,
                        // Update the ACF configuration with MathML syntax.
                        extraAllowedContent: mathElements.join(' ') +
                            '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
                    });
                </script>
            </div>
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Select Answer</label>
                <select name="answer" class="form-select" id="">
                    <option value="{{ $question->answer }}"><?php echo $question->answer; ?></option>
                    <option value="1">Option 1 </option>
                    <option value="2">Option 2</option>
                    <option value="3">option 3</option>
                    <option value="4">option 4</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Board</label>
                <select name="board_id" class="form-select" id="board">
                    <option value="{{ $question->board_id }}">{{ $question->board }}</option>
                    @foreach ($board as $data)
                        <option value="{{ $data->id }}">{{ $data->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Medium</label>
                <select name="medium_id" class="form-select" id="medium">
                    <option value="{{ $question->medium_id }}">{{ $question->medium }}</option>
                    @foreach ($medium as $data)
                        <option value="{{ $data->id }}">{{ $data->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Class</label>
                <select name="class_id" class="form-select" id="class">
                    <option value="{{ $question->class_id }}">{{ $question->class }}</option>
                    @foreach ($class as $data)
                        <option value="{{ $data->id }}">{{ $data->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Subject</label>
                <select name="subject_id" class="form-select" id="subject">
                    <option value="{{ $question->subject_id }}">{{ $question->subject }}</option>

                </select>
            </div>
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">lesson</label>
                <select name="lesson_id" class="form-select" id="lesson">
                    <option value="{{ $question->lesson_id }}">{{ $question->lesson }}</option>

                </select>
            </div>
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Acedemic</label>
                <select name="academic_id" class="form-select" id="" required>
                  
                    @foreach ($academic as $data)
                   <?php if($question->academic_id ==  $data->id ){ ?>
                    <option value="{{ $data->id }}">{{ $data->title }}</option>

                    <?php } ?>
                @endforeach

                    @foreach ($academic as $data)
                        <option value="{{ $data->id }}">{{ $data->title }}</option>
                    @endforeach
                </select>
            </div>




            <a href="{{ URL::asset('questions') }}/{{ $question->question_image }}">
                <img src="{{ URL::asset('questions') }}/{{ $question->question_image }}" width="40px" alt=""></a>
            <label class="form-label" for="customFile">Question Image</label>
            <input type="file" name="question_image" value="{{ $question->question_image }}" class="form-control"
                id="customFile" />

<?php 
if($question->option_image_1 != ","){ ?>


            <img src="{{ URL::asset('questions') }}/{{ $question->option_image_1 }}" width="40px">
            <label class="form-label" for="customFile">Option Image 1</label>
            <input type="file" name="option_image_1" value="{{ $question->option_image_1 }}" class="form-control"
                id="customFile" />
            <img src="{{ URL::asset('questions') }}/{{ $question->option_image_2 }}" width="40px">
            <label class="form-label" for="customFile">Option Image 2</label>
            <input type="file" name="option_image_2" value="{{ $question->option_image_2 }}" class="form-control"
                id="customFile" />
            <img src="{{ URL::asset('questions') }}/{{ $question->option_image_3 }}" width="40px">
            <label class="form-label" for="customFile">Option Image 3</label>
            <input type="file" name="option_image_3" value="{{ $question->option_image_3 }}" class="form-control"
                id="customFile" />
            <img src="{{ URL::asset('questions') }}/{{ $question->option_image_4 }}" width="40px">
            <label class="form-label" for="customFile">Option Image 4</label>
            <input type="file" name="option_image_4" value="{{ $question->option_image_4 }}" class="form-control"
                id="customFile" />




            <label for="recipient-name" class="col-form-label">Select Answer Image</label>

            <select name="answer_image" class="form-select" id="">
                <option value="{{ $question->answer_image }}">Select Answer Image</option>
                <option value="1">option image 1</option>
                <option value="2">option image 2</option>
                <option value="3">option image 3</option>
                <option value="4">option image 4</option>
            </select>

            <div class="mb-3">
                <?php 
                   if($question->answer_image=="1"){
    ?>
                <img src="{{ URL::asset('questions') }}/{{ $question->option_image_1 }}" width="40px">
                <?php
                   }elseif ($question->answer_image=="2") {?>

                <img src="{{ URL::asset('questions') }}/{{ $question->option_image_2 }}" width="40px">
                <?php
                   }elseif ($question->answer_image=="3") {?>
                <img src="{{ URL::asset('questions') }}/{{ $question->option_image_3 }}" width="40px">
                <?php
                      }elseif ($question->answer_image=="4") {?>
                <img src="{{ URL::asset('questions') }}/{{ $question->option_image_4 }}" width="40px">
                <?php
    }else{?>
                <img src="" alt="Please select answer Image" width="40px">
                <?php
    }
    ?>

    
<?php
}

?>
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
