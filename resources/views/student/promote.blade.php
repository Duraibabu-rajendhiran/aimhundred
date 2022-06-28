@extends('layouts.master')
@section('content')
<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <div class="page-utilities">
                        <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                            <style>
                                .cell {
                                    text-align: center;
                                }
                                .key{
                                   display:flex;
                                }                             
                                .key   a{
                                    width:100%;
                                    padding:10px;
                                }
                                .key a:hover{
                                    background-color:rgb(231,231,231);
                                    color:greenyellow;
                                    font-size: 17px;
                                }
                               .table .app-table-hover .mb-0 .text-left{
                                    width:100% !important;
                                }
                            </style>



                            <div class="col-auto">

                                <div class="key">
                                    <a href="#" id="s1" class="cell"onclick="myfun1('rgb(231,231,231)')">promote Student</a>
                                    <a href="#" class="cell" id="s2" onclick="myfun2('rgb(231,231,231)')">promote class</a>
                                </div>

                                @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                                @endif


                                <div id="A1" style="display:none;">




<div style="border:2px solid rgb(148, 137, 137); padding:0px 100px;">


<form action="{{ route('promote') }}" method="POST">

    @csrf

    <?php if (empty(session('SchoolId'))) {  ?>
    <div class="mb-3">
        <label for="recipient-name" class="col-form-label">Select
         School</label>




        <select name="school_id" id="" class="form-select" required>
            <option value="">Select School</option>
            @foreach ($school as $data)
            <option value="{{ $data->id }}">{{ $data->school_name }}
            </option>
            @endforeach
        </select>



    </div>

<?php }elseif(!empty(session('SchoolId'))){ ?>
<input type="hidden" name="school_id" value=<?php echo session('SchoolId'); ?> >
<?php } ?>
    <div class="mb-3" style="padding:17px;width:100%;">
        <label style="margin-left:10px;" for="recipient-name" class="col-form-label">From Class</label>
     
        <label style="margin-left:70px;" for="recipient-name" class="col-form-label">From Medium
        </label>
        <label style="margin-left:70px;" for="recipient-name" class="col-form-label">From Section
        </label>

        <br>
        <div style="display:flex;">
            <select name="class_id1"  class="form-select" style="width:170px; margin-left:2px;" required>
                <option value="">select Class</option>
                 @foreach ($period as $data)
                 <option value="{{ $data->id }}">{{ $data->title }}</option>
                 @endforeach
                </select>
               <select name="medium_id1"  class="form-select" style="width:170px; margin-left:2px;" required>
                 <option value="">select Medium</option>
                 @foreach ($medium as $data)
                 <option value="{{ $data->id }}">{{ $data->title }}</option>
                 @endforeach
                </select>
               <select name="section_id1" class="form-select" style="width:170px; margin-left:2px;" required>
                 <option value="">select Section</option>
                 @foreach ($section as $data)
                 <option value="{{ $data->id }}">{{ $data->title }}</option>
                 @endforeach
                </select><br>
            </div>
<div>
    
        <label style="margin-left:10px;" for="recipient-name" class="col-form-label">To Class</label>
     
        <label style="margin-left:70px;" for="recipient-name" class="col-form-label">To Medium
        </label>
        <label style="margin-left:70px;" for="recipient-name" class="col-form-label">To Section
        </label>

        <br>

             <div style="display:flex">
                <select name="class_id2" class="form-select" style="width:170px; margin-left:10px;" required>
                    @foreach ($period as $data)
                    <option value="{{ $data->id }}">{{ $data->title }}</option>
                    @endforeach
                   </select>
            
                <select name="medium_id2" class="form-select" style="width:170px; margin-left:10px;" required>
                    @foreach ($medium as $data)
                    <option value="{{ $data->id }}">{{ $data->title }}</option>
                    @endforeach
                   </select>
                <select name="section_id2" class="form-select" style="width:170px; margin-left:10px;" required>
                    @foreach ($section as $data)
                    <option value="{{ $data->id }}">{{ $data->title }}</option>
                    @endforeach
                   </select>
             </div>

        </div>
    </div>
    
</div>
    <a data-bs-dismiss="modal" aria-label="Close" class="btn btn-secondary">Close</a>
    <button type="submit" name="submit" class="btn btn-primary">Save</button>
</form>

</div>
<div  id="A2" style="display:block;">
<div style="border:2px solid rgb(148, 137, 137); padding:0px 100px;">
                                    
<form action="{{ route('promote') }}" method="POST">
    @csrf
    <?php if (empty(session('SchoolId'))) {  ?>
    <div class="mb-3">
        <label for="recipient-name" class="col-form-label">Select
         School</label>
        <select name="school_id" id="schoolit" class="form-select" required>
            <option value="">Select School</option>
            @foreach ($school as $data)
            <option value="{{ $data->id }}">{{ $data->school_name }}
            </option>
            @endforeach
        </select>
    </div>

<?php }elseif(!empty(session('SchoolId'))){ ?>
<input type="hidden" name="school_id" id="schoolit" value=<?php echo session('SchoolId'); ?> >
<?php } ?>
    <div class="mb-3" style="padding:17px;width:100%;">
        <label style="margin-left:10px;" for="recipient-name" class="col-form-label">From Class</label>
     
        <label style="margin-left:70px;" for="recipient-name" class="col-form-label">From Medium
        </label>
        <label style="margin-left:70px;" for="recipient-name" class="col-form-label">From Section
        </label>
        <label style="margin-left:80px;" for="recipient-name" class="col-form-label">Select Student
        </label>
      
        <div style="display:flex;">
              <select name="class_id1" id="classit" class="form-select" style="width:170px; margin-left:2px;" required>
               <option value="">select Class</option>
                @foreach ($period as $data)
                <option value="{{ $data->id }}">{{ $data->title }}</option>
                @endforeach
               </select>
              <select name="medium_id1" id="mediumit" class="form-select" style="width:170px; margin-left:2px;" required>
                <option value="">select Medium</option>
                @foreach ($medium as $data)
                <option value="{{ $data->id }}">{{ $data->title }}</option>
                @endforeach
               </select>
              <select name="section_id1" id="sectionit" class="form-select" style="width:170px; margin-left:2px;" required>
                <option value="">select Section</option>
                @foreach ($section as $data)
                <option value="{{ $data->id }}">{{ $data->title }}</option>
                @endforeach
               </select><br>
               <select name="student_id" id="studentit" class="form-select" style="width:170px;margin-left:2px;" required>
                <option value="">Select Student</option>
               </select>
        </div>

<div class="mb-3">
    <label for="recipient-name" style="margin-left: 10px;" class="col-form-label">TO Class</label>  
    <label style="margin-left: 72px;" for="recipient-name" class="col-form-label">To Medium</label>
    <label style="margin-left:72px;" for="recipient-name" class="col-form-label">To Section</label>



    <div style="display:flex;">

    <select name="class_id2" class="form-select" style="width:170px; margin-left:10px;" required>
        @foreach ($period as $data)
        <option value="{{ $data->id }}">{{ $data->title }}</option>
        @endforeach
       </select>

    <select name="medium_id2" class="form-select" style="width:170px; margin-left:10px;" required>
        @foreach ($medium as $data)
        <option value="{{ $data->id }}">{{ $data->title }}</option>
        @endforeach
       </select>
    <select name="section_id2" class="form-select" style="width:170px; margin-left:10px;" required>
        @foreach ($section as $data)
        <option value="{{ $data->id }}">{{ $data->title }}</option>
        @endforeach
       </select>
</div>
</div>




    </div>


</div>
<a data-bs-dismiss="modal" aria-label="Close" class="btn btn-secondary">Close</a>
<button type="submit" name="submit" class="btn btn-primary">Save</button>
</form>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' type='text/javascript'></script>


<script>


                   $('#sectionit').change(function() {
                    var sectionID = $(this).val();
                    var schoolID = $('#schoolit').val();
                    var mediumID = $('#mediumit').val();
                    var classID = $('#classit').val();
                   if (classID) {
                       $.ajax({
                           type: "GET",
                           url: "{{ url('promote_student') }}?class_id=" + classID + '&school_id=' + schoolID+ '&section_id=' + sectionID+ '&medium_id=' + mediumID,
                           success: function(res) {
                               if (res) {
                                   $("#studentit").empty();
                                   $("#studentit").append('<option>Select Student</option>');
                                   $.each(res, function(key, value) {
                                       $("#studentit").append('<option value="' + key +
                                           '">' + value +
                                           '</option>');
                                   });
                               } else {
                                   $("#studentit").empty();
                               }
                           }
                       });
                   } else {
                       $("#studentit").empty();
                   
                   }
               });




     function myfun1(color){
        document.getElementById('s2').style.background = "none";
                        document.getElementById('s1').style.background = color ;
              
                            document.getElementById('A1').style.display = "none";
                            document.getElementById('A2').style.display = "";
                   
                    }

                    
                    function myfun2(color){
                         document.getElementById('s2').style.background = color;
                        document.getElementById('s1').style.background = "none" ;
                            document.getElementById('A1').style.display = "";
                            document.getElementById('A2').style.display = "none";
                   
                            
                        
                    }
</script>
@endsection