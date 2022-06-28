@extends('layouts.master')
@section('content')
    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0">
                            <img width="33px"
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAABmJLR0QA/wD/AP+gvaeTAAAEaElEQVRoge2YXYhVVRTHf/d6m+nDMsmZnCwk6qUpzCTNmYqKkAzKmvKDAfEjCKYo9SHIHgp6CAwLeiqCinopjCCiIJjCGjAdP0jDKMpEyVLGSp0sHa1p97DWdu/uPXufc8/c6/Rw/nA4h73/+7/X/jhrrb2hQIECBQpACbgNeBH4AhgCTgHfAxPG0a66cA/wNWACz7LxMy0bKsCrOIOPAK8AC4GZQJ+WHwXeAG4fHzPjKAHvIoaeAp4BWqs4FWRr2YH+A7xwFm3MhNWIcX8A3SncDuBx4IS2ebS5ptWiDNyBbJ+dwCFkVu8FflWj7qtDr1fb/AasBT4A9gLHtPzWRhnuoxMYJPnnPanvT3LobgpoWr3pYzXcx1zcNjgMvAQsAGbhZs8AD+bQfljb/gAsB+YgjsFOjgE+BqaNaQRAGxIDDPA2MKmq/k5gWOs7cujP0LbfVJU/BLyGbF8DfEmt86gLz+GWORTIDirnvBz6k3EuOVT/rXLW5NA/gz0qMjvC2a+cthz6F2vb4QhnAW5VcuF8YBQJbKUI7z3t6IEcfXRp268inBbgL32C26scEShpvXWtIWzRd0+EE8JqffdHOKeRf6UCtIdIsYGcBP4ELiWe6N3t8etByWtzfQrX/n+n6+zjDPpJD07HlXNZDv1p2nYowulUzp6YUGxFQFYD3Kwn4Tt9X5OilQTb5kCEY1OY2GCjmIjMxO/I/gzhKeXtJT3P8tGtbQzwZIR3IfA34nhidgRRRvy7Ae4ivHqtwIDyNtShv0HbDBAPdrco7yfi3jOKl3GpQixytyEJ5BDiLtPQgqQ7o8CUCO9yZDUM8GwG3SBagc/IltnapHJFBt2Vyt2cwluqvH6yTVAUa1TsoxSeTcsPEZ/lKbgcqjfCqwC7MvAyow2XGD4W4ZWAjaS7Spv2bCS+59/BOZExr4bFEyr6YQqvHfdPhWDrg1G6ijc3i4FpccRin75HU3iHM+rVwx3MQso6ELu0NwGLgIsCPN+NXplQ75eFXG47cnnRcHQA20k+jvqoIIchW3cUCXRX6LMWF5cM8Dq1AS6pj6fJPuGJmA6s8zr/EXgE+By58vEH0gVs07IR4NOAUUbrRvR7O3Bz1UBGkOPtOiQ2GWAHcrF3bj0D6ALexwUio99Xe5wtWt5D7QXCeuXMxyWdNhbM17r1VW02I2d+gzsWACzxBmOAX4DnSTlWdyCxIjSTq5TXiqxOiPemp9ntlft52FuR9gdwM78wwDmBrFiNW74R+DkibpCz+XLEg8V4A55uj1fuH7xi10AGOT734lY+9Azirc4luEjbiOc4cI5q93nlfVrWghzYGtXfVmBCGdkyU2kcJiIrDO4843/PRu4DGoU5wLIycH8DRS3m6TtpIPNoPJaWgauaILxY30kDWdSE/m4oAxc0Qfha4Dr+6yanIjeLnU3ob3IZyUBDz+4xiC+hdkUWB7hZsJuIrWlHx2PU3veOF4aRm8lEpA3EpNSfbeQ+sxcoUKDA/wv/ArHxj/XR5l5KAAAAAElFTkSuQmCC" />
                            <span id="headmang1"> School Admin</span>
                            <span id="headmang2" style="display:none;">Management</span>
                        </h1>
                    </div>
                    <style>
                        .cell {
                            text-align: center;
                        }

                        .key {
                            display: flex;
                        }

                        .key a {
                            width: 100%;
                            padding: 10px;
                        }

                        .key a:hover {
                            background-color: rgb(231, 231, 231);
                            color: greenyellow;
                            font-size: 17px;
                        }

                        .table .app-table-hover .mb-0 .text-left {
                            width: 100% !important;
                        }
                    </style>
                    <div class="col-auto">
                        <div class="page-utilities">
                            <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                                <button type="button" onMouseOver="this.style.color='#15A362'"
                                    onMouseOut="this.style.color='#676778'"
                                    style="border-radius:5px;padding:4px;background-color:white;border:1px solid #676778;;color:#676778; "
                                    class="col-auto" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    data-bs-whatever="@getbootstrap"><i class="fa fa-plus" aria-hidden="true"></i> Add
                                    management</button>
                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add Management</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('management.store') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="deleted_id" value="0" class="form-control"
                                                        id="recipient-name">
                                                    <input type="hidden" name="password" class="form-control"
                                                        value="Proskools@123" id="recipient-name">
                                                    <div id="show1">
                                                        <input type="hidden" name="role" value="0" class="form-control"
                                                            id="recipient-name">
                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">Full
                                                                Name</label>
                                                            <input type="text" name="fullname" class="form-control"
                                                                id="recipient-name">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">User
                                                                Name</label>
                                                            <input type="text" name="username" class="form-control"
                                                                id="recipient-name">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">email</label>
                                                            <input type="email" style="text-transform:lowercase;"
                                                                name="email" class="form-control" id="recipient-name">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">Phone</label>
                                                            <input type="number" name="phone" class="form-control"
                                                                id="recipient-name">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a data-bs-dismiss="modal" aria-label="Close"
                                                            class="btn btn-secondary">Close</a>
                                                        <button type="submit" name="submit"
                                                            class="btn btn-primary">Save</button>
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
                                    <div class="key">
                                        <a href="#" id="s1" class="cell"
                                            onclick="myfun1('rgb(231,231,231)')">School Admin</a>
                                        <a href="#" class="cell" id="s2"
                                            onclick="myfun2('rgb(231,231,231)')">Management</a>
                                        <a href="#" class="cell" id="s3"
                                            onclick="myfun3('rgb(231,231,231)')">Teacherlist</a>
                                    </div>
                                    <table class="table app-table-hover mb-0 text-left" id="managementlvc">
                                        <tr>
                                            <th class="cell">Id</th>
                                            <th class="cell">User Name</th>
                                            <th class="cell">Email</th>
                                            <th class="cell">phone</th>
                                            <th class="cell">Free</th>
                                            <th class="cell">Action</th>
                                        </tr>
                                        
                                        <?php $i = 1; ?>
                                        @foreach ($management1 as $data)
                                            <tr>
                                                <?php
                                                if ($data->username != '') {
                                                    break;
                                                }
                                                ?>
                                                <td class="cell">{{ ++$i }}</td>
                                                <td class="cell"><span>
                                                        <?php
                                                        if ($data->username == '') {
                                                            echo $data->school_name;
                                                        } else {
                                                            echo $data->username;
                                                        }
                                                        ?>
                                                    </span></td>
                                                <td class="cell">
                                                    <span style="text-transform:lowercase;">{{ $data->email }}</span>
                                                </td>
                                                <td class="cell"><span>
                                                        <?php
                                                        if ($data->phone == '') {
                                                            echo $data->schoolphone;
                                                        } else {
                                                            echo $data->phone;
                                                        } ?>
                                                    </span></td>


                                                <td class="cell">

                                                    <?php if($data->Deleted_id == 3){ ?>
                                                       

                                                    <a class="btn btn-secondary" onclick="fun({{ $data->id }},'check')">

                                                        <img src="admin/hands.png" width="11px" alt="">


                                                        </a>
                                                            <?php }else{  ?>



                                                                <a class="btn btn-primary" onclick="fun({{ $data->id }},'check')">

                                                                    <img src="admin/hands.png" width="11px" alt="">
            
            
                                                                </a>
                                                            <?php } ?>




                                                </td>


                                                <td class="cell">
                                                    <a href="{{ route('viewsubg', 'user_id=' . $data->id) }}"
                                                        class="btn btn-primary">
                                                        <i class="fas fa-money-check-alt"></i>
                                                    </a>
                                                    <?php if($data->Deleted_id != 0){ ?>
                                                    <a onclick="fun({{ $data->id }},{{ $data->Deleted_id }})"
                                                        class="btn btn-primary">

                                                        <i class="fas fa-lock fa-1x"></i>

                                                        <?php }else{  ?>

                                                        <a onclick="fun({{ $data->id }},{{ $data->Deleted_id }})"
                                                            class="btn btn-primary">

                                                            <i class="fas fa-unlock fa-1x"></i>
                                                            <?php  } ?>
                                                        </a>
                                                </td>
                                                </form>
                                            </tr>
                                        @endforeach
                                    </table>
                                    <table class="table app-table-hover mb-0 text-left" id="schoollvc"
                                        style="display:none;">
                                        <tr>
                                            <th class="cell">Id</th>
                                            <th class="cell">User Name</th>
                                            <th class="cell">Email</th>
                                            <th class="cell">phone</th>
                                            <th class="cell">Action</th>
                                        </tr>
                                        <?php $i = 1; ?>
                                        @foreach ($management as $data)
                                            <tr>
                                                <?php
                                                if ($data->username == '') {
                                                    break;
                                                }
                                                ?>
                                                <td class="cell">{{ ++$i }}</td>
                                                <td class="cell">
                                                    <span>
                                                        <?php
                                                        if ($data->username == '') {
                                                            echo $data->school_name;
                                                        } else {
                                                            echo $data->username;
                                                        }
                                                        ?>

                                                    </span>
                                                </td>
                                                <td class="cell">
                                                    <span style="text-transform:lowercase;">{{ $data->email }}</span>
                                                </td>

                                                <td class="cell"><span>
                                                        <?php
                                                        if ($data->phone == '') {
                                                            echo $data->schoolphone;
                                                        } else {
                                                            echo $data->phone;
                                                        }
                                                        ?>

                                                    </span>
                                                </td>

                                                <td class="cell">
                                                    <a href="{{ route('viewsubg', $data->id) }}" class="btn btn-primary">
                                                        <i class="fas fa-money-check-alt"></i>
                                                    </a>


                                                    <?php if($data->Deleted_id != 0){ ?>
                                                    <a onclick="fun({{ $data->id }},{{ 0 }})"
                                                        class="btn btn-primary">

                                                        <i class="fas fa-lock fa-1x"></i>
                                                        <?php }else{  ?>

                                                        <a onclick="fun({{ $data->id }},{{ 1 }})"
                                                            class="btn btn-primary">
                                                            <i class="fas fa-unlock fa-1x"></i>

                                                            <?php  } ?>
                                                        </a>
                                                </td>
                                                </form>
                                            </tr>
                                        @endforeach
                                    </table>
                                    <table style="display:none;" class="table app-table-hover mb-0 text-left" id="teacherlvc">
                                        <tr>
                                            <th class="cell">Id</th>
                                            <th class="cell">User Name</th>
                                            <th class="cell">Email</th>
                                            <th class="cell">phone</th>
                                        </tr>
                                        <?php $i = 1; ?>
                                        @foreach ($management3 as $data)
                                            <tr>
                                             
                                                <td class="cell">{{ ++$i }}</td>
                                                <td class="cell">
                                                    <span>{{$data->fullname}} </span>
                                                </td>
                                                <td class="cell">
                                                    <span style="text-transform:lowercase;">{{ $data->email }}</span>
                                                </td>

                                                <td class="cell"><span>
                                                    {{$data->phone}} </span>
                                                </td>

                                                </form>
                                            </tr>
                                        @endforeach
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
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' type='text/javascript'></script>
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

                    <script>
                        function fun(va, con) {
                            console.log(con)
                            if (con == 'check') {

                                $.ajax({
                                    type: "GET",
                                    url: "{{ url('lockuser') }}/" + va + "?id=3",
                                    success: function(res) {
                                        if (res) {

                                            window.location.reload();
                                        } else {

                                            window.location.reload();
                                        }
                                    }
                                });

                            }


                            if (con == 2) {
                                var value = 'Unblock Block All';
                                var value1 = 'Only School';
                            } else if (con == 1) {
                                var value = 'Block All';
                                var value1 = 'Unblock Only School';
                            } else {
                                var value = 'Block All';
                                var value1 = 'Only School';
                            }

                            if (con != 'check') {
                            Swal.fire({
                                    title: 'Do you want to do Block all Student and Along With School',
                                    text: "Click below",
                                    type: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: value,
                                    cancelButtonText: value1
                                }



                            ).then((result) => {

                                if (result.value) {
                                    Swal.fire(
                                        'Done!',
                                        'Blocked all Student Along With school',
                                        'success'
                                    )

                                    $.ajax({
                                        type: "GET",
                                        url: "{{ url('lockuser') }}/" + va + "?id=0",
                                        success: function(res) {
                                            if (res) {

                                                window.location.reload();
                                            } else {

                                                window.location.reload();
                                            }
                                        }
                                    });

                                } else if (result.dismiss == "cancel") {
                                    Swal.fire(
                                        'Done!',
                                        'Blocked  only school',
                                        'success'
                                    )

                                    $.ajax({
                                        type: "GET",
                                        url: "{{ url('lockuser') }}/" + va + "?id=1",
                                        success: function(res) {
                                            if (res) {
                                                window.location.reload();
                                            } else {
                                                window.location.reload();
                                            }
                                        }
                                    });




                                }
                            })
                            }
                        }

                        function showDiv(selectrole) {
                            if (selectrole.value == "0") {
                                document.getElementById('show1').style.display = "none";
                                document.getElementById('show2').style.display = "inline";
                            } else if (selectrole.value == "") {
                                document.getElementById('show1').style.display = "none";
                                document.getElementById('show2').style.display = "none";
                            } else {
                                document.getElementById('show1').style.display = "inline";
                                document.getElementById('show2').style.display = "none";
                            }
                        }

                        function myfun1(color) {
                            document.getElementById('managementlvc').style.display = "";
                            document.getElementById('headmang1').style.display = "";
                            document.getElementById('schoollvc').style.display = "none";
                            document.getElementById('headmang2').style.display = "none";
                            document.getElementById('s2').style.background = "none";
                            document.getElementById('s1').style.background = color;
                            document.getElementById('teacherlvc').style.display = "none";
                            document.getElementById('s3').style.background = "none";
                        }

                        function myfun2(color) {
                            document.getElementById('s2').style.background = color;
                            document.getElementById('s1').style.background = "none";
                            document.getElementById('s3').style.background = "none";
                            document.getElementById('schoollvc').style.display = "";
                            document.getElementById('headmang2').style.display = "";
                            document.getElementById('teacherlvc').style.display = "none";
                            document.getElementById('managementlvc').style.display = "none";
                            document.getElementById('headmang1').style.display = "none";
                        }
                        function myfun3(color) {
                            document.getElementById('s1').style.background = "none";
                            document.getElementById('s3').style.background = color;
                            document.getElementById('s2').style.background = "none";
                            document.getElementById('schoollvc').style.display = "none";
                            document.getElementById('teacherlvc').style.display = "";
                            document.getElementById('managementlvc').style.display = "none";
                            document.getElementById('headmang2').style.display = "";
                            document.getElementById('headmang1').style.display = "none";
                        }
                    </script>
                @endsection
