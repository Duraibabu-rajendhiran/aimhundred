@extends('layouts.master')
@section('content')
    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-auto" style="display:inline;">
                        <h1 class="app-page-title mb-0">
                            <img width="30px"  src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAABmJLR0QA/wD/AP+gvaeTAAAE8UlEQVR4nO3ae+zVYxzA8VcllZ+UilrktinNJbksa9gSuZRlc2uiNSuiZmTLZYYNscSQFGKuc0la1BbZtMJKobSRGRsbjQiZyybyx+d7/E7tdy6/7/mec/rpvLez8332fb6f5/l+vp/n83yez/PQoEGDBg0a7La0q2Pb++Dq5PoRbK1HJ9rXo9GEZ/A9NuOpOvajbqwucF1T6mkBuwSlfEBPzMDRslfWEdjYwnVWbMd63IAf0wqZhYvU11lWwsV4qFiFUl+1M7YIbbZFtoh3KEipL3sAHhdD4LuMOlUremMDJuDbSgT1xcIselRjFoq+F2WPGnQka05BnyL3l+HncoWlUUAvTJXNrLAdD+ObVjxzIA4qcr+LKitgAPpjbopnd2YcBmmdAk7AMUXuv4ZN5QpLOwS+xlspn83n5BTP3KK4Z/+pNcLaog/4I/llQhoF/IgzsDaD9jvh9QzkpCaNAjaKuOB/QRoFtMPByp8FtuKHFO3kcxh6CKtrj30TuX9VKDeVAvrgHuUrYD3uStEO4exmYWDS3ssYLyK7HmK6ewBLU8pPpYBNGJNX3kuM5UL8maINwtLmi5ebiLeFh1+E25I6AzAdozEFf7e2kSxmgek4ssj9Nbg5hdxL8AVmJ+V3xAsO06yAz3A+7sPdmJainZLUay2wDPvnlYdjJlaIfGI+7YSl5H+Imq0FHsNxRe6vxHUp5HYTOcMcf4h1wBvCChbl3duO+3E5rm9NI1ko4IoMZLREOxH2XiDijo24VSjiQjsqAN6VYqilUUBuSHRI8WyO73FOiTprMBkLRFpuCEYIK1jZQv3fxEIoc+qZD5gg1hzvial3uMLrgD5Ykleumg/oK/L4leQJfxGmXYoRuFeM+1KMFo4zc+ppAUPES5UKurrjA+E4c1TVAir1AZtxdhn1VmMVnhDDoaVAp5sImG4VlpU5u0JOcBo+xKU4FB2T/yniy49s4Zm6WcA4fJJCbjFm4EWxDhgrTP4rERQNU+WN1V3BAtJQlgXs9nuD5QyBDmgSa/K2RJMyHHWpuXyoWI19nkWP6sDhIpp8L62AF8TObVtloHiHgpQaAusxCYuz6lGNORfrilUoNQTai8TEURV2pDvO03wUZmQiO5cRHiXm9txsM1ZEgPnL4TRsEBbwT4VyKmae5ti/P77E83n3nxV+JrfjcxZeqkXHajENnoaueCVpb66W1+1T8aiwhKX4XaS72jRNYl3fOylfgzuEd97ZAvrjpuRHxPhrRfa3zTJbxO9wiFBGZ4UVsIdIfuZye6PwdDU7WM0hMBT98JxwtnNwreJp8m3i8OQcEcQsxp5ird+m6CLMt19SnigyujkKWUCO2zUnUnvhIzGTZE61Tn/NFEnMeeKc0Qo7blt3wsdiuiMUMNiO1tETp4u9gTFi1XdllfqbKUPwpmblvopTd6pTygLgWBEL5OQsECmyTMnaB3QS5/KuErn6y8TpjxUpZK0Tw2hSUp4sEqN7V97N6nGnyNLAfsLrd22hXjkWQCj0fc0r0fF4MJOeVoFBWK7ZqubjzAJ1y1UAnCSywrmhsETsDWRCVkdkOuJJ4fwG40SRpiqWzu6B45PrnkXqrcKnIlJcLhzr3OTZtDvP/5HVLNBdnAHIKfRPsYNb6LhaV7Gb2zEpb8ON+LVA/SYRQTYl5X+SckUnQBs0aNCgQYPdnH8BtkPnN5mgDCQAAAAASUVORK5CYII=" />
                            Add Time Table
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

                                        td input[type=text] {
                                            padding: 2px;
                                            border: 0;
                                            box-shadow: 0 0 15px 4px rgba(0, 0, 0, 0.06);
                                            text-align: center;
                                            color: Rgb(158, 103, 120);
                                        }
                                    </style>
                                </div>    
                            </div>
                        </div>
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
                         
                                    <div style="margin-top: 25px;"></div>
                                    <table class="table app-table-hover mb-0 text-left">
                                        <thead>
                                            <tr>
                                                <th class="cell">Id</th>
                                                <th class="cell">Period</th>
                                                <th class="cell">Start time</th>
                                                <th class="cell">End Time</th>
                                                <th class="cell">View</th>
                                                <th class="cell">Delete</th>
                                            </tr>
                                            <?php $i = 0; ?>
                                        
                                                @foreach ($timetable as $key)


                                                <form action="{{route('savetimeupdate',$key->id)}}" method="POST">
@csrf
@method('PUT')
<tr>
    
                                                    <td>{{ ++$i }}</td>
                                                    <td><input type="text" name="period" value="{{ $key->period }}"style="width:28px;"> Period</td>
                                                    <td><input type="text" name="start_time" value="{{ $key->start_time }}"></td>
                                                    <td><input type="text"  name="end_time" value="{{ $key->end_time }}"></td>
                                                    <input type="hidden" name="id" value="{{$key->id}}">
                                                    <td><button type="submit" class="btn btn-primary"><li class="fas fa-upload"></li></button></td>
                                                    <td><a href="{{route('slotsdelete',$key->id)}}" class="btn btn-danger"><li class="fas fa-times"></li></a></td>
                                                </form>
                                            </tr>
                                                @endforeach
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                                <!--//table-responsive-->
                            </div>
                           
                        </div>
                    </div>
                @endsection
