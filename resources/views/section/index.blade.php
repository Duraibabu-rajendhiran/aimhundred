@extends('layouts.master')
@section('content')
    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-auto" style="display:inline;">

						<h1 class="app-page-title mb-0">
							<img width="30px" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAABmJLR0QA/wD/AP+gvaeTAAABTklEQVRIie2VP0vDQBiHH0tdanHzsLOLn8EUBN3chX6D7o5OfoLS0snJrYM4Cro4F/9MWhBcFYUOleIguMQh78FLTMxdmkzND45c3tzvnruXey9QaZnVB0JpfU/vLTDOA60Bbwr8LjFXWZ+32mI8B16kHxQJTtvFoTxvgMtYrDTpNG8B+/inO1eqAzH9AKfAmZqoXSZ4oIzxNigLrNO8q+LH+KXbG2xP8wyoq/gOfunOXU6LKnc5la4KDHBCejl1iwLXE2LfwKd6XwWa0v8oCpylFeCCaLcjD9/C5XQkE0yAtX/GjYEHwCSAjXxz/j8HRPf1F7CdMfZeQE8CsmAjsRC4c4FuAK9i6DiM1wD7DGMxk+oW1YBrMQxdVqkW+8jfSngGNl0m6CrTnOjetq2X4TVE50HvOHGnSeXUUv312LdGBngK7AFXAj6QWKUl1C9lk3i0zGm76QAAAABJRU5ErkJggg=="/>
						  Section
						</h1>
                    </div>
                    <div class="col-auto">
                        <div class="page-utilities">
                            <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                                <div class="col-auto">
                                    <style>
                                        .cell {
                                            text-align: center;
                                        }

                                    </style>
                                </div>
								<?php if(session('SchoolId')){ ?>
									<button type="button" onMouseOver="this.style.color='#15A362'" onMouseOut="this.style.color='#676778'" style="border-radius:5px;padding:4px;background-color:white;border:1px solid #676778;;color:#676778; " class="col-auto" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap"><i class="fa fa-plus" aria-hidden="true"></i> Add Section</button>
					        	  <?php } ?>

									<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">Add Section</h5>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<div class="modal-body">
										
													<form action="{{ route('section.store') }}" method="POST">
														@csrf
														
														<div class="mb-3">
														<label for="recipient-name" class="col-form-label">Section</label>
														<input type="text" name="title" class="form-control" placeholder="Enter Section" required>
														<input type="hidden" name="school_id" value="{{session('SchoolId')}}"  class="form-control"  required>
													
		
						
														</div>
												   
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
                        <!--//table-utilities-->
                    </div>
                    <!--//col-auto-->
                </div>
                <!--//row-->

                @if ($errors->any())


                    <?php
                    echo '<script type ="text/JavaScript">';
                    echo 'alert("' . $errors->first() . '")';
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
											  <th class="cell">section</th>	
												<th class="cell">Action</th>
	
	
											</tr>
										</thead>
	                                     <?php $i=0; ?>
										<tbody>
											@foreach ($section as $data)
											<tr>
												<td class="cell">{{ ++$i }} </td>
											
												<td class="cell">{{ $data->title }}</td>
											
												<td class="cell">
											  <?php if(session('SchoolId')){ ?>
												<a href="{{route('section.edit',$data->id)}}" class="btn btn-primary" >
													<i class="fas fa-edit fa-1x"></i>
												</a>
												  <form action="{{ route('section.destroy',$data->id) }}" method="POST" style="display:inline;">
													@csrf
													@method('DELETE')
											
													<button type="submit" onclick="return confirm(' you want to delete?');" class="btn btn-danger"><i class="fas fa-trash"></i></button></td>
											
											</form>
												<?php } ?>
											</tr>
											@endforeach
										</tbody>
									</table>
	

                                </div>
                            
                            </div>
                          
                        </div>

                    </div>

                 
                @endsection
