@extends('layouts.master')
@section('content')

    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    </head>

    <body>

        <style>
            table {
                width: 100% !important;
            }

            div .import {
                display: flex !important;
                justify-content: space-around !important;
            }

        </style>

        <div class="app-wrapper">
            <div class="app-content pt-3 p-md-3 p-lg-4">
                <div class="container-xl">

                    <div class="row g-3 mb-4 align-items-center justify-content-between">
                        <div class="col-auto">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            <form action="{{ route('checkquestion') }}" method="GET">
                                @csrf
                                @method('GET')
                                <h2> <img width="40px"
                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFAAAABQCAYAAACOEfKtAAAABmJLR0QA/wD/AP+gvaeTAAADC0lEQVR4nO2av2sUQRTHPxevSKMoYkLAwsLGQhHUKBG1CPFHI4hgKYhg6d/iH5FOCwuJImjhJfESFNGAglhbiigqGEws9i03d+TudndmM2/u3geWuZ2defvu7bzv7M4uGIZhGIZhGIax62wr2j4BM/X+3fDEDlryQcwdj02yQdQWwA2nnIrqUUH6BXAFaEXwY4rEgtgvgC3gVSQ/kgqithTOOQR8IAFN1BpASCSI2jSwF/XprFEDe1EdRM0p7KI2nVMJICgNonYN7EVdOqeggb2oCqK2FK6ybficuOHTmU7wfO344nsRo/mvRQOr4p1BE4Ec6WULHamtHi0aWBW1I3BsqCuAqWigN1o1cA/ZBXgexh291KWBtx3bR2qwnxNdw+twoAF8dGzfCmzfRe0k4qOBC8AxZ3/W35360KiB96V8K+UZf3f0EjqFjwL/gL/ACbIL8QtoBjyHy8hp4AOxtyj7n2X/eMBzuKgNYBUNnAS+ib3TUrco+3dL2FkDXhdsq3YSqaKB14EDQBt4I3VtKc+XsDMLnCt57miETIElsXXPqTspdV9q8kltCpdlGtgEfgP7nfoJOml9uAaf1KZwWQ28QTbTPgG+O/VbwLL8vtinb4vuFeYct66253ItGnhTykc7HMvfrVzy8EftkluIFD5Ilr5/gL07HD9L51VkaJ9GQgPviI3HfY43gZ9ko3o6sE9qA1hGAx/SrVeDtiILCyMxiRTVwCYwX8Lu1QJtlkloMdf3Cs5J/3dD2uX3g18J+wpS7QgsyhUpXwxp954seDNkiwxqiH0fuCDlyyHttoFn8vtaVafqIKYGTgKnyG5hinxH81RKVQH0xUdDLkjf9YLt95GtE27S/bjnQ9IaOCdl0aWnH9K27MxdKzE1MF9yWithd0lKNWkcUwPzALYHtuom18HLpT1Sio+GrNBZaSlKA1il3KgdhNpHuVRQO4nYtzGe2PeBBbEUDuTI2GIa6IlpYGRMAwM5MraYBnpiGhgZ08BAjowtob78THkUemEj0DAMwzAMwzCM3ec/446WDpkEF6IAAAAASUVORK5CYII=" />
                                    Question Management</h2>
                                <div class="form-group">
                                    <div class="import">
                                        <div>
                                            <label for="country">board:</label><br>
                                            <select id="bo" name="board" class="form-control" onchange='saveValue(this)' ;
                                                required>
                                                <option value="" selected disabled>Select Board</option>
                                                @foreach ($boards as $key)
                                                    <option value="{{ $key->id }}"> {{ $key->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div>
                                            <label for="medium">Class:</label><br>
                                            <select name="class" id="cl" class="form-control" onchange='saveValue(this)' ;
                                                required>
                                                <option value="">Select Class</option>
                                                @foreach ($class as $key)
                                                    <option value="{{ $key->id }}"> {{ $key->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div>
                                            <label for="medium">Medium:</label><br>
                                            <select name="medium" id="med" class="form-control" onchange='saveValue(this)'
                                                ; required>
                                                <option value="">Select Medium</option>
                                                @foreach ($medium as $key)
                                                    <option value="{{ $key->id }}"> {{ $key->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <p></p>

                                        <button style="margin:5%;" type="submit" name="submit"
                                            class="btn btn-success">Next</button>

                                    </div>
                            </form>

                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="page-utilities">
                            <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                                <style>
                                    input {
                                        text-transform: capitalize;
                                    }

                                </style>
                            </div>
                        </div>
                    </div>
                </div>


                <?php
                
                $date_i = date('Y/m/d');
                $date1 = date('Y-m-d', strtotime($date_i . ' +0 day'));
                
                ?>
                <div class="tab-content" id="orders-table-tab-content">
                    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                        <div class="app-card app-card-orders-table shadow-sm mb-5">
                            <div class="app-card-body">
                                <div class="table-responsive">
                                    <?php if(isset($question_array)){  ?>
                                    <table class="table app-table-hover mb-0 text-left">
                                        <thead>
                                            <tr>
                                                <th class="cell">Id</th>
                                                <th class="cell">Subject</th>
                                                <th class="cell">perweek</th>
                                                <th class="cell">Total Questions </th>
                                                <th class="cell">Time Limit</th>
                                                <th class="cell">No OF Question</th>
                                                <th class="cell">Delete</th>
                                                <th class="cell">Action</th>
                                                <th class="cell">Upload</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $i = 1; ?>
                                            @foreach ($subjects as $data)
                                                <tr>
                                                    <td class="cell">{{ $i++ }}</td>
                                                    <td class="cell"><span
                                                            class="truncate">{{ $data->subject }}</span>
                                                        <?php
                                                        $array = [];
                                                        $values = [];
                                                        if (sizeof($assign_question) > 0) {
                                                            foreach ($assign_question as $key => $value) {
                                                                if ($value['subject_id'] === $data->subject_id) {
                                                                    $arr = [];
                                                                    $arr['subject'] = $value['subject'];
                                                                    $array[] = $arr;
                                                                }
                                                            }
                                                        }
                                                        if (sizeof($question_array) > 0) {
                                                            foreach ($question_array as $key => $value) {
                                                                if ($value['subject_id'] === $data->subject_id) {
                                                                    $arrs = [];
                                                                    $arrs['subject'] = $value['subject'];
                                                                    $values[] = $arrs;
                                                                }
                                                            }
                                                        }
                                                        ?>
                                                    <td class="cell"><span class="truncate">
                                                            <?php if(!empty($category)){ ?>

                                                            {{ $category->no_of_question_sub * 5 }}
                                                        </span>
                                                        <?php } ?>
                                                    </td>
                                                    <td class="cell"><span class="truncate">
                                                            <?php if(!empty($category)){ ?>

                                                            {{ sizeof($values) }}
                                                        </span>
                                                        <?php } ?>
                                                    </td>



                                                    <td class="cell"><span class="truncate">
                                                            <?php if(!empty($category)){ ?>
                                                            {{ $category->time_per_question }}
                                                            Mintes</span>
                                                        <?php } ?>
                                                    </td>
                                                    <td class="cell"><span class="truncate">
                                                            <?php if(!empty($category)){ ?>
                                                            {{ $category->no_of_question_sub }}
                                                            <?php } ?>
                                                        </span>
                                                    </td>
                                              
                                                    <td>

                                                        <a href="{{ route('deletequestion', $class_id . '-sub-' . $data->subject_id) }}"
                                                            className="btn btn btn-danger"  
                                                            onclick="return confirm('you want to delete?');"
                                                            ><i
                                                                class="fas fa-trash"></i></a>
                                                    </td>

                                                    <form action="toquestion" Method="POST">
                                                        @csrf
                                                        <input type="hidden" name="board" value="{{ $board_id }}">
                                                        <input type="hidden" name="subject_id"
                                                            value="{{ $data->subject_id }}">


                                                        <input type="hidden" value={{ $category->start_time }}
                                                            name="start_time">
                                                        <input type="hidden" name="class" value="{{ $class_id }}">
                                                        <input type="hidden" name="medium" value="{{ $media }}">
                                                        <?php if(!empty($category)){ ?>
                                                        <input type="hidden" name="category_id"
                                                            value="{{ $category->category_id }}">
                                                        <?php } ?>
                                                        <td class="cell">

                                                            <?php  if(sizeof($values)>0 ){ ?>

<?php
$currentdata = DB::table('exammanagements')
->where('subject_id',$data->subject_id)
->where('date',$date1)
->first();
if(empty($currentdata)){
?>
<button class="btn btn btn-primary">Assign</button>
<?php
}else{
    ?>

    <button class="btn btn btn-primary" disabled>Already Assigned</button>


<?php
}
?>

                                                            <?php }else{ ?>

                                                            <button class="btn btn btn-danger" disabled>Empty</button>
                                                            <?php } ?>
                                                        </td>
                                                    </form>


                                                    <form action="uploadcsv" method="POST">

                                                        @csrf
                                                        @method("POST")
                                                        <input type="hidden" name="board" value="{{ $board_id }}">
                                                        <input type="hidden" name="subject_id"
                                                            value="{{ $data->subject_id }}">
                                                        <input type="hidden" name="class" value="{{ $class_id }}">
                                                        <input type="hidden" name="medium" value="{{ $media }}">
                                                        <td class="cell">
                                                            <button class="btn btn-primary"><i class="fa fa-upload"
                                                                    aria-hidden="true"></i></button>
                                                        </td>



                                                    </form>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <?php } ?>
                                </div>
                                <!--//table-responsive-->
                            </div>
                            <!--//app-card-body-->
                        </div>
                        <!--//app-card-->
                    </div>




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
                    </script>
                @endsection
