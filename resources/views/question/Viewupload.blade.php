@extends('layouts.master')
@section('content')
<?php
 use Illuminate\Support\Facades\DB;
 
 ?>

    <style>
        .form {
            margin-left: 19%;
            width: 80%;
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

        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">Add
                    question
                </h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <script src="https://cdn.ckeditor.com/4.16.2/standard-all/ckeditor.js"></script>


            <div class="modal-body">
                <h4 style="color:#7209b7;text-align:center;">

<?php

$value = DB::table('lessons')
->where('lessons.id',$lession_id)
->join('boards','boards.id','lessons.board_id')
->join('periods','periods.id','lessons.class_id')
->join('subjects','subjects.id','lessons.subject_id')
->join('media','media.id','lessons.medium_id')
->select('media.title as medium','subjects.subject','periods.title as class','boards.title as board','lessons.title as lesson')
->first();
?>
<div>

<?php
echo $value->class."   th ";
echo $value->medium."   Medium ";
?>
</div>
<div>

<?php
?>
</div>
<div>

<?php
echo $value->board."    ";
?>
</div>
<div>

<?php
echo $value->lesson."    ";
?>
</div>



</h4>
                <form action="{{ route('question.save') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="lesson_id" value="{{ $lession_id }}">


                    <label for="">Select Academic</label><br />
                    <select name="academic_id" class="form-select" required>
                        <option value="">Academic</option>
                        @foreach ($academic as $data)
                            <option value="{{ $data->id }}">
                                {{ $data->title }}
                            </option>
                        @endforeach
                    </select>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Question</label><br />

                        <div>
                            <div style="display:flex;">

                                <div class="btn btn-info" style="padding: 1%;margin:3px;" onclick="showDiv('A','question_text','question_imageck','question_file')">ABC</div>
                                <div class="btn btn-danger"   style="padding: 1%; margin:3px;"  onclick="showDiv('B','question_text','question_imageck','question_file')">Editor</div>
                                {{-- <div class="btn btn-warning"   style="padding: 1%; margin:3px;" onclick="showDiv('C','question_text','question_imageck','question_file')">File Upload</div> --}}


                            </div>
                            <div id="question_text">
                                <input type="text" class="form-control" name="title">
                            </div>
                           
                        </div>
                        <div id="question_imageck" style="display:none">
                            <textarea cols="20" rows="2" id="editor10" name="title1"></textarea>
                        </div>
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

                            CKEDITOR.replace('editor10', {
                                extraPlugins: 'ckeditor_wiris',
                                athJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-AMS_HTML',
                                height: 120,
                                removePlugins: 'filetools,uploadimage,uploadwidget,uploadfile,filebrowser,easyimage',
                                // Update the ACF configuration with MathML syntax.
                                extraAllowedContent: mathElements.join(' ') +
                                    '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
                            });
                        </script>

                    </div>
<p></p>
                    <div >
                        <input type="file" name="question_image" class="form-control" id="customFile" />
                    </div>


                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Option
                            Type</label><br />
                        <select name="file_type" class="form-select" onchange="showDiv12(this,'id1','id2','id3')" required>
                            <option value="">Select Type</option>
                            <option value="2">Text Type </option>
                            <option value="0">Editor</option>
                            <option value="1">image Type </option>
                        </select>
                    </div>
                    <div id="id1" style="display: none;">



                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Option1</label><br />
                            <textarea cols="20" id="editor20" name="option_1" data-sample-short></textarea>
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

                                CKEDITOR.replace('editor20', {
                                    extraPlugins: 'ckeditor_wiris',
                                    athJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-AMS_HTML',
                                    height: 320,
                                    removePlugins: 'filetools,uploadimage,uploadwidget,uploadfile,filebrowser,easyimage',
                                    height: 320,
                                    // Update the ACF configuration with MathML syntax.
                                    extraAllowedContent: mathElements.join(' ') +
                                        '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
                                });
                            </script>


                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Option2</label><br />

                            <textarea cols="20" id="editor30" name="option_2" data-sample-short></textarea>

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

                                CKEDITOR.replace('editor30', {
                                    extraPlugins: 'ckeditor_wiris',
                                    athJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-AMS_HTML',
                                    height: 320,
                                    removePlugins: 'filetools,uploadimage,uploadwidget,uploadfile,filebrowser,easyimage',
                                    height: 320,
                                    // Update the ACF configuration with MathML syntax.
                                    extraAllowedContent: mathElements.join(' ') +
                                        '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
                                });
                            </script>


                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Option3</label><br />

                            <textarea cols="20" id="editor40" name="option_3" data-sample-short></textarea>

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

                                CKEDITOR.replace('editor40', {
                                    extraPlugins: 'ckeditor_wiris',
                                    athJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-AMS_HTML',
                                    height: 320,
                                    removePlugins: 'filetools,uploadimage,uploadwidget,uploadfile,filebrowser,easyimage',
                                    height: 320,
                                    // Update the ACF configuration with MathML syntax.
                                    extraAllowedContent: mathElements.join(' ') +
                                        '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
                                });
                            </script>


                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Option4</label><br />
                            <textarea cols="20" id="editor50" name="option_4" data-sample-short></textarea>
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

                                CKEDITOR.replace('editor50', {
                                    extraPlugins: 'ckeditor_wiris',
                                    athJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-AMS_HTML',
                                    height: 320,
                                    removePlugins: 'filetools,uploadimage,uploadwidget,uploadfile,filebrowser,easyimage',
                                    height: 320,
                                    // Update the ACF configuration with MathML syntax.
                                    extraAllowedContent: mathElements.join(' ') +
                                        '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
                                });
                            </script>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Select
                                Answer</label><br />
                            <select name="answer" class="form-select" id="">
                                <option value="">Select Answer</option>
                                <option value="1">option 1</option>
                                <option value="2">option 2</option>
                                <option value="3">option 3</option>
                                <option value="4">option 4</option>
                            </select>
                        </div>
                    </div>

                    <div id="id2" style="display: none;">
                        <label class="form-label" for="customFile">Option Image
                            1</label><br />
                        <input type="file" name="option_image_1" class="form-control" id="customFile" />
                        <label class="form-label" for="customFile">Option Image
                            2</label><br />
                        <input type="file" name="option_image_2" class="form-control" id="customFile" />
                        <label class="form-label" for="customFile">Option Image
                            3</label><br />
                        <input type="file" name="option_image_3" class="form-control" id="customFile" />
                        <label class="form-label" for="customFile">Option Image
                            4</label><br />
                        <input type="file" name="option_image_4" class="form-control" id="customFile" />
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Select
                                Answer
                                Image</label><br />
                            <select name="answer_image" class="form-select" id="">
                                <option value="">Select Answer Image
                                </option>
                                <option value="1">option image 1</option>
                                <option value="2">option image 2</option>
                                <option value="3">option image 3</option>
                                <option value="4">option image 4</option>
                            </select>
                        </div>
                    </div>

                    <div id="id3" style="display: none;">

                        <label class="form-label" for="customFile">Option 1
                            </label><br />
                        <input type="text" name="title_option_1" class="form-control" id="customFile" />
                        <label class="form-label" for="customFile">Option  2</label><br />
                        <input type="text" name="title_option_2" class="form-control" id="customFile" />
                        <label class="form-label" for="customFile">Option 3
                           </label><br />
                        <input type="text" name="title_option_3" class="form-control" id="customFile" />
                        <label class="form-label" for="customFile">Option 4</label><br />
                        <input type="text" name="title_option_4" class="form-control" id="customFile" />
                        <div class="mb-3">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Select  Answer</label><br />
                            <select name="title_answer" class="form-select" id="">
                                <option value="">Select Answer</option>
                                <option value="1">option 1</option>
                                <option value="2">option 2</option>
                                <option value="3">option 3</option>
                                <option value="4">option 4</option>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                    </div>
                    <a data-bs-dismiss="modal" aria-label="Close" class="btn btn-secondary">Close</a>
                  
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Save</button>
    </form>
    </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' type='text/javascript'>
    </script>




    <script>
        function showDiv(main, val1, val2, val3) {


            console.log(main, val1, val2, val3)



            if (main == "A") {
                document.getElementById(val1).style.display = "inline";
                document.getElementById(val2).style.display = "none";
                document.getElementById(val3).style.display = "none";
            } else if (main == "B") {
                document.getElementById(val1).style.display = "none";
                document.getElementById(val2).style.display = "inline";
                document.getElementById(val3).style.display = "none";
            } else if (main == "C") {
                document.getElementById(val1).style.display = "none";
                document.getElementById(val2).style.display = "none";
                document.getElementById(val3).style.display = "inline";
            } else {
                document.getElementById(val1).style.display = "none";
                document.getElementById(val2).style.display = "none";
                document.getElementById(val3).style.display = "none";
            }
        }

        function showDiv12(select1, id1, id2,id3) {

            console.log(select1.value)
            if (select1.value == "0") {
                document.getElementById(id1).style.display = "inline";
                document.getElementById(id2).style.display = "none";
                document.getElementById(id3).style.display = "none";
            } else if (select1.value == "1") {
                document.getElementById(id1).style.display = "none";
                document.getElementById(id3).style.display = "none";
                document.getElementById(id2).style.display = "inline";
            } else if (select1.value == "2") {
                document.getElementById(id1).style.display = "none";
                document.getElementById(id2).style.display = "none";
                document.getElementById(id3).style.display = "inline";
            } else {
                document.getElementById(id1).style.display = "none";
                document.getElementById(id2).style.display = "none";
            }
        }
    </script>

@endsection
