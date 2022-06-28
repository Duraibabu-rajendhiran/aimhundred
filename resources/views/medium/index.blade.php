@extends('layouts.master')

@section('content')
<div class="app-wrapper">

	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">

			<div class="row g-3 mb-4 align-items-center justify-content-between">
				<div class="col-auto">
					<h1 class="app-page-title mb-0">
						
						<img width="30px" src="data:image/png;base64,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"/>
						Medium</h1>
				</div>
				<style>
					input {
						text-transform: capitalize;
					}
				</style>
				<div class="col-auto">
					<div class="page-utilities">
						<div class="row g-2 justify-content-start justify-content-md-end align-items-center">
							<button type="button" onMouseOver="this.style.color='#15A362'" onMouseOut="this.style.color='#676778'" style="border-radius:5px;padding:4px;background-color:white;border:1px solid #676778;;color:#676778; " class="col-auto" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap"><i class="fa fa-plus" aria-hidden="true"></i> Add Medium</button>
		
							<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Add Medium</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
										
											<form action="{{ route('medium.store') }}" method="POST">
												@csrf
												<div class="mb-3">
													<label for="recipient-name" class="col-form-label">Medium</label>
													<input type="hidden" name="updated" value="0" class="form-control" id="recipient-name">
													<input type="text" name="title" class="form-control" placeholder="Enter Medium" required>
												</div>
										</div>
										
										<div class="modal-footer">
										<a data-bs-dismiss="modal"
										aria-label="Close" class="btn btn-secondary">Close</a>
											<button type="submit" name="submit" class="btn btn-primary">Save</button>
											</form>

										</div>
									</div>
								</div>
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
											<th class="cell">medium</th>
											<th class="cell">Action</th>
										</tr>
									</thead>

									<tbody>
										@foreach ($medium as $data)
										<tr>

											<td class="cell">{{ ++$i }}</< /td>
											<td class="cell"><span class="truncate">{{ $data->title }}</span></td>
										
											<td class="cell">
												<a href="{{ route('medium.edit',$data->id) }}" class="btn btn-primary"><i class="fas fa-edit fa-1x"></i></a>
											


											<form action="{{ route('medium.destroy',$data->id) }}" method="POST" style="display: inline;">
												@csrf
												@method('DELETE')
												<button type="submit" onclick="return confirm(' you want to delete?');" class="btn btn-danger"><i class="fas fa-trash"></i></button></td>
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


				{!! $medium->links() !!}



				@endsection