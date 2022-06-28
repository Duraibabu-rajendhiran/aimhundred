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
                            Add Time Slot
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
                                        .key{
                                         display:flex;
                                        }
                                        
                                        .key   a{
                                            width:100%;
                                            padding:10px;
                                        }
                                        .key a:hover{
                                            background-color:rgb(66, 87, 25);
                                            color:white;
                                            font-size: 17px;
                                        }
                                    </style>
                                </div>
                                
                                <button type="button" onMouseOver="this.style.color='#15A362'"
                                    onMouseOut="this.style.color='#676778'"
                                    style="border-radius:5px;padding:4px;background-color:white;border:1px solid #676778;;color:#676778; "
                                    class="col-auto" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    data-bs-whatever="@getbootstrap"><i class="fa fa-plus" aria-hidden="true"></i> Add Time Slot
                                </button>
                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add Time Slot</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('saveperiod') }}" method="POST">
                                                    @csrf
                                                    <div class="mb-3">

                                                       <?php if (empty(session('SchoolId'))){  ?>
                                                        <label for="recipient-name" class="col-form-label">Select
                                                            School</label>
                                                        <select name="school_id" id="" class="form-select">
                                                            <option value="">Select School</option>
                                                            @foreach ($school as $data)
                                                                <option value="{{ $data->id }}">{{ $data->school_name }}
                                                                </option>
                                                            @endforeach
                                                        </select>

<?php }else{ ?>
<input type="hidden" name="school_id" value="{{session('SchoolId')}}">

<?php } ?>

                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="recipient-name" class="col-form-label">period</label>
                                                        <label style="margin-left: 100px;" for="recipient-name" class="col-form-label">Start Time</label>
                                                        <label style="margin-left: 100px;" for="recipient-name" class="col-form-label">End  Time</label>
                                                        <br>
                                                        <input type="text" name="period[]" style="width:70px; text-align:center;" value="1" >
                                                  
                                                        <input type="time" name="start_time[]"
                                                            placeholder="Enter Start Time" style="margin-left: 50px;">
                                                        <input type="time" name="end_time[]"
                                                            placeholder="Enter Start Time" style="margin-left: 50px;">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="recipient-name" class="col-form-label">period</label>
                                                        <label style="margin-left: 100px;" for="recipient-name" class="col-form-label">Start Time</label>
                                                        <label style="margin-left: 100px;" for="recipient-name" class="col-form-label">End  Time</label>
                                                        <br>
                                                        <input type="text" name="period[]" style="width:70px; text-align:center;" value="2" >
                                                  
                                                        <input type="time" name="start_time[]"
                                                            placeholder="Enter Start Time" style="margin-left: 50px;">
                                                        <input type="time" name="end_time[]"
                                                            placeholder="Enter Start Time" style="margin-left: 50px;">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="recipient-name" class="col-form-label">period</label>
                                                        <label style="margin-left: 100px;" for="recipient-name" class="col-form-label">Start Time</label>
                                                        <label style="margin-left: 100px;" for="recipient-name" class="col-form-label">End  Time</label>
                                                        <br>
                                                        <input type="text" name="period[]" style="width:70px; text-align:center;" value="3" >
                                                  
                                                        <input type="time" name="start_time[]"
                                                            placeholder="Enter Start Time" style="margin-left: 50px;">
                                                        <input type="time" name="end_time[]"
                                                            placeholder="Enter Start Time" style="margin-left: 50px;">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="recipient-name" class="col-form-label">period</label>
                                                        <label style="margin-left: 100px;" for="recipient-name" class="col-form-label">Start Time</label>
                                                        <label style="margin-left: 100px;" for="recipient-name" class="col-form-label">End  Time</label>
                                                        <br>
                                                        <input type="text" name="period[]" style="width:70px; text-align:center;" value="4" >
                                                  
                                                        <input type="time" name="start_time[]"
                                                            placeholder="Enter Start Time" style="margin-left: 50px;">
                                                        <input type="time" name="end_time[]"
                                                            placeholder="Enter Start Time" style="margin-left: 50px;">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="recipient-name" class="col-form-label">period</label>
                                                        <label style="margin-left: 100px;" for="recipient-name" class="col-form-label">Start Time</label>
                                                        <label style="margin-left: 100px;" for="recipient-name" class="col-form-label">End  Time</label>
                                                        <br>
                                                        <input type="text" name="period[]" style="width:70px; text-align:center;" value="5" >
                                                  
                                                        <input type="time" name="start_time[]"
                                                            placeholder="Enter Start Time" style="margin-left: 50px;">
                                                        <input type="time" name="end_time[]"
                                                            placeholder="Enter Start Time" style="margin-left: 50px;">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="recipient-name" class="col-form-label">period</label>
                                                        <label style="margin-left: 100px;" for="recipient-name" class="col-form-label">Start Time</label>
                                                        <label style="margin-left: 100px;" for="recipient-name" class="col-form-label">End  Time</label>
                                                        <br>
                                                        <input type="text" name="period[]" style="width:70px; text-align:center;" value="6" >
                                                  
                                                        <input type="time" name="start_time[]"
                                                            placeholder="Enter Start Time" style="margin-left: 50px;">
                                                        <input type="time" name="end_time[]"
                                                            placeholder="Enter Start Time" style="margin-left: 50px;">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="recipient-name" class="col-form-label">period</label>
                                                        <label style="margin-left: 100px;" for="recipient-name" class="col-form-label">Start Time</label>
                                                        <label style="margin-left: 100px;" for="recipient-name" class="col-form-label">End  Time</label>
                                                        <br>
                                                        <input type="text" name="period[]" style="width:70px; text-align:center;" value="7" >
                                                  
                                                        <input type="time" name="start_time[]"
                                                            placeholder="Enter Start Time" style="margin-left: 50px;">
                                                        <input type="time" name="end_time[]"
                                                            placeholder="Enter Start Time" style="margin-left: 50px;">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="recipient-name" class="col-form-label">period</label>
                                                        <label style="margin-left: 100px;" for="recipient-name" class="col-form-label">Start Time</label>
                                                        <label style="margin-left: 100px;" for="recipient-name" class="col-form-label">End  Time</label>
                                                        <br>
                                                        <input type="text" name="period[]" style="width:70px; text-align:center;" value="8" >
                                                  
                                                        <input type="time" name="start_time[]"
                                                            placeholder="Enter Start Time" style="margin-left: 50px;">
                                                        <input type="time" name="end_time[]"
                                                            placeholder="Enter Start Time" style="margin-left: 50px;">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="recipient-name" class="col-form-label">period</label>
                                                        <label style="margin-left: 100px;" for="recipient-name" class="col-form-label">Start Time</label>
                                                        <label style="margin-left: 100px;" for="recipient-name" class="col-form-label">End  Time</label>
                                                        <br>
                                                        <input type="text" name="period[]" style="width:70px; text-align:center;" value="9" >
                                                  
                                                        <input type="time" name="start_time[]"
                                                            placeholder="Enter Start Time" style="margin-left: 50px;">
                                                        <input type="time" name="end_time[]"
                                                            placeholder="Enter Start Time" style="margin-left: 50px;">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="recipient-name" class="col-form-label">period</label>
                                                        <label style="margin-left: 100px;" for="recipient-name" class="col-form-label">Start Time</label>
                                                        <label style="margin-left: 100px;" for="recipient-name" class="col-form-label">End  Time</label>
                                                        <br>
                                                        <input type="text" name="period[]" style="width:70px; text-align:center;" value="10" >
                                                  
                                                        <input type="time" name="start_time[]"
                                                            placeholder="Enter Start Time" style="margin-left: 50px;">
                                                        <input type="time" name="end_time[]"
                                                            placeholder="Enter Start Time" style="margin-left: 50px;">
                                                    </div>
    
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button"  data-bs-dismiss="modal"
                                                aria-label="Close" class="btn btn-secondary">Close</button>
                                                <button type="submit" name="submit" class="btn btn-primary">Save</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
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


                                    <div class="key">
                                        <a href="timetable" style="background-color:rgb(66, 87, 25);
                                        color:white;
                                        font-size: 17px;" class="cell">Time Slot</a>
                                        <a href="settime" class="cell">Time Table</a>
                                    </div>
                                  
                                    <table class="table app-table-hover mb-0 text-left">
                                        <thead>
                                            <tr>
                                                <th class="cell">Id</th>
                                                <th class="cell">School</th>
                                                <th class="cell">Total Period</th>
                                                <th class="cell">View</th>
                                            </tr>
                                            <?php $i = 0; ?>
                                            @foreach ($userdata as $key => $value)
                                            <tr>
                                                    <td>{{ ++$i }}</td>
                                                    <td>{{ $key }}</td>
                                                    <td>{{ sizeof($value) }}</td>
                                                  
                                                    <td><a href="{{ url('/viwetimet', $key) }}" class="btn btn-primary">view</a></td>
                                                </tr>
                                                @endforeach
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                @endsection
