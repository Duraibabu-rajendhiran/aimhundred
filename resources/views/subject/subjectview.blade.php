@extends('layouts.master')
@section('content')
    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-auto" style="display:inline;">

                        <h1 class="app-page-title mb-0">

                            <img width="30px"
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAABmJLR0QA/wD/AP+gvaeTAAAE8UlEQVR4nO3ae+zVYxzA8VcllZ+UilrktinNJbksa9gSuZRlc2uiNSuiZmTLZYYNscSQFGKuc0la1BbZtMJKobSRGRsbjQiZyybyx+d7/E7tdy6/7/mec/rpvLez8332fb6f5/l+vp/n83yez/PQoEGDBg0a7La0q2Pb++Dq5PoRbK1HJ9rXo9GEZ/A9NuOpOvajbqwucF1T6mkBuwSlfEBPzMDRslfWEdjYwnVWbMd63IAf0wqZhYvU11lWwsV4qFiFUl+1M7YIbbZFtoh3KEipL3sAHhdD4LuMOlUremMDJuDbSgT1xcIselRjFoq+F2WPGnQka05BnyL3l+HncoWlUUAvTJXNrLAdD+ObVjxzIA4qcr+LKitgAPpjbopnd2YcBmmdAk7AMUXuv4ZN5QpLOwS+xlspn83n5BTP3KK4Z/+pNcLaog/4I/llQhoF/IgzsDaD9jvh9QzkpCaNAjaKuOB/QRoFtMPByp8FtuKHFO3kcxh6CKtrj30TuX9VKDeVAvrgHuUrYD3uStEO4exmYWDS3ssYLyK7HmK6ewBLU8pPpYBNGJNX3kuM5UL8maINwtLmi5ebiLeFh1+E25I6AzAdozEFf7e2kSxmgek4ssj9Nbg5hdxL8AVmJ+V3xAsO06yAz3A+7sPdmJainZLUay2wDPvnlYdjJlaIfGI+7YSl5H+Imq0FHsNxRe6vxHUp5HYTOcMcf4h1wBvCChbl3duO+3E5rm9NI1ko4IoMZLREOxH2XiDijo24VSjiQjsqAN6VYqilUUBuSHRI8WyO73FOiTprMBkLRFpuCEYIK1jZQv3fxEIoc+qZD5gg1hzvial3uMLrgD5Ykleumg/oK/L4leQJfxGmXYoRuFeM+1KMFo4zc+ppAUPES5UKurrjA+E4c1TVAir1AZtxdhn1VmMVnhDDoaVAp5sImG4VlpU5u0JOcBo+xKU4FB2T/yniy49s4Zm6WcA4fJJCbjFm4EWxDhgrTP4rERQNU+WN1V3BAtJQlgXs9nuD5QyBDmgSa/K2RJMyHHWpuXyoWI19nkWP6sDhIpp8L62AF8TObVtloHiHgpQaAusxCYuz6lGNORfrilUoNQTai8TEURV2pDvO03wUZmQiO5cRHiXm9txsM1ZEgPnL4TRsEBbwT4VyKmae5ti/P77E83n3nxV+JrfjcxZeqkXHajENnoaueCVpb66W1+1T8aiwhKX4XaS72jRNYl3fOylfgzuEd97ZAvrjpuRHxPhrRfa3zTJbxO9wiFBGZ4UVsIdIfuZye6PwdDU7WM0hMBT98JxwtnNwreJp8m3i8OQcEcQsxp5ird+m6CLMt19SnigyujkKWUCO2zUnUnvhIzGTZE61Tn/NFEnMeeKc0Qo7blt3wsdiuiMUMNiO1tETp4u9gTFi1XdllfqbKUPwpmblvopTd6pTygLgWBEL5OQsECmyTMnaB3QS5/KuErn6y8TpjxUpZK0Tw2hSUp4sEqN7V97N6nGnyNLAfsLrd22hXjkWQCj0fc0r0fF4MJOeVoFBWK7ZqubjzAJ1y1UAnCSywrmhsETsDWRCVkdkOuJJ4fwG40SRpiqWzu6B45PrnkXqrcKnIlJcLhzr3OTZtDvP/5HVLNBdnAHIKfRPsYNb6LhaV7Gb2zEpb8ON+LVA/SYRQTYl5X+SckUnQBs0aNCgQYPdnH8BtkPnN5mgDCQAAAAASUVORK5CYII=" />
                            Subject
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

                                <div class="col-auto">
                                    <div class="page-utilities">
                                        <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                                            <button type="button" onMouseOver="this.style.color='#15A362'"
                                                onMouseOut="this.style.color='#676778'"
                                                style="border-radius:5px;padding:4px;background-color:white;border:1px solid #676778;;color:#676778; "
                                                class="col-auto" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                data-bs-whatever="@getbootstrap"><i class="fa fa-plus" aria-hidden="true"></i> Add
                                                Subject</button>
                                            <div class="modal fade" id="exampleModal" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Add subject</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('subject.store') }}" method="POST"
                                                                enctype="multipart/form-data">
                                                                @csrf
            
                                                                <div class="mb-3">
                                                                    <label for="recipient-name" class="col-form-label">Board</label>
                                                                    <select name="board_id" class="form-select" id="" required>
                                                                        @foreach ($board as $data)
                                                                            <option value="{{ $data->id }}">{{ $data->title }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="recipient-name" class="col-form-label">Class</label>
                                                                    <input type="hidden" name="is_delete" value="0"
                                                                        class="form-control" id="recipient-name" required>
                                                                    <select name="class_id" class="form-select" id="" required>
                                                                        @foreach ($class as $data)
                                                                            <option value="{{ $data->id }}">{{ $data->title }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="recipient-name" class="col-form-label">Medium</label>
                                                                    <select name="medium_id" class="form-select" id="" required>
                                                                        @foreach ($medium as $data)
                                                                            <option value="{{ $data->id }}">{{ $data->title }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="recipient-name" class="col-form-label">Subject</label>
                                                                    <input type="text" name="subject" class="form-control"
                                                                        placeholder="Enter Subject Name" required>
                                                                </div>
            
                                                                <div class="mb-3">
                                                                    <label for="recipient-name" class="col-form-label">Subject
                                                                        image</label>
            
            
                                                                    <select name="subject_image" class="form-select" id="">
                                                                        @foreach ($book as $item)
                                                                            <option value="{{ $item->book_image }}">
                                                                                {{ $item->book_title }}</option>
                                                                        @endforeach
            
                                                                    </select>
                                                                </div>
            
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a data-bs-dismiss="modal" aria-label="Close"
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




                <form action="{{ route('searchsub') }}" method="GET">
                    @csrf
                    @method('GET')

                    <?php	if(empty(session('SchoolId'))){ ?>
                        <select name="board" id="bo" class="form-select" onchange='saveValue(this)' ;
                        style="width:100px;display:inline-block;text-transform:capitalize;"    required>
                        <option value="">Board</option>
                        @foreach ($board as $data)
                            <?php if(isset($search)){
                            if( $search[0]->board == $data->title){
                            ?>
                            <option value="{{ $data->id }}">{{ $data->title }}

                                <?php } } ?>
                            <option value="{{ $data->id }}">{{ $data->title }}</option>
                        @endforeach
                    </select>
                    <select name="medium" id="med" class="form-control" onchange='saveValue(this)'
                    ;     style="width:100px;display:inline-block;text-transform:capitalize;" required>
                        <option value="">Medium</option>
                        @foreach ($medium as $data)
                            <?php if(isset($search)){
                            if( $search[0]->medium == $data->title){
                            ?>
                            <option value="{{ $data->id }}">{{ $data->title }}

                                <?php } } ?>

                            <option value="{{ $data->id }}">{{ $data->title }}</option>
                        @endforeach
                    </select>

                    <?php } ?>



                    <select name="class" id="cl" class="form-control" onchange='saveValue(this)' ;
                    style="width:100px;display:inline-block;text-transform:capitalize;"  required>
                        <option value="">class</option>
                        @foreach ($class as $data)
                            <option value="{{ $data->id }}">{{ $data->title }}</option>
                        @endforeach
                    </select>




                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-search"></i></button>

                </form>
                <p></p>
                <p></p>
                <p></p>
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
                                        <?php $i = 0; ?>
                                        <?php  if($user){ ?>
                                        <thead>
                                            <tr>
                                                <th class="cell">Id</th>
                                                <th class="cell">Title</th>
                                                <th class="cell">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                            @foreach ($user as $data)
                                                <tr>
                                                    <td class="cell">{{ ++$i }}</td>
                                                    <td class="cell"><span
                                                            class="truncate">{{ $data->title }}</span></td>
                                                    <td class="cell">

                                                        <form action="{{ route('subject.index') }}" method="GET">
                                                            @csrf
                                                            <input type="hidden" value="{{ $data->title }}" name="board">

                                                            <button type="submit" class="btn btn-primary">View</button>

                                                        </form>

                                                    </td>
                                                </tr>
                                            @endforeach
                                            <?php }else{ ?>
                                                <thead>
                                                    <tr>
                                                        <th class="cell">Id</th>
                                                        <th class="cell">board</th>
                                                        <th class="cell">class</th>
                                                        <th class="cell">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($period as $data)
                                                <tr>
                                                    <td class="cell">{{ ++$i }}</td>
                                                    <td class="cell"><span
                                                            class="truncate">{{ $data->board }}</span></td>
                                                
                                                    <td class="cell"><span
                                                            class="truncate">{{ $data->title }}</span></td>
                                                    <td class="cell">
                 <a href="{{ route('view_sub',$data->title."-for-".$data->board) }}" class="btn btn-primary">View</a>
                                                       

                                                    </td>
                                                </tr>
                                            @endforeach


                                            <?php } ?>



                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog"
                        aria-labelledby="mediumModalLabel" aria-hidden="true">
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
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' type='text/javascript'></script>

                    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
                                        integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ"
                                        crossorigin="anonymous">
                    </script>
                    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
                                        integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY"
                                        crossorigin="anonymous">
                    </script>
                 

                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' type='text/javascript'></script>
                    <script>
                       document.getElementById("bo").value = getSavedValue("bo"); // set the value to this input
                        document.getElementById("cl").value = getSavedValue("cl"); // set the value to this input
                        document.getElementById("med").value = getSavedValue("med"); // set the value 

                       
                        function saveValue(e) {
                            var id = e.id; // get the sender's id to save it . 
                            var val = e.value; // get the value. 
                            localStorage.setItem(id, val); // Every time user writing something, the localStorage's value will override . 
                        }

                        //get the saved value function - return the value of "v" from localStorage. 
                        function getSavedValue(v) {
                            if (!localStorage.getItem(v)) {
                                return ""; // You can change this to your defualt value. 
                            }
                            return localStorage.getItem(v);
                        }
               







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
