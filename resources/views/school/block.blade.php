@extends('layouts.master')
@section('content')
<div class="app-wrapper">
	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">
			<div class="row g-3 mb-4 align-items-center justify-content-between">
				<div class="col-auto" style="display:inline;">
				
					<h1 class="app-page-title mb-0">
                        <img width="30px" src="https://img.icons8.com/ios-filled/50/000000/lock-orientation.png"/>
                         Block

				</h1>
				</div>
				<div class="col-auto">
					<div class="page-utilities">
						<div class="row g-2 justify-content-start justify-content-md-end align-items-center">
							<div class="col-auto">
								<style>
								   .cell{
										text-align:center;
									}
								</style>
							</div>
						</div>
						<!--//row-->
					</div>
					<!--//table-utilities-->
				</div>
				<!--//col-auto-->
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

<?php if(isset($class)){ ?>
								<table class="table app-table-hover mb-0 text-left">
									<thead>
										<tr>
											<th class="cell">Id</th>
											<th class="cell">Class</th>
											<th class="cell">Section</th>
											<th class="cell">Medium</th>
											<th class="cell">Block</th>
											<th class="cell">View</th>
								         </tr>
									</thead>
                                    <tbody>
                                        <?php $i = 0; ?>
                                        @foreach ($class as $data)
								        	<tr>
                                              <th>{{ ++$i}}</th>
                                              <th>{{ $data->class}}</th>
                                              <th>{{ $data->section}}</th>
                                              <th>{{ $data->medium}}</th>
                                              <th>

                                                <?php  if($data->deleted_id == 0){ ?>
                                                  <a href="{{ route('blockit', $data->class_id."$$$".$data->section_id."$$$".$data->medium_id."$$$".$school)}}">
                                                   <i class="fa fa-unlock"></i></a>
                                                <?php  }else{ ?>

                                                    <a href="{{ route('blockit', $data->class_id."$$$".$data->section_id."$$$".$data->medium_id."$$$".$school)}}">
														<i class="fa fa-lock"></i></a>

<?php } ?>
                                                
                                                
                                                </th>
												<th>
													<a href="{{ route('blockview', $data->class_id."$$$".$data->section_id."$$$".$data->medium_id."$$$".$school)}}">
														<i class="fa fa-eye"></i></a>

												</th>

                                            </tr>
                                    @endforeach
                                   </tbody>
								   </table>
<?php }  ?>
							</div>
							<!--//table-responsive-->

						</div>
						<!--//app-card-body-->
					</div>
					
				</div>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
       
                <script>



function myfunction() {

	var a = document.getElementById('student').style.display;
 if(a == "none"){
	document.getElementById('student').style.display="block"; 
 }else{
	document.getElementById('student').style.display="none";  
 }

}


</script>	
<script>	


$('#board').change(function() {
                var boardID = $(this).val();
                if (boardID) {
                    $.ajax({
                        type: "GET",
                        url: "{{ url('boardt') }}?board_id=" + boardID,
                        success: function(res) {
                            if (res) {
                                $("#school1").empty();
                                $("#school1").append('<option>Select school</option>');
                                $.each(res, function(key, value) {

                                    $("#school1").append('<option value="' + key + '">' + value +
                                        '</option>');

                                });
                            }else {
                                $("#school1").empty();
                            }
                        }
                    });
                } else {
                    $("#school1").empty();
                }
            });

 
$('#school1').change(function() {
                var schoolID = $(this).val();
                if (schoolID) {
                    $.ajax({
                        type: "GET",
                        url: "{{ url('schoolt') }}?school_id=" + schoolID,
                        success: function(res) {
                            if (res) {
                                $("#class1").empty();
                                $("#class1").append('<option>Select Class</option>');
                                $.each(res, function(key, value) {
                                    $("#class1").append('<option value="' + key + '">' + value +
                                        '</option>');
                                });
                            }else {
                              
                            }
                        }
                    });
                } else {
                  
                }
            });

			$('#class1').change(function() {
                var classID = $(this).val();
                if (classID) {
                    $.ajax({
                        type: "GET",
                        url: "{{ url('classt') }}?class_id=" + schoolID,
                        success: function(res) {
                            if (res) {
                                $("#section1").empty();
                                $("#section1").append('<option>Select Class</option>');
                                $.each(res, function(key, value) {
                                    $("#section1").append('<option value="' + key + '">' + value +
                                        '</option>');
                                });
                            }else {
                               
                            }
                        }
                    });
                } else {
                    
                }
            });


                </script>
                
			
			
				@endsection