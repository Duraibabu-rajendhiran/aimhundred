@extends('layouts.master')

@section('content')



<style>
.input{
	border: 1px solid gray;
	border-radius:2px ;
	width:70px;
	height: 39px;
}
.output{
	border: 1px solid gray;
	border-radius:2px ;
	height: 39px;
	width:300px;
}

</style>
<div class="app-wrapper">

	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">

			<div class="row g-3 mb-4 align-items-center justify-content-between">
				<div class="col-auto">


			
					<h1 class="app-page-title mb-0">
						<img width="30px" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAABmJLR0QA/wD/AP+gvaeTAAACS0lEQVRoge3YO09UQRjG8R8XCxEQY4wWWtCIFlQSGy00Qb+BlYWdpQkWFiZaWtiY+B3sqCioNBoFIwShRCURChM1MTHxtgXeijMblsNZdjmcXQZy/skkk5k5z/s+Mzm3l5KSXUc3ruEdFkO/e0cz2iKduIK3+Jdqy7guckPVE1iylvhSGKs3HpWhrBPI2vlm17WdvIlFY6ioRHbMUKsCt81QuwK1LM5OHX1hcWO5GXPnEYuB3HnFaiBNwzxnaiaifOOmyPqCeNWBlziMe3iE3zUXHcdFnMEQBtGLA2H+J37gveTjcA7P8KFBMkXoduMqbuNLVpA+3MR8jeOttvmgMVCjO1Cgbl866Y6afg9u4QYOhbGPeIIpvAm78y3sGMkO9uMkTuMcRnEszH/HgxBnTLLrReh+xUPcx6+0qdng+g/GJUffmV7UBJ3h2vGgVd3NVujOZC2sYBXDOYLUYzhotkq3kjVZqTexTdqim+eIo6Q0EhulkdgojcRGaSQ2SiOxURqJjdJIbOwZI43KPidwQeNqx7Kk3vQaTzWuorRKF2t/XP2SQsF2qx1jkmpHq3WxvopSwT5JjehoGPuMx5Jqx6KN1Y7eIDqEUzgvqXZUr/+EI6HfCt1V7Jei6vovJnAJXelFTdCFy5i0cUcnC9CdCDlWNTdQnRjJEaQeZyVVwtnQL4oRTRjZLazLN+vxm/dGrG1TMsqaYWy6oBh1eVFQgGqbk9ygPZLH6mgYKzLG880MbZdBrGwSfCWs2RUcxF0sWHu5LeBOmCvZ8/wHnBqGyyoum5EAAAAASUVORK5CYII="/>
                       
						School</h1>
				</div>
				<div class="col-auto">
					<div class="page-utilities">
						<div class="row g-2 justify-content-start justify-content-md-end align-items-center">
							<button type="button" onMouseOver="this.style.color='#15A362'" onMouseOut="this.style.color='#676778'" style="border-radius:5px;padding:4px;background-color:white;border:1px solid #676778;;color:#676778; " class="col-auto" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap"><i class="fa fa-plus" aria-hidden="true"></i> Add To school</button>
					
							<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Add School</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
					
											<form action="{{ route('school.store') }}" method="POST">
												@csrf
												<div class="mb-3">
													<label for="recipient-name" class="col-form-label">Board</label>
													<select name="board_id" class="form-select" id="" required>
														@foreach ($board as $data)
														<option value="{{$data->id}}">{{$data ->title}}</option>
														@endforeach
													</select>
												</div>

												<div class="mb-3">
													<label for="message-text" class="col-form-label">school Name:</label>
													<textarea class="form-control" style="text-transform: none;" name="school_name" id="message-text" placeholder="Enter School Full Name"></textarea>
												</div>

												<div class="mb-3">
													<label for="message-text" class="col-form-label">Email:</label>
													<input class="form-control" style="text-transform: lowercase;" name="email" id="message-text" placeholder="Enter Email" required>
												</div>

												<div class="mb-3">
													<label for="message-text" class="col-form-label">Mobile:</label>
													<input class="form-control" name="mobile" id="message-text" placeholder="Enter Mobile" required>
												</div>

												<div class="mb-3" >
													<label for="recipient-name" class="col-form-label">Address</label><br>
													<input type="text" name="door_number" class="input"  placeholder="Door No" required>
													<input type="text" name="street" class="output" placeholder="Street Name" required>
												</div>
												<div class="mb-3">
													<label for="recipient-name" class="col-form-label">Location</label>
													<input type="hidden" name="updated" value="0" class="form-control" id="recipient-name">
													<select name="location_id" class="form-select" id="" required>
														@foreach ($location as $data)
														<option value="{{$data->id}}">{{$data->city}} {{$data->state}} {{$data->district}}</option>
														@endforeach
													</select>
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



		<form action="{{ route('searchschool')}}"  method="GET">
                    @csrf
<input list="browsers"  placeholder="location" style="width:100px;display:inline-block;text-transform:capitalize;" name="location_id" id="browser">
  <datalist id="browsers">
  @foreach ($location as $data)
    <option value="{{$data->city}}--{{$data->state}} {{$data->district}}">
	@endforeach
  </datalist>
<input list="boardl"  placeholder="board" style="width:100px;display:inline-block;text-transform:capitalize;" name="board_id" id="browser">
  <datalist id="boardl">
  @foreach ($board as $data)
    <option value="{{$data ->title}}">
	@endforeach
  </datalist>
                   
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-search"></i></button>

                </form>
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
											<th class="cell">Board</th>	
											<th class="cell">School</th>
											<th class="cell">Location</th>
											<th class="cell">Street</th>
											<th class="cell">Door Number</th>
											<th class="cell">Mobile</th>
											<th class="cell">Email</th>
											<th class="cell">Student View</th>
											<th class="cell">Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($user as $data)
										<tr>
											<td class="cell">{{ ++$i }}</td>
											<td class="cell">{{ $data->title }}</td>
											<td class="cell">{{ $data->school_name}}</td>
											<td class="cell">{{$data->district}},{{$data->state}},{{$data->city}}</td>
											<td class="cell">{{ $data->street}}</td>
											<td class="cell">{{ $data->door_number }}</td>
											<td class="cell">{{ $data->mobile}}</td>
											<td class="cell" style="text-transform:lowercase;">{{ $data->email }}</td>
											<td class="cell" style="text-transform:lowercase;">
												<form action="student" method="GET">
@method('GET')
<input type="hidden" name="id" value="{{$data->id}}">
													<button type="submit" class="btn btn-primary">
														<img width="14px" src="data:image/png;base64,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" />
													</button>
												</form>
			                                </td>
										
											<td class="cell">
											

												<a href="{{ route('school.edit', $data->id) }}" class="btn btn-primary" ><i class="fas fa-edit fa-1x"></i></a>
											
											     <form action="{{ route('school.destroy',$data->id) }}" method="POST" style="display:inline-block;">
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