@extends('layouts.master')

@section('content')
<div class="app-wrapper">
	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">

			<div class="row g-3 mb-4 align-items-center justify-content-between">
				<div class="col-auto">
					<h1 class="app-page-title mb-0">
            <img width="30px" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAABmJLR0QA/wD/AP+gvaeTAAACr0lEQVRoge2Zv2sUQRTHP8lFjYWKJoo/QLSxtRBBizQWARVEsbIQRCwtBEXFv0EQtBBBEALpUkgIphCLRESEKHj4A7SxEANaiD+LaFyLmXAzs7d7M7vz5i6QB8PBvLfvfT87O7szc7Biy8syofYG2JqQQwwkOcxSUYmcSWEkQV7q3yawOXKNwqISOTcCcyQaGUkQUCOxNDKiMNIgoGCaCMOkAIEEMKlAQBgmJQgIwqQGASGYboCAAEy3QCAyjPQSJaQ1y5L2eRT1iQuxOjemUMdAjaRVrcpN6QjfXyFpT1oskBvkn+kTBbF3nLj3wGAkHYXmO9nXA/PYAl+Qf4z2AAtO3JGIOqIkOEd+VEadmAnHPyGgo3aCfuAZttAZw78f+Gf4fgG7BHRESXAQW2wGjGjfI6f/sqCOKAnGsAVPomDcvfpqYR21E2wHfhjXLgD3sUEOJdARJcFVbOFmG0+oo3aCNcA78hDfgW0SOqS+7I2C3GuBLUI1S63qiFzHHgnzTTZL3EWol1UB2Qv8Ma59CzzGBjsTUaOXhYIMoJYmpugLKOFm32dgk2ftdi3YQi+84hT8gJr4DeCV47vtWTs5yG7gp1PwtOE/7vgWgQOBtcVB+oCH2EKb5N9cT5yY56jR8q0tDnKW/PAfbhPnLlUy4HxAbVGQYeCLI26mJP6BE/sNtazxqZ1ssse0IJCVPXuvWa+A3CLsW+HG3uxUINUcaaA2YJ0+fu3803icz6Wc7Oto/Q03h1opt7NB4KmOew1s8Eme+q21A/ioa44VxNzV/nlgp2/ibrx+96FOWDLgouO7pPt/U768yVm3viMnUWuxReCo7hsF/qL2NqdCE5atQCXaJ1qPyzXd9xU4pn8z1HlAsKUGcSewe058rwpEL9gqWgd7s6i9zbK1IWCKDjvK/5Qx6w2h0pvRAAAAAElFTkSuQmCC"/>
            Score </h1>
				</div>

				<style>
					input {
						text-transform: capitalize;
					}
          span .btn:hover{
            color:green;
          }
				</style>

         <div width=40%;>


  <form action="{{ route('exceldownload') }}" method="POST">
    @csrf
    @method('POST')


    <div id="hello" style="display:flex;">
      
      <?php if(empty(session('SchoolId'))){  ?>
          <div>
          <label for="">Board</label><br>
           <select id="board" name="board" >
          <option value="" selected disabled>Select Board</option>
              @foreach($board  as $data)
          <option value="{{$data->id}}"> {{$data->title}}</option>
             @endforeach
          </select>
          </div>



          <div>
            <label for="">Medium</label><br>
            <select name="medium" id="medium" >
              <option value="">Select Medium</option>
            </select>
            </div>



            <div>
            <label for="">School</label><br>
            <select name="school" id="school">
              <option value="">Select School</option>
            </select>
          </div>


          <div>
            <label for="" id="">Class</label><br>
            <select name="class" id="period" >
              <option value="">Select Class</option>
            </select>
          </div>
         
          <div>
          
            <button type="submit" style="margin-top:50%;height:28px" class="btn btn-primary"><li class="fas fa-search"></li></button>
        </div>
           <?php }elseif(!empty(session('SchoolId'))){ ?>

        <div>
          <input type="hidden" name="school" value="{{session('SchoolId')}}">
            <label for="">class</label><br>
            <select name="class" id="period" >
               <option value="">Select Class</option>
               @foreach ($class as $data )
               <option value="{{$data->id}}">{{$data->title}}</option>
             @endforeach
            </select>
           </div>

        
         <button style="margin:4% 40%;" type="submit" class="btn btn-primary">Submit</button>

         <?php } ?>
          <p></p>
          <p></p>
  
      </div>
      </form>
        
<hr>
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
							</div>
						</div>
					</div>
				</div>
				<table class="table app-table-hover mb-0 text-left">
          <thead>
            <tr>
              <th class="cell">Id</th>
              <th class="cell">Class</th>
              <th class="cell">Full name</th>
              <th class="cell">School Name</th>
              <th class="cell">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $i =0;
            if(isset($fetchdata)){
              $fetchdata=$fetchdata;
            }else{
              $fetchdata=[];
            }
          ?>

            @foreach ($fetchdata as $data)
          <tr>
              <td class="cell">{{++$i}}</td>
              <td class="cell"><span>{{$data->class}}</span></td>
              <td class="cell"><span>{{$data->full_name}}</span></td>
              <td class="cell"><span>{{$data->school_name}}</span></td>
              <td class="cell">


                <div style="display: inline;">

                <a href="{{ route('overall', $data->id)}}" class="btn btn-primary" style="padding: 1%;">School</a> 
    <a href="{{ route('overmark', $data->id)}}"  class="btn btn-warning" style="padding: 1%;">All School</a> 
   
    <a onclick="myfun('div{{$i}}')" class="btn btn-danger" style="padding: 1%;">date</a>
  
  </div>
 
              
               <form action="{{ route('downloadex', $data->id)}}" method="GET">
                @method('GET')  
            
                <span id="div{{$i}}" style="display:none">
                <input type="date" name="startdate" require><br>
                <input type="date"  name="enddate" require><br>
                <button class="btn" type="submit" ><i class="fa fa-download" aria-hidden="true"></i></button>
                </span>
              </form>
            
             
            </td>
             
          </tr>
            @endforeach
          </tbody>
        </table>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script>



function myfun(id){
var value =document.getElementById(id).style.display;
if(value == "none"){
document.getElementById(id).style.display="block";
}else{
  document.getElementById(id).style.display="none";
}
}



$('#board').change(function() {
      var boardID = $(this).val();
      if (boardID) {
        $.ajax({
          type: "GET",
          url: "{{url('exboard')}}?board_id=" + boardID,
          success: function(res) {
            if (res) {
              $("#medium").empty();
              $("#medium").append('<option>Select Medium</option>');
              $.each(res, function(key, value) {
                $("#medium").append('<option value="' + key + '">' + value + '</option>');
              });
            } else {
              $("#medium").empty();
            }
          }
        });
      } else {
        $("#medium").empty();
        $("#period").empty();
      }
    });

 $('#medium').on('change', function() {
                      var mediumID = $(this).val();
                      if (mediumID) {
                        $.ajax({
                          type: "GET",
                          url: "{{url('exmedium')}}?medium_id=" + mediumID,
                          success: function(res) {
                            if (res) {
                              $("#school").empty();
                              $("#school").append('<option>Select School</option>');
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

                    $('#school').on('change', function() {
                      var schoolID = $(this).val();
                      if (schoolID) {
                        $.ajax({
                          type: "GET",
                          url: "{{url('exschool')}}?school_id=" + schoolID,
                          success: function(res) {
                            if (res) {
                              $("#period").empty();
                              $("#period").append('<option>Select Class</option>');
                              $.each(res, function(key, value) {
                                $("#period").append('<option value="' + key + '">' + value + '</option>');
                          
                              });

                            } else {
                              $("#period").empty();
                            }
                          }
                        });
                      } else {
                        $("#period").empty();
                      }

                    });
                    
                      $('#period').on('change', function() {
                      var periodID = $(this).val();
                      if (periodID) {
                        $.ajax({
                          type: "GET",
                          url: "{{url('experiod')}}?class_id=" + periodID,
                          success: function(res) {
                            if (res) {
                              $("#subject").empty();
                              $("#subject").append('<option>Select subject</option>');
                              $.each(res, function(key, value) {
                                $("#subject").append('<option value="' + key + '">' + value + '</option>');
                              });

                            } else {
                              $("#subject").empty();
                            }
                          }
                        });
                      } else {
                        $("#subject").empty();
                      }

                    });


                      $('#subject').on('change', function() {
                      var sectionID = $(this).val();
                      var periodID = $('#period').val();
                      var schoolID = $('#school').val();
                      var mediumID = $('#medium').val();
                      var boardID = $('#board').val();
                   
                      if (periodID) {
                        $.ajax({
                          type: "GET",
                          url: "{{url('exstudent')}}?class_id=" + periodID +'&school_id='+schoolID+'&medium_id='+mediumID+'&subject_id='+sectionID+'&board_id='+boardID,
                          success: function(res) {
                            if (res) {
                              $("#student").empty();
                              $("#student").append('<option>Select Student</option>');
                              $.each(res, function(key, value) {
                                $("#student").append('<option value="' + key + '">' + value + '</option>');
                              });

                            } else {
                              $("#student").empty();
                            }
                          }
                        });
                      } else {
                        $("#student").empty();
                      }
                    });





 </script>

@endsection
