@extends('layouts.master')
@section('content')
    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-auto" style="display:inline;">

              <a href="{{route('viewdetailg')}}">
                         <h1 class="app-page-title mb-0">
                            <img width="30px" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAABmJLR0QA/wD/AP+gvaeTAAAE8UlEQVR4nO3ae+zVYxzA8VcllZ+UilrktinNJbksa9gSuZRlc2uiNSuiZmTLZYYNscSQFGKuc0la1BbZtMJKobSRGRsbjQiZyybyx+d7/E7tdy6/7/mec/rpvLez8332fb6f5/l+vp/n83yez/PQoEGDBg0a7La0q2Pb++Dq5PoRbK1HJ9rXo9GEZ/A9NuOpOvajbqwucF1T6mkBuwSlfEBPzMDRslfWEdjYwnVWbMd63IAf0wqZhYvU11lWwsV4qFiFUl+1M7YIbbZFtoh3KEipL3sAHhdD4LuMOlUremMDJuDbSgT1xcIselRjFoq+F2WPGnQka05BnyL3l+HncoWlUUAvTJXNrLAdD+ObVjxzIA4qcr+LKitgAPpjbopnd2YcBmmdAk7AMUXuv4ZN5QpLOwS+xlspn83n5BTP3KK4Z/+pNcLaog/4I/llQhoF/IgzsDaD9jvh9QzkpCaNAjaKuOB/QRoFtMPByp8FtuKHFO3kcxh6CKtrj30TuX9VKDeVAvrgHuUrYD3uStEO4exmYWDS3ssYLyK7HmK6ewBLU8pPpYBNGJNX3kuM5UL8maINwtLmi5ebiLeFh1+E25I6AzAdozEFf7e2kSxmgek4ssj9Nbg5hdxL8AVmJ+V3xAsO06yAz3A+7sPdmJainZLUay2wDPvnlYdjJlaIfGI+7YSl5H+Imq0FHsNxRe6vxHUp5HYTOcMcf4h1wBvCChbl3duO+3E5rm9NI1ko4IoMZLREOxH2XiDijo24VSjiQjsqAN6VYqilUUBuSHRI8WyO73FOiTprMBkLRFpuCEYIK1jZQv3fxEIoc+qZD5gg1hzvial3uMLrgD5Ykleumg/oK/L4leQJfxGmXYoRuFeM+1KMFo4zc+ppAUPES5UKurrjA+E4c1TVAir1AZtxdhn1VmMVnhDDoaVAp5sImG4VlpU5u0JOcBo+xKU4FB2T/yniy49s4Zm6WcA4fJJCbjFm4EWxDhgrTP4rERQNU+WN1V3BAtJQlgXs9nuD5QyBDmgSa/K2RJMyHHWpuXyoWI19nkWP6sDhIpp8L62AF8TObVtloHiHgpQaAusxCYuz6lGNORfrilUoNQTai8TEURV2pDvO03wUZmQiO5cRHiXm9txsM1ZEgPnL4TRsEBbwT4VyKmae5ti/P77E83n3nxV+JrfjcxZeqkXHajENnoaueCVpb66W1+1T8aiwhKX4XaS72jRNYl3fOylfgzuEd97ZAvrjpuRHxPhrRfa3zTJbxO9wiFBGZ4UVsIdIfuZye6PwdDU7WM0hMBT98JxwtnNwreJp8m3i8OQcEcQsxp5ird+m6CLMt19SnigyujkKWUCO2zUnUnvhIzGTZE61Tn/NFEnMeeKc0Qo7blt3wsdiuiMUMNiO1tETp4u9gTFi1XdllfqbKUPwpmblvopTd6pTygLgWBEL5OQsECmyTMnaB3QS5/KuErn6y8TpjxUpZK0Tw2hSUp4sEqN7V97N6nGnyNLAfsLrd22hXjkWQCj0fc0r0fF4MJOeVoFBWK7ZqubjzAJ1y1UAnCSywrmhsETsDWRCVkdkOuJJ4fwG40SRpiqWzu6B45PrnkXqrcKnIlJcLhzr3OTZtDvP/5HVLNBdnAHIKfRPsYNb6LhaV7Gb2zEpb8ON+LVA/SYRQTYl5X+SckUnQBs0aNCgQYPdnH8BtkPnN5mgDCQAAAAASUVORK5CYII=" />
                    App Payment Plans </h1></a>
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
                                <button type="button" onMouseOver="this.style.color='#15A362'"
                                    onMouseOut="this.style.color='#676778'"
                                    style="border-radius:5px;padding:4px;background-color:white;border:1px solid #676778;;color:#676778; "
                                    class="col-auto" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    data-bs-whatever="@getbootstrap"><i class="fa fa-plus" aria-hidden="true"></i> Add
                                    Payment
                                </button>
                                  <div class="modal fade" id="exampleModal" tabindex="-1"  aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add Subcription Plan</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('payitg')}}" method="POST">
                                                    @csrf

                                                    <div class="mb-3">
                                                        <label for="recipient-name" class="col-form-label">Title</label>
                                                     <input type="text" name="title" class="form-control"
                                                            placeholder="Title" required>
                                                        <label for="recipient-name" class="col-form-label">Duration</label>
                
                                                        <select size="1" class="form-select" name="duration">
                                                            <option selected value="1">1 Month</option>
                                                            <option value="2">2 Month</option>
                                                            <option value="3">3 Month</option>
                                                            <option value="4">4 Month</option>
                                                            <option value="5">5 Month</option>
                                                            <option value="6">6 Month</option>
                                                            <option value="7">7 Month</option>
                                                            <option value="8">8 Month</option>
                                                            <option value="9">9 Month</option>
                                                            <option value="10">10 Month</option>
                                                            <option value="11">11 Month</option>
                                                            <option value="12">12 Month</option>
                                                        </select>
                                                 <label for="recipient-name" class="col-form-label">Price</label>
                                                     <input type="number" name="price" class="form-control"
                                                            placeholder="Enter Price" required>

                                                        <label for="recipient-name" class="col-form-label">Offer</label>
                                                     <input type="text" name="offer" class="form-control"
                                                            placeholder="offer" required>
                                                        <label for="recipient-name" class="col-form-label">Color</label>
                                                     <input type="color" name="color" class="form-control"
                                                            placeholder="color" required>

                                                        <label for="recipient-name" class="col-form-label">Board</label>
                                                     <select name="board" class="form-select" >
                                                         @foreach ($board as $item)    
                                                         <option value="{{$item->id}}">{{$item->title}}</option>
                                                         @endforeach

                                                     </select>
                                                    
                                     
                                                     <label for="recipient-name" class="col-form-label">User limit</label>
                                                     <input type="text" name="user_limit" class="form-control" placeholder="userlimit" required>
                                                    </div>
                                                   </div>
                                                   <div class="modal-footer">
                                                    <a data-bs-dismiss="modal" aria-label="Close" class="btn btn-secondary">Close</a>
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
                                                <th class="cell">Title</th>
                                                <th class="cell">Duration</th>
                                                <th class="cell">Price</th>
                                                <th class="cell">Offer</th>
                                                <th class="cell">Color</th>
                                                <th class="cell">Board</th>
                                                <th class="cell">User Limit</th>
                                                <th class="cell">Action</th>


                                            </tr>
                                        </thead>

                                        <tbody>
<?php 
$i=1;
?>

                                            @foreach ($sub as $item)
                                              <tr>
                                                    <td class="cell">{{$i++}}</td>
                                                    <td class="cell"><span
                                                            class="truncate">{{$item->title}}</span></td>
                                                    <td class="cell"><span
                                                            class="truncate">{{$item->duration}} Month</span></td>
                                                    <td class="cell"><span class="truncate">{{$item->price}}</span></td>

                                                    <td class="cell">
                                                        <span
                                                            class="truncate">{{$item->offer}}</span></td>

                                                    <td class="cell"><span
                                                            class="truncate">{{$item->color}}</span></td>

                                                    <td class="cell"><span
                                                            class="truncate">{{$item->board_title}}</span></td>

                                                    <td class="cell"><span class="truncate">{{$item->user_limit}}</span></td>


                                                  <td class="cell">
                                                        <a  class="btn btn-primary" href="{{route('editpayg',$item->id)}}"> <i class="fas fa-edit fa-1x"></i>
                                                         </a>
                                                        
                                                     <a href="{{route('deletepayg',$item->id)}}" onclick="return confirm('you want to delete?');" class="btn btn-danger"><i class="fas fa-trash-alt"></i>
                                                    </a>


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
