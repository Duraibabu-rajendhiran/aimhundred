@extends('layouts.master')
@section('content')
<div class="app-wrapper">
	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">
			<div class="row g-3 mb-4 align-items-center justify-content-between">
				<div class="col-auto">
					<h1 class="app-page-title mb-0">
						
						<img width="30px" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAABmJLR0QA/wD/AP+gvaeTAAABV0lEQVRoge2aMU7DQBBFHwjJQoAEEgVSGtqU3CJUkbgHNClyhtwpB0gkinQpaCA5AtDQJIXXiot4cWZ3vWNpnmS5sHb0n72etWyD0T8K4BVYAD/ALvMmYgCsFIQPEilqEmtgDNxICkVCLPLGQeI2ZiIhYpGlGziOGkeOWOTbDcw5neqIRYK6RAK8ec6FRUfAlvAOdGzbuPrR8J2BTSKJuswpecQiKaddU+0kU0sdJqINqcjW7VM9S1X1o+C7uUak61xN7dcWxF5hItowEW2YiDZMRBsmog0T0YaJaMNEtGEi2mgjcg1MgXfgl7SvSv97u9LImedYNfgTeGwh3BW+zEepn40F8AzcRw7VCZXEHLjInCWISmSYO0gof5QiRe4gbfB1rS+3f+oiSEpmlFdkBVxmzhLEHYfvhGvgBXjImiiAIfBBvkXw5IXRxxUwofyBoLc/1Rhdswc810cdKdAPjgAAAABJRU5ErkJggg=="/>
                Books       
                    </h1>
				</div>
				<style>

					input {
						text-transform: capitalize;
					}

				</style>
				<div class="col-auto">
					<div class="page-utilities">
						<div class="row g-2 justify-content-start justify-content-md-end align-items-center">
							<button type="button" onMouseOver="this.style.color='#15A362'" onMouseOut="this.style.color='#676778'" style="border-radius:5px;padding:4px;background-color:white;border:1px solid #676778;;color:#676778; " class="col-auto" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap"><i class="fa fa-plus" aria-hidden="true"></i> Add Book</button>
			
							<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Add Book</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
										
											<form action="{{ route('addbook1') }}" method="POST"  enctype="multipart/form-data">
												@csrf
                                                <div class="mb-3">
													<label for="recipient-name" class="col-form-label">Book Title</label>
													<input type="text" name="book_title" class="form-control" placeholder="Enter book name" required>
												</div>
                                                 <div class="mb-3">
													<label for="recipient-name" class="col-form-label">book image</label>
													<input type="file" name="book_image" class="form-control" id="recipient-name" required>
												</div>
                                                 <div class="mb-3">
													<label for="recipient-name" class="col-form-label">book color</label>
													<input type="color" name="book_color" class="form-control" id="recipient-name" required>
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
					</div>
				</div>
			</div>
	


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
								<p></p>
								<p></p>
								<table class="table app-table-hover mb-0 text-left">
									<thead>
										<tr>
											<th class="cell">Id</th>
											<th class="cell">book Name</th>
											<th class="cell">book Color</th>
											<th class="cell">book Image</th>
											<th class="cell">Action</th>
										
									</thead>
									<tbody>
                                      
							         

									<?php $i =  0;?>
                                    @foreach ($book as $item)
										<tr>
    
<td class="cell">{{ ++$i }}</td>
<td class="cell">{{$item->book_title}}</td>
<td class="cell"><input type="color" value="{{$item->book_color}}"  class="form-control" disabled></td>
<td class="cell"><img src="subjects/{{$item->book_image}}" alt="" width="50px"></td>
<td class="cell"><a href="{{route('deletebook',$item->id)}}"><i class="fas fa-trash fa-1x"></i></a></td>


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
				@if ($errors->any())

							
				<?php   
	echo '<script type ="text/JavaScript">';  
	echo 'alert("'.$errors->first().'")';  
	echo '</script>';  
	?>  	
			@endif


 <script>
                        document.getElementById("board1").value = getSavedValue("board1"); // set the value to this input
                        document.getElementById("medium1").value = getSavedValue("medium1"); // set the value to this input
                        document.getElementById("class1").value = getSavedValue("class1"); // set the value to this input

                        function saveValue(e) {
							
                            var id = e.id;
                            var val = e.value; 
                            localStorage.setItem(id, val); // Every time user writing something, the localStorage's value will override . 
                        }

                        //get the saved value function - return the value of "v" from localStorage. 
                        function getSavedValue(v) {
						
                            if (!localStorage.getItem(v)) {
                                return ""; // You can change this to your defualt value. 
                            }
                            return localStorage.getItem(v);
                        }
			</script>
		
				@endsection