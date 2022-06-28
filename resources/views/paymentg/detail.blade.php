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
                           <span id="headmang1"> school Histroy</span>
                        
                        </h1>
                    </div>
                                    <style>
                                        
                                        .cell {
                                            text-align: center;
                                        }
                                        .key{
                                           display:flex;
                                        }
                                        
                                        .key a{
                                            width:100%;
                                            padding:10px;
                                        }
                                        .key a:hover{
                                            background-color:rgb(231,231,231);
                                            color:greenyellow;
                                            font-size: 17px;
                                        }
                                       .table .app-table-hover .mb-0 .text-left{
                                            width:100% !important;
                                        }

                                     </style>

                                     <div class="col-auto">
                                     <div class="page-utilities">
                                      <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                                
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
                                <table class="table app-table-hover mb-0 text-left"  id="managementlvc">
                                       
                                            <tr>
                                                <th class="cell">Id</th>
                                                <th class="cell">School</th>
                                                <th class="cell">price</th>
                                                <th class="cell">from</th>
                                                <th class="cell">to</th>
                                            </tr>
                                        <?php $i = 1; ?>
                                         
                                   
                                        @foreach ($school as $data)
                                            <tr>
                                               <td class="cell">{{ $i++ }}</td>
                                                 <td class="cell">{{ $data->school_name }}</td>
                                                 <td class="cell">{{  $data->payment }}</td>
                                                 <td class="cell">{{  $data->paid_date }}</td>
                                                 <td class="cell">{{  $data->valid_date }}</td>
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


                    <script>
                             function fun(va){
                                if (confirm('Block all The Students along With School Admin Access?')) {
                                 $.ajax({
                                    type: "GET",
                                    url: "{{url('lockuser')}}/" + va+"?id=1",
                                    success: function(res){
                                        if (res){
                                          alert("success")
                                          window.location.reload(); 
                                        }else{
                                            alert("failure")
                                            window.location.reload(); 
                                        }
                                    }
                                   });

                                 console.log('Yes'); 
                                 }else{
                                 $.ajax({
                                    type: "GET",
                                    url: "{{url('lockuser')}}/" + va+"?id=0",
                                    success: function(res){
                                        if (res){
                                          alert("success")
                                          window.location.reload(); 
                                        }else{
                                            alert("failure")
                                            window.location.reload(); 
                                        }
                                    }
                                });


                                console.log('No');

                                 } 
                                 }



                        function showDiv(selectrole){

                            if(selectrole.value == "0"){

                                document.getElementById('show1').style.display = "none";
                                document.getElementById('show2').style.display = "inline";

                            }else if(selectrole.value == ""){

                                document.getElementById('show1').style.display = "none";
                                document.getElementById('show2').style.display = "none";

                            }else{

                                document.getElementById('show1').style.display = "inline";
                                document.getElementById('show2').style.display = "none";

                            }  
                            
                             }
                        
                        function myfun1(color){     

                            document.getElementById('managementlvc').style.display = "";
                            document.getElementById('headmang1').style.display = "";
                            document.getElementById('schoollvc').style.display = "none";
                            document.getElementById('headmang2').style.display = "none";
                            document.getElementById('s2').style.background = "none";
                            document.getElementById('s1').style.background = color ;

                        }
                    

                        function myfun2(color){

                                document.getElementById('s2').style.background = color;
                                document.getElementById('s1').style.background = "none" ;
                                document.getElementById('schoollvc').style.display = "";
                                document.getElementById('headmang2').style.display = "";
                                document.getElementById('managementlvc').style.display = "none";
                                document.getElementById('headmang1').style.display = "none";
                         }

                      

                       
                    </script>

                @endsection
