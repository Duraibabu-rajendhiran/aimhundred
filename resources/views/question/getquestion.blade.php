@extends('layouts.master')

@section('content')

    <style>
        p {
            border: 1px solid gray;
        }

        div p:first-child {
            color: greenyellow;
            font-weight: bold;
            background-color: green;
            text-align: center;
        }


        .container {
            
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
            grid-template-rows: 1fr;
            grid-auto-columns: 1fr;
            gap: 0px 0px;
            grid-auto-flow: row;
            grid-template-areas:
                "one two three four five";
        }

        .one {
            grid-area: one;
        }

        .two {
            grid-area: two;
        }

        .three {
            grid-area: three;
        }

        .four {
            grid-area: four;
        }

        .five {
            grid-area: five;
        }


        input[type="date"]::-webkit-datetime-edit, input[type="date"]::-webkit-inner-spin-button, input[type="date"]::-webkit-clear-button {
  color: #fff;
  position: relative;
}

input[type="date"]::-webkit-datetime-edit-year-field{
  position: absolute !important;
  border-left:1px solid #8c8c8c;
  padding: 2px;
  color:#000;
  left: 50px;
}

input[type="date"]::-webkit-datetime-edit-month-field{
  position: absolute !important;
  border-left:1px solid #8c8c8c;
  padding: 2px;
  color:#000;
  left: 30px;
}

input[type="date"]::-webkit-datetime-edit-day-field{
  position: absolute !important;
  color:#000;
  padding: 2px;
  left: 8px;
  
}
    
</style>
    <?php
    $no_of_question = session('no_question') + 1;
    ?>


    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-auto">
                      <h1 class="app-page-title mb-0">Questions List</h1>
                    </div>
                    <div class="col-auto">
                        <div class="page-utilities">
                            <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                                <div class="col-auto">
                                    <form class="table-search-form row gx-1 align-items-center">
                                        <div class="col-auto">
                                            <input type="text" id="search-orders" name="searchorders"
                                                class="form-control search-orders" placeholder="Search">
                                        </div>
                                        <div class="col-auto">
                                            <button type="submit" class="btn app-btn-secondary">Search</button>
                                        </div>
                                    </form>
                                </div>
                            
                            </div>
                        </div>
                    </div>
                   
                </div>
             
            </div>

            <div class="tab-content" id="orders-table-tab-content">
                <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                    <div class="app-card app-card-orders-table shadow-sm mb-5">
                        <div class="app-card-body">
                            <div class="table-responsive">
                                <form action="{{ route('examquestion') }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <div class="container">
                                        <div class="one">
                                            <p>Question 1</p>

                                            <?php $i = 1; ?>
                                            @foreach ($question1 as $data)
                                                <?php $i++; ?>
                                                <input type="hidden" name="day1[]" value="{{ $data->id }}">
                                                <p>
                                                    
                                                    <?php 
                                                    if(!empty($data->title)){ ?>
                                                    {{ $data->title }}
                                                    <?php
                                                    }else{  ?>
                                                    <a
                                                        href="{{ URL::asset('questions') }}/{{ $data->question_image }}">
                                                        <img src="{{ URL::asset('questions') }}/{{ $data->question_image }}"
                                                            width="40px" alt=""></a>
                                                    <?php  }
                                                    ?>
                                                
                                                </p>
                                                <?php
                                          if ($i == $no_of_question) {   ?>
                                            @break
                                            <?php   } ?>
                                            @endforeach
                                            <?php
                                            
                                            $date = session('date');
                                            ?>
                                            <input style="font-size:10px;" name="date1" value="{{ $date }}"
                                                type="date">
                                        </div>
                                        <div class="two">
                                            <p>Question 2</p>
                                            <?php $i = 1; ?>
                                            @foreach ($question2 as $data)
                                                <?php $i++; ?>
                                                <input type="hidden" name="day2[]" value="{{ $data->id }}">
                                                <p>       <?php 
                                                    if(!empty($data->title)){ ?>
                                                    {{ $data->title }}
                                                    <?php
                                                    }else{  ?>
                                                    <a
                                                        href="{{ URL::asset('questions') }}/{{ $data->question_image }}">
                                                        <img src="{{ URL::asset('questions') }}/{{ $data->question_image }}"
                                                            width="40px" alt=""></a>
                                                    <?php  }
                                                    ?></p>
                                                <?php
                                        if ($i == $no_of_question) { ?>
                                            @break
                                            <?php   } ?>
                                            @endforeach
                                            <?php
                                            $date2 = date('Y-m-d', strtotime($date . ' +1 day'));
                                            ?>
                                            <input style="font-size:10px;" name="date2" value="{{ $date2 }}"
                                                type="date">

                                        </div>
                                        <div class="three">
                                            <p>Question 3</p>
                                            <?php $i = 1; ?>
                                            @foreach ($question3 as $data)
                                                <?php $i++; ?>
                                                <input type="hidden" name="day3[]" value="{{ $data->id }}">
                                                <p>       <?php 
                                                    if(!empty($data->title)){ ?>
                                                    {{ $data->title }}
                                                    <?php
                                                    }else{  ?>
                                                    <a
                                                        href="{{ URL::asset('questions') }}/{{ $data->question_image }}">
                                                        <img src="{{ URL::asset('questions') }}/{{ $data->question_image }}"
                                                            width="40px" alt=""></a>
                                                    <?php  }
                                                    ?></p>
                                                <?php
                                                if ($i == $no_of_question) {   ?>
                                            @break
                                            <?php   } ?>
                                            @endforeach
                                            <?php
                                            $date3 = date('Y-m-d', strtotime($date . ' +2 day'));
                                            ?>
                                            <input style="font-size:10px;" name="date3" value="{{ $date3 }}"
                                                type="date">

                                        </div>
                                        <div class="four">
                                            <p>Question 4</p>

                                            <?php if ($no_of_question <= sizeof($question4)) {
                                                     ?>
                                            <?php $i = 1; ?>
                                            @foreach ($question4 as $data)
                                                <?php $i++; ?>
                                                <input type="hidden" name="day4[]" value="{{ $data->id }}">
                                                <p>       <?php 
                                                    if(!empty($data->title)){ ?>
                                                    {{ $data->title }}
                                                    <?php
                                                    }else{  ?>
                                                    <a
                                                        href="{{ URL::asset('questions') }}/{{ $data->question_image }}">
                                                        <img src="{{ URL::asset('questions') }}/{{ $data->question_image }}"
                                                            width="40px" alt=""></a>
                                                    <?php  }
                                                    ?></p>
                                                <?php
                                           if ($i == $no_of_question) { ?>
                                            @break
                                            <?php   } ?>
                                            @endforeach
                                            <?php } else {
                      $i = 1; ?>
                                            @foreach ($random2 as $data)
                                                <?php
                                                $i++; ?>
                                                <input type="hidden" name="day4[]" value="{{ $data->id }}">
                                                <p>       <?php 
                                                    if(!empty($data->title)){ ?>
                                                    {{ $data->title }}
                                                    <?php
                                                    }else{  ?>
                                                    <a
                                                        href="{{ URL::asset('questions') }}/{{ $data->question_image }}">
                                                        <img src="{{ URL::asset('questions') }}/{{ $data->question_image }}"
                                                            width="40px" alt=""></a>
                                                    <?php  }
                                                    ?></p>
                                                <?php
                      if ($i == $no_of_question) {   ?>
                                            @break
                                            <?php } ?>
                                            @endforeach
                                            <?php } ?>
                                            <?php
                                            $date4 = date('Y-m-d', strtotime($date . ' +3 day'));
                                            ?>
                                            <input style="font-size:10px;" name="date4" value="{{ $date4 }}"
                                                type="date">

                                        </div>
                                        <div class="five">
                                            <p>Question 5</p>
                                            <?php if ($no_of_question < sizeof($question4)) {
                    ?>
                                            <?php $i = 1; ?>
                                            @foreach ($question5 as $data)
                                                <?php $i++; ?>
                                                <input type="hidden" name="day5[]" value="{{ $data->id }}">
                                                <p>       <?php 
                                                    if(!empty($data->title)){ ?>
                                                    {{ $data->title }}
                                                    <?php
                                                    }else{  ?>
                                                    <a
                                                        href="{{ URL::asset('questions') }}/{{ $data->question_image }}">
                                                        <img src="{{ URL::asset('questions') }}/{{ $data->question_image }}"
                                                            width="40px" alt=""></a>
                                                    <?php  }
                                                    ?></p>
                                                <?php
                                                 if ($i == $no_of_question) {   ?>
                                            @break
                                            <?php   } ?>
                                            @endforeach
                                            <?php } else {
                                                  $i = 1; ?>
                                            @foreach ($random3 as $data)
                                                <?php $i++; ?>

                                                <input type="hidden" name="day5[]" value="{{ $data->id }}">
                                                <p>       <?php 
                                                    if(!empty($data->title)){ ?>
                                                    {{ $data->title }}
                                                    <?php
                                                    }else{  ?>
                                                    <a
                                                        href="{{ URL::asset('questions') }}/{{ $data->question_image }}">
                                                        <img src="{{ URL::asset('questions') }}/{{ $data->question_image }}"
                                                            width="40px" alt=""></a>
                                                    <?php  }
                                                    ?></p>
                                                <?php
                                              if ($i == $no_of_question) {   ?>
                                            @break
                                            <?php } ?>
                                            @endforeach
                                            <?php } ?>
                                            <?php
                                            $date5 = date('Y-m-d', strtotime($date . ' +4 day'));
                                            ?>
                                            <input style="font-size:10px;" name="date5" value="{{ $date5 }}"
                                                type="date">
                                        </div>
                                    </div>

                                    <div style="margin-left:30%; margin-top:2%; border-radius:2px;"><button
                                            type="submit">submit</button></div>

                                </form>

                                </tbody>
                                </table>

                            </div>
                         
                        </div>
                      
                    </div>
             
                </div>

            @endsection
