@extends('layouts.master')
@section('content')
    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">

                <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0">
                              <img width="30px" src="data:image/png;base64,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"/>
                       
                            Academic</h1>
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
                                <!--//col-->
                                <button type="button" onMouseOver="this.style.color='#15A362'"
                                    onMouseOut="this.style.color='#676778'"
                                    style="border-radius:5px;padding:4px;background-color:white;border:1px solid #676778;;color:#676778; "
                                    class="col-auto" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    data-bs-whatever="@getbootstrap"><i class="fa fa-plus" aria-hidden="true"></i> Add Academic</button>

                    

                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus" aria-hidden="true"></i> Add Academic</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            
                                                <form action="{{ route('academic.store') }}" method="POST">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label for="recipient-name" class="col-form-label">Academic Year</label>
                                                        <input type="hidden" name="updated" value="0" class="form-control"
                                                            id="recipient-name">
                                                        <input type="text" name="title" class="form-control"
                                                           placeholder="From-To" required>

                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="recipient-name" class="col-form-label">From</label>
                                                        <input type="number" name="from" class="form-control"
                                                      placeholder="from" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="recipient-name" class="col-form-label">TO</label>
                                                        <input type="number" name="to" class="form-control"
                                                        placeholder="to" required>
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
                            <!--//row-->
                        </div>
                        <!--//table-utilities-->
                    </div>
                    <!--//col-auto-->
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
                                    <table class="table app-table-hover mb-0 text-left">
                                        <thead>
                                            <tr>
                                                <th class="cell">Id</th>
                                                <th class="cell">Title</th>
                                                <th class="cell">From</th>
                                                <th class="cell">To</th>
                                                <th class="cell">Action</th>

                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($academic as $data)
                                                <tr>
                                                    <td class="cell">{{ ++$i }}</td>
                                                    <td class="cell"><span class="truncate">{{ $data->title }}</span></td>
                                                    <td class="cell">{{ $data->from }}</td>
                                                    <td class="cell">{{ $data->to }}</td>
                                                    <td class="cell">
                                                        <a href="{{ route('academic.edit', $data->id) }}"
                                                            data-toggle="modal" id="mediumButton" class="btn btn-primary"
                                                            data-target="#mediumModal" class="btn-sm app-primary editbtn"><i
                                                                class="fas fa-edit fa-1x"></i></a>
                                                        <form action="{{ route('academic.destroy', $data->id) }}"
                                                            method="POST" style="display:inline-block;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                onclick="return confirm(' you want to delete?');"
                                                                class="btn btn-danger"><i class="fas fa-trash"></i></button>
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
                    <!--//tab-pane-->



                    {!! $academic->links() !!}


                    <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
                        aria-hidden="true">
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


                    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet"
                        id="bootstrap-css">
                    <!-- Script -->
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' type='text/javascript'></script>

                    <!-- Font Awesome JS -->
                    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
                                        integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ"
                                        crossorigin="anonymous">
                    </script>
                    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
                                        integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY"
                                        crossorigin="anonymous">
                    </script>
                    <script>
                        // display a modal (small modal)
                        $(document).on('click', '#smallButton', function(event) {
                            event.preventDefault();
                            let href = $(this).attr('data-attr');
                            $.ajax({
                                url: href,
                                beforeSend: function() {
                                    $('#loader').show();
                                },
                                // return the result
                                success: function(result) {
                                    $('#smallModal').modal("show");
                                    $('#smallBody').html(result).show();
                                },
                                complete: function() {
                                    $('#loader').hide();
                                },
                                error: function(jqXHR, testStatus, error) {
                                    console.log(error);
                                    alert("Page " + href + " cannot open. Error:" + error);
                                    $('#loader').hide();
                                },
                                timeout: 8000
                            })
                        });

                        // display a modal (medium modal)
                        $(document).on('click', '#mediumButton', function(event) {
                            event.preventDefault();
                            let href = $(this).attr('data-attr');
                            $.ajax({
                                url: href,
                                beforeSend: function() {
                                    $('#loader').show();
                                },
                                // return the result
                                success: function(result) {
                                    $('#mediumModal').modal("show");
                                    $('#mediumBody').html(result).show();
                                },
                                complete: function() {
                                    $('#loader').hide();
                                },
                                error: function(jqXHR, testStatus, error) {
                                    console.log(error);
                                    alert("Page " + href + " cannot open. Error:" + error);
                                    $('#loader').hide();
                                },
                                timeout: 8000
                            })
                        });
                    </script>









                @endsection
