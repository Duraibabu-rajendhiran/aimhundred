@extends('layouts.master')
@section('content')
<div class="app-wrapper">
	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">
			<div class="row g-3 mb-4 align-items-center justify-content-between">
				<div class="col-auto" style="display:inline;">
				
					<h1 class="app-page-title mb-0">

			
					Block Student

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
			<!--//row-->

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
											<th class="cell">student</th>
											<th class="cell">Class</th>
											<th class="cell">Section</th>
											<th class="cell">Block</th>
										</tr>
									</thead>
									<tbody>
                                    <?php $i = 1; ?>
										@foreach ($student as $data)
											<tr>
											<th class="cell">{{ $i++ }}</th>
											<th class="cell">{{ $data->full_name }}</th>
											<th class="cell">{{ $data->class }}</th>
											<th class="cell">{{ $data->section }}</th>

											<th class="cell">
                                                <?php  if($data->deleted_id == 0){ ?>
                                                    <a href="{{ route('blockit1', $data->class_id."$$$".$data->section_id."$$$".$data->full_name)}}">
                                                     <i class="fa fa-unlock"></i></a>
                                                  <?php  }else{ ?>
  
                                                      <a href="{{ route('blockit1', $data->class_id."$$$".$data->section_id."$$$".$data->full_name)}}">
                                                          <i class="fa fa-lock"></i></a>
  
                                            <?php } ?>
                                            
                                            </th>
										</tr>
                                        @endforeach
									</tbody>
								</table>

							</div>
							<!--//table-responsive-->

						</div>
						<!--//app-card-body-->
					</div>
					
				</div>
			
				<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body" id="mediumBody">
								<div>

								</div>
							</div>
						</div>
					</div>
				</div>
				
				@endsection