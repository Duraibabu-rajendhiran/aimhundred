@extends('layouts.master')
@section('content')

<div class="app-wrapper">
	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">

			<div class="row g-3 mb-4 align-items-center justify-content-between">
				<div class="col-auto">
					<h1 class="app-page-title mb-0">
						
						    <img width="30px" src="data:image/png;base64,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"/>
                        
						Class</h1>
				</div>


				<style>
					input {
						text-transform: capitalize;
					}
				</style>
				<div class="col-auto">
					<div class="page-utilities">
						<div class="row g-2 justify-content-start justify-content-md-end align-items-center">

							<div class="col-auto">
							</div>

							<style>
								input {
									text-transform: capitalize;
								}
							</style>

							<button type="button" onMouseOver="this.style.color='#15A362'" 
							onMouseOut="this.style.color='#676778'"
							 style="border-radius:5px;padding:4px;background-color:white;border:1px solid #676778;;color:#676778; " 
							 class="col-auto" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">
							 <i class="fa fa-plus" aria-hidden="true"></i> Add Class</button>

	              			<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Add Class</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
					
											<form action="{{ route('period.store') }}" method="POST">
											@csrf

												<div class="mb-3">
													<label for="recipient-name" class="col-form-label">Class</label>
													<input type="hidden" name="updated" value="0" class="form-control" id="recipient-name">
													<input type="text" name="title" class="form-control" placeholder="Enter Class Name" required>
												</div>
										</div>
										<div class="modal-footer">
										<a data-bs-dismiss="modal"
										aria-label="Close"  class="btn btn-secondary">Close</a>
											<button type="submit" name="submit" class="btn btn-primary">Save</button>
											</form>

										</div>
									</div>
								</div>
							</div>
					
						</div>
						<!--//row-->
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
											<th class="cell">Class</th>
										    <th class="cell">Action</th>
										</tr>
									</thead>
									<tbody>

										<?php $i =0;
										
									
										?>



										@foreach ($period as $data)
										<tr>
											<td class="cell">{{++$i}}</td>
											<td class="cell"><span>{{$data->title}}</span></td>
										      <td class="cell"><a href="{{ route('period.edit',$data->id) }}" class="btn btn-primary" ><i class="fas fa-edit fa-1x"></i></a>
											<form action="{{ route('period.destroy',$data->id) }}" method="POST" style="display: inline;">
												@csrf
												@method('DELETE')
												<button type="submit" onclick="return confirm('you want to delete?');" class="btn btn-danger"><i class="fas fa-trash"></i></button></td>
											</form>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
							<!--//table-responsive-->
						</div>
						<!--//app-card-body-->
					</div>
					<!--//app-card-->
				</div>
				<!--//tab-pane-->

		
				@endsection