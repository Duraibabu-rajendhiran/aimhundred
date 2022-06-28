@extends('layouts.master')
@section('content')
    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0">
                           <img width="30px" src="data:image/png;base64,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"/>
                          Exam Categories</h1>
                    </div>
                    <div class="col-auto">
                        <div class="page-utilities">
                            <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                                <button type="button" onMouseOver="this.style.color='#15A362'"
                                    onMouseOut="this.style.color='#676778'"
                                    style="border-radius:5px;padding:4px;background-color:white;border:1px solid #676778;;color:#676778; "
                                    class="col-auto" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    data-bs-whatever="@getbootstrap"><i class="fa fa-plus" aria-hidden="true"></i> Add
                                    Exam Categories</button>
                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add Exam Category</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('category.store') }}" method="POST">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label for="recipient-name" class="col-form-label">Board</label>
                                                        <select name="board" class="form-select" id="board" required>
                                                            <option value="">Select Board</option>
                                                            @foreach ($board as $data)
                                                                <option value="{{ $data->id }}">{{ $data->title }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="recipient-name" class="col-form-label">Class</label>
                                                        <select name="class" class="form-select" id="class" required>
                                                          <option value="">Select Class</option>
                                                          @foreach ($class as $data )
                                                          <option value="{{$data->id}}">{{$data->title}}</option>
                                                          @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="recipient-name" class="col-form-label">NO OF Question/subject</label>
                                                        <input type="number" name="no_of_question_sub" class="form-control"
                                                            id="recipient-name" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="recipient-name" class="col-form-label">Start Time</label>
                                                        <input type="time" name="start_time" class="form-control"
                                                            id="recipient-name" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="recipient-name"
                                                            class="col-form-label">time_per_question</label>
                                                          <pre style="display:flex;">
                                                       <input type="number" name="time_limit1" placeholder="minutes" min="1" max="60" style="width:100px;height:30px;"><h5>:</h5><input type="number" placeholder="seconds" min="0" max="60" style="width:100px;height:30px;" name="time_limit2" width="1px">
                                                    </pre>
                                                  </div>
                                            </div>
                                            <div class="modal-footer">
                                                <a data-bs-dismiss="modal"
                                                aria-label="Close"
                                                    class="btn btn-secondary">Close</a>
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
                                    <?php $i=0; ?>
                                    <table class="table app-table-hover mb-0 text-left">
                                        <thead>
                                            <tr>
                                                <th class="cell">Id</th>
                                                <th class="cell">board</th>
                                                <th class="cell">class</th>
                                                <th class="cell">No Of Question/subject</th>
                                                <th class="cell">time per question</th>
                                                <th class="cell">start Time</th>
                                            
                                                <th class="cell">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($user as $data)
                                                <tr>
                                                    <td class="cell">{{ ++$i }}</td>
                                                    <td class="cell">{{ $data->boards }}</td>
                                                    <td class="cell">{{ $data->classes}}</td>
                                                    <td class="cell">{{ $data->no_of_question_sub }}</td>
                                                    <td class="cell">{{ $data->time_per_question }}</td>
                                                    <td class="cell">{{ $data->start_time }}</td>
                                                  
                                                    <td class="cell">
                                                      <a href="{{ route('category.edit', $data->id) }}"
                                                            class="btn btn-primary">
                                                            <i class="fas fa-edit fa-1x"></i>
                                                    </a>

                                                        <form action="{{ route('category.destroy', $data->id) }}"
                                                            method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                onclick="return confirm(' you want to delete?');"
                                                                class="btn btn-danger"><i class="fas fa-trash"></i>
                                                            </button>
                                                    </td>
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


                    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet"
                    id="bootstrap-css">

               
                @endsection
