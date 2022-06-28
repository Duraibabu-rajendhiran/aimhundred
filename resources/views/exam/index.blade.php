@extends('layouts.master')
@section('content')

    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0">
                            <img width="35px" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFAAAABQCAYAAACOEfKtAAAABmJLR0QA/wD/AP+gvaeTAAADO0lEQVR4nO2bv24TQRCHvyDkFCQSEiENPAE1LQpBoYAGJcprgEARCqECEhDPkgYELaJBkZIIAlRpoKMPcaAACUwxezrruD9rz57v1p5PWp3v/LvzeDzenZ29A8MwDMMwDMMwGmUe2AQ+Aj9cOwCeAOcbtCsKVoEu0Ctox8BKY9a1nFXgL+KoF8ACcMa1q8BL994fYLkhG1vLPGnk3S/RrTvNd2BuBHZFwyZp5FXxymkf12pRZHxCnLLgoV102oNaLYqME8QpMx7aWaft1mrRiDmlPL83gHZqiHNaj9aBX932soc20XxRfmar0Drwtdve9dDey5xjIDOMY+RvuV6i23CaI+DcCOyKihUkSe4hqcoiMqjMANeQiEsS6VsN2dh6lpEkuWgqd4Q5r5I5JEn+gKQ3XeA98Aj72xpGS5gGbgO7SL0v29cdAp0+fccdK+obNe0XsA/cLLA1xGcE5QLp3Les9acz6x76EC3Pia1y4DSp8w6REXU2o1ly758AF11L5spLIY1xdIAH7vp7NVw/KHdInXe2RLftdNuZ13URTYFiDzG0Kpfrj7r+aKyDDvCQ4gjcAd4p9r047am75LZvK3TfgC3gudvfcsf6Cd0595BcM0uyzDDsflAG6VSTkTc7ImevFWIU3gVuDPOFQuEbgXnsIL/alczx30iqk7wuYqrkvWjQOLAs5N8orjuWhMyLaklSm0JbUJ14NA4catgfNzQOrHXYjwXfkTBxVIiR0+daRT9M9py6f8DK72t9oJI68sCQVK0lN55LWh84IkadB/rW57QFA3VBIfY+UFswGFlBIS8Chs0DbSbisD5wAGwuXIBvBCZlqaS+N40sGJXdD2P0sY9EzQZyz0tSSh8mksYqAn25TtrnaZf+JtKBIGuve8BP5P4XcyC6qVBeUcBnymXFBCNFU0woI9QN5WNdTDBovwOrBhwrJiiJppiQR150ZI/5aKIm9ghsHHOgEnOgEnOgEnOgEnOgkrqmclqsmDAptDUCE8a6mJC3TgJy7/IgmqjROPCz264h6yRrmeO+mjLGupiQPFrwDHke5Cn/P3Lgo9EQdTEB0nWSE4ofOfDRGIZhGIZhGIYxSfwDrsahyU2qxIUAAAAASUVORK5CYII="/>
                      Exam</h1>
                             </div>
                    <div class="col-auto">
                        <div class="page-utilities">
                            <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                                <div class="col-auto">
                                    
                                </div>
                                <!--//col-->
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
                                                <th class="cell">class</th>
                                         
                                                <th class="cell">Action</th>
                                            </tr>
                                        </thead>
                                        
                                    <?Php if(isset($management)){ ?>
                                        <?php $i = 1; ?>
                                         <tbody id="view1">
                                            @foreach ($management as $data)
                                                <tr >
                                                    <td class="cell">{{ $i++ }}</td>
                                                    {{-- <td class="cell">{{  date("d-m-Y", strtotime($data->date)) }}</td> --}}
                                                    <td class="cell">{{  $data->title }}</td>
                                                    <td class="cell"><a href="getdate/{{$data->title}}" class="btn">
                                                    View
                                                    </a></td>
                                                 </tr>
                                            @endforeach
                                             </tbody>
                                    <?php } ?>
                                    </table>
                                </div>
                                <!--//table-responsive-->
                            </div>
                        </div>
                    </div>
                
                @endsection
