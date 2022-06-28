@extends('layouts.master')
@section('content')

    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0">
                            <img width="35px" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFAAAABQCAYAAACOEfKtAAAABmJLR0QA/wD/AP+gvaeTAAADO0lEQVR4nO2bv24TQRCHvyDkFCQSEiENPAE1LQpBoYAGJcprgEARCqECEhDPkgYELaJBkZIIAlRpoKMPcaAACUwxezrruD9rz57v1p5PWp3v/LvzeDzenZ29A8MwDMMwDMMwGmUe2AQ+Aj9cOwCeAOcbtCsKVoEu0Ctox8BKY9a1nFXgL+KoF8ACcMa1q8BL994fYLkhG1vLPGnk3S/RrTvNd2BuBHZFwyZp5FXxymkf12pRZHxCnLLgoV102oNaLYqME8QpMx7aWaft1mrRiDmlPL83gHZqiHNaj9aBX932soc20XxRfmar0Drwtdve9dDey5xjIDOMY+RvuV6i23CaI+DcCOyKihUkSe4hqcoiMqjMANeQiEsS6VsN2dh6lpEkuWgqd4Q5r5I5JEn+gKQ3XeA98Aj72xpGS5gGbgO7SL0v29cdAp0+fccdK+obNe0XsA/cLLA1xGcE5QLp3Les9acz6x76EC3Pia1y4DSp8w6REXU2o1ly758AF11L5spLIY1xdIAH7vp7NVw/KHdInXe2RLftdNuZ13URTYFiDzG0Kpfrj7r+aKyDDvCQ4gjcAd4p9r047am75LZvK3TfgC3gudvfcsf6Cd0595BcM0uyzDDsflAG6VSTkTc7ImevFWIU3gVuDPOFQuEbgXnsIL/alczx30iqk7wuYqrkvWjQOLAs5N8orjuWhMyLaklSm0JbUJ14NA4catgfNzQOrHXYjwXfkTBxVIiR0+daRT9M9py6f8DK72t9oJI68sCQVK0lN55LWh84IkadB/rW57QFA3VBIfY+UFswGFlBIS8Chs0DbSbisD5wAGwuXIBvBCZlqaS+N40sGJXdD2P0sY9EzQZyz0tSSh8mksYqAn25TtrnaZf+JtKBIGuve8BP5P4XcyC6qVBeUcBnymXFBCNFU0woI9QN5WNdTDBovwOrBhwrJiiJppiQR150ZI/5aKIm9ghsHHOgEnOgEnOgEnOgEnOgkrqmclqsmDAptDUCE8a6mJC3TgJy7/IgmqjROPCz264h6yRrmeO+mjLGupiQPFrwDHke5Cn/P3Lgo9EQdTEB0nWSE4ofOfDRGIZhGIZhGIYxSfwDrsahyU2qxIUAAAAASUVORK5CYII="/>Add Teacher</h1>
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
        
                                        @if ($errors->any())

                                        <?php   
                                    echo '<script type ="text/JavaScript">';  
                                    echo 'alert("'.$errors->first().'")';  
                                    echo '</script>';  
                                    ?>  	
                                            @endif
        
                                        <button type="button" onMouseOver="this.style.color='#15A362'"
                                            onMouseOut="this.style.color='#676778'"
                                            style="border-radius:5px;padding:4px;background-color:white;border:1px solid #676778;;color:#676778; "
                                            class="col-auto" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                            data-bs-whatever="@getbootstrap"><i class="fa fa-plus" aria-hidden="true"></i> Add  Teacher</button>
        
                                        <div class="modal fade" id="exampleModal" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Add Teacher</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
        
                                                        <form action="{{route('addteacher')}}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="role" value="0" class="form-control"
                                                            id="recipient-name">
                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">Full
                                                                Name</label>
                                                            <input type="text" name="fullname" class="form-control"
                                                                id="recipient-name">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">Email</label>
                                                            <input type="email" style="text-transform:lowercase;"
                                                            name="email" class="form-control" id="recipient-name" />
                                                        </div>
                                                        <div class="mb-3">
                                                        
                                                            <input type="hidden" style="text-transform:lowercase;"
                                                            name="school_id" value={{session('SchoolId')}} class="form-control" id="recipient-name">
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
                    
                </div>
                           <style>
                           
                                        .cell {
                                            text-align: center;
                                        }
                                        .key{
                                           display:flex;
                                        }
                                        
                                        .key   a{
                                            width:100%;
                                            padding:10px;
                                        }
                                        .key a:hover{
                                            background-color:rgb(231,231,231);
                                            color:yellowgreen;
                                            font-size: 17px;
                                        }
                                       .table .app-table-hover .mb-0 .text-left{
                                            width:100% !important;
                                        }
                                    </style>
               
             
              
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
                                                <th class="cell">user name</th>
                                                <th class="cell">Email</th>
                                                <th class="cell">phone</th>
                                                <th class="cell">Delete</th>
                                            </tr>
                                        </thead>
                                        
                                    <?Php if(isset($management)){ ?>
                                        <?php $i = 1; ?>
                                         <tbody id="view1">
                                            @foreach ($management as $data)
                                                <tr >
                                                    <td class="cell">{{ $i++ }}</td>
                                                    <td class="cell">{{ $data->fullname }}</td>
                                                    <td class="cell">{{ $data->email }}</td>
                                                    <td class="cell">{{ $data->phone }}</td>
                                                    <td class="cell">
                                                        <a  href="{{route('teacherDelete',$data->id)}}" onclick="return confirm('you want to delete?');" class="btn btn-danger"><i class="fas fa-trash"></i></a></td>
                                                    </td>
                                                 
                                                 </tr>
                                            @endforeach
                                             </tbody>
                                    <?php } ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                
                @endsection
