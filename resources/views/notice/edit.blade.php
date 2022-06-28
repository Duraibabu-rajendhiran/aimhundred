@extends('layouts.master')

@section('content')

<style>
    .form {
        margin-left: 30%;
        width: 50%;
        background-color: lightgray;
        padding: 5px 20px;
        margin-top: 10px;
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
    <form action="{{ route('notice.update', $notice->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
        <div class="mb-3">
            <h4 style="text-align:center;">Edit Notice</h4>
        </div>
        <div class="mb-3">
        <input type="hidden" name="valid" class="form-control" value="{{ $notice->valid }}">

            <label for="recipient-name" class="col-form-label">Notice Description</label>

 <script src="https://cdn.ckeditor.com/4.16.2/standard-all/ckeditor.js"></script>

  <textarea cols="5" id="editor1"  name="description"  data-sample-short>
{{ $notice->description }}
      </textarea>
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
    
    CKEDITOR.replace( 'editor1', {
        extraPlugins: 'ckeditor_wiris',
        athJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-AMS_HTML',
        height: 320,
        removePlugins: 'filetools,uploadimage,uploadwidget,uploadfile,filebrowser,easyimage',
        height: 320,
        // Update the ACF configuration with MathML syntax.
        extraAllowedContent: mathElements.join( ' ' ) + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
    } );

</script>

        </div>
  

        <div  class="mb-3">

            <label for="recipient-name"
            class="col-form-label">Notice Image</label>
        <input type="file" name="image" class="form-control"
            id="recipient-name">
        </div>


        <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Select Board</label>
            <select name="board_id" class="form-select" id="board">
                <option value="{{ $notice->board_id}}">{{$notice->board}}</option>
                @foreach($board as $data )
                <option value="{{$data->id}}">{{$data->title}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Select school</label>
            <select name="school_id" class="form-select" id="school">
                <option value="{{ $notice->school_id}}">{{$notice->school}}</option>
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
        url: "{{url('boardt')}}?board_id=" + classID,
        success: function(res) {
          if (res) {
            $("#school").empty();
            $("#school").append('<option>Select school</option>');
            $.each(res, function(key, value) {
              $("#school").append('<option value="' + key + '">' + value + '</option>');
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
