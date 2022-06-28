@extends('layouts.master')
@section('content')
<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">
                        <img width="30px" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAABmJLR0QA/wD/AP+gvaeTAAAHzklEQVR4nO2ad4wVRRzHP/fuKIcUD0GaZ0URQQFR4im2KGCJFXtALGBAgyiCxoIBRDExlmjEgiVg7IoaLFhQFAQLCKgIEiNgQeCQKkdR7vnHb8aZfTc7u4+33D3wvsnm7u185/f7zezM/Mou1OL/jcIa1L0n0B04AtgGrK1BW6oNxcBZwCvAViBtXQuAkcDBNWbdTkJ94Hxk0BWYAf8DTAPeBNZY9yuBWcANQOsasDcRFCLL+wlgPWZw24EZwBCgZQb/VGCih9+immzfYRQCpwDjgT8JLu8vgaHAPjHkNAQGA68Dmy0ZfwNTgCuQ8yNvUAY8AqwgOOj5wG3AgTFk1APOAJ605JwGNAb6Am8TPDO2IFvnUtW3xnA7wUH/CIwCDovZvwx4GdiQIWcxcGgGtynQH/gIOT8092tq0Jt9pYz4CxgEFGTZfyZmIHOAEYhbjEJXxGvovvtnqTcxDCf45H4GxgKdY/bvBAwE9ovB3Ru4FvgMORy1zplAKiurE8ZRwAPArwQnYyHi19vnILsEuBr4gOCyrwBeBXoDdXKQnwjaA/dhtoPrmgfcChwQQ14joA8wmarBkn2tQrzLWODwxEYTE+2AMciTsZejfV0MPE0wyEkDXwA3EnSJxcAFwGtUDZY+RFbBnBA9Onh6k2oKnK5HfLLtkh4HegAd1L01Fr8uEv4+D2y0+m1HIr53CHqB7cg+vw7Z9xrPqPaB6ncJcBLwkNV/NXB0gmOtgl7IbFciUVufDCNPwDxlF4qBC6ka5KSRLeQLlm5WvAcdbS2QiUwjSVW7uAPKFrOUkhEh7QNU+4QYshoCJwJnAqUx+Oco2e+GtBciB+NOiw2aIk9+C/IkXbhGGbAZ2Qab1O8NwPdIpHeCR0cZME5x12G22BrMMn/P078h4orTwGUxxpQVuijBcz2c5oQfVJkH4elWv1OA6TH79oywsx8m/0gUZUrwDA9HT0A5ckjpldIICY5GAn8QDGNnWb/LEe/SGckDUDJKgKWK48stjrB4lUCrLMYXie74J6Aj8JPiLPXIaYC4QXsiyoFbkCUchu8x0WbXEM79BFdLGG+H0A6TqLjwkaX44xjyipGl3xOZlChMtuTPDuFcgVlZ3WLIzAoHKeErHW0p5LDahkxUYwcnVzREok7tPl0H8d7I0t+IHNqJ4VDMqbzE0V6sFFeQfUaYLXSxZa+Q9uWYbRVZgImbRV0JNFHKn3O0b1aKi5GVsrPQEnmy65QtLoxHBt8MCaETwQRkVi/3cF5QnFFJKXVAR4NvRPD6K96TUQLjroDf1d+OHs44pXQ4UsZKMhJLIcmVjkAfjeB3UH9/TcqAkzHJhi/jehhzUg9NSjlSCNFyx0dwW2My0LKkDChAavg6zO0UwksheX8aiQmSOhC/UzJH419ZXTBeYkpCuv9Dc+BTJXych1cE/KJ4Jyeg9xiM+42qAD+ruFOR6DFx6Hx/Lf7a/B2K90ECOicpWfdE8EqQ4ux2oG0CekMxVRl0l4ezF8Zfn5eDrlMx2WRUtedB/OlyYuiGSYt9tbhBmMCp0Q7oqY+J/4dFcLsgUeg/hJ9PiWAPpASl64CLkYDDhabIVkkDb5F96VrHHhs8OkDOpiWYHGCnvSnqgSk2/A0sU/9PyuClkMrQSoKZ2ePEn4SxGX1XIFFdZv9WGA+hrx+AY+MPKxolyOlaqRR8gyy5VohXuM3ididYvZ0GXIUphk7C/zQbY558BbKN7ELJbKVDY7S6Pw84G3kXoQurD+NPr2PhAkzevhnJ2YscvFLgRcwkLQUustqPw2yHFUpOG6u9JfI9gHaf6zEutAC4xGqrRMLuUuQhDMF4pPpIQWWbZUevHRg3rTDuJ4086UMcvGLgTkztb5P67UpVSxG3aC/XdZiJsWsJrnd9DZCKkn5v4NPVCVktWuYEskiP+1lGrUfq8K6IrjfB8tOLRFd3C5AiyKtIxqYNXI1MeE+iz4l9gZcIrrbeDl4RkpfoCVtBhEsuRN7kaKMm486nm2DKz/pMOD5E5jRgEZJFurZOE9wBVZHqs4jwEtzxSre24xXchZi2wCcW715CQnQ9+K1IOulCa+BbgqvD98Ts19+L1aB8sXyh4iy2+n3u4aeUDfqzmvm4C6EFSCyhX7COyST0xRx0J4Yoa4yctmnE9cR5pa2fpD0g10S4Bq55rpWTif0x3wvMJTzwOheZhErErQNycuoy0mCPkucVZwHZJxq+ichl4DaaYtzgRA9vDCZeSIF5kfAd4elrL8XZSLxvfsLgmohcB26jLZIQpQl/gVIHKfCkUS5Su7shHsH63f9NORhnQ0/EQnXlOnAbwxBbZ3k4dyvOY2BC2rBvc7pi3EjYO8F8QgPk44k0ErG6oLPMr1OYDxCXhZC1j30ZOSTzHRWIreCOD8CU9lumMNnT+hCyrqu9n7tt1QZta1hNUI+1PphDKAw6F2jj4eQbShGbl4e0N1Pt5XHSU+3yVidgWHWhXP2NjP9TmO/0ww4MvUW2IlHZ9Iz2fLy3JcP2TByp/q4FeIqqPtl1gXu75Ou9OGMaCxI2jqfq52y78wSsQkp79YqQ6G6AulywlcxwKM33ezm/nInyEvmKWHbH8QLalXT3svILuj7xu5cVE5kV2l3pinqbFAt11SToDGpXuH5Tg6+bxATUoha1qEUtdlf8CyQEXblhMkr1AAAAAElFTkSuQmCC" />
                        student
                    </h1>
                </div>


                <div class="col-auto">
                    <div class="page-utilities">
                        <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                            <div class="col-auto">
                                <form  action="{{ route('searchstudent') }}" method="GET" class="table-search-form row gx-1 align-items-center">
                                     <div class="col-auto">
                                        <input type="text" list="studentin" id="search-orders" name="student" class="form-control search-orders" placeholder="Search student Here">
                                     </div>

                                     <input type="hidden" name="search" value="1">


                                     <datalist id="studentin">
                                        @foreach ($user as $data)
                                        <option value="{{$data ->full_name}}">
                                            @endforeach
                                     </datalist>

                                    <div class="col-auto">
                                        <button type="submit" class="btn app-btn-secondary">Search</button>
                                    </div>
                                </form>
                            </div>

                    <button type="button" onMouseOver="this.style.color='#15A362'" onMouseOut="this.style.color='#676778'" style="border-radius:5px;padding:4px;background-color:white;border:1px solid #676778;;color:#676778; " class="col-auto" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap"><i class="fa fa-plus" aria-hidden="true"></i> Add  student</button>

                            <button type="button" onMouseOver="this.style.color='#15A362'" onMouseOut="this.style.color='#676778'"
                             style="border-radius:5px;padding:4px;background-color:white;border:1px solid #676778;;color:#676778; margin-right:4px;" class="col-auto"
                             data-bs-toggle="modal" data-bs-target="#Modal" data-bs-whatever="@getbootstrap"><i class="fas fa-file-csv"></i>-Bulk Add
                                Students</button>

                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">

                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body">

                                            <form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data">
                                             @csrf
                                 <div class="mb-3">
                                                    <label for="recipient-name" class="col-form-label">Full Name</label>
                                                    <input type="hidden" name="deleted_id" value="0" class="form-control" id="recipient-name">
                                                    <input type="text" name="full_name" class="form-control" id="recipient-name" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="customFile">Date Of Birth</label>
                                                    <input type="date" name="date_of_birth" class="form-control" id="customFile" />
                                                </div>
                                                <label class="form-label" for="customFile">profile Image</label>
                                                <input type="file" name="profile_image" class="form-control" id="customFile" placeholder="enter profile_url" />
                                                <div class="mb-3">
                                                    <label for="recipient-name" class="col-form-label">Phone</label>
                                                    <input type="text" name="phone" class="form-control" placeholder="Enter Mobile Number" pattern="[6-9]{1}[0-9]{9}" title="Phone number with 7-9 and remaing 9 digit with 0-9" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="recipient-name" class="col-form-label">Father</label>
                                                    <input type="text" name="father" class="form-control" id="recipient-name" placeholder="Enter father Number" required>
                                                </div>
                                                <input type="hidden" name="device_id" class="form-control" value="1" id="recipient-name" required>
                                                <input type="hidden" name="device_type" class="form-control" value="android" id="recipient-name" required>


                                                <div class="mb-3">
                                                    <label for="recipient-name" class="col-form-label">Adress</label>
                                                    <input type="text" name="address" class="form-control" placeholder="Enter Address" id="recipient-name" required>
                                                </div>
                                                <input type="hidden" name="deleted_id" value="0" class="form-control" id="recipient-name">
                                                <?php if (empty(session('SchoolId'))) { ?>

                                                    <div class="mb-3">
                                                        <label for="recipient-name" class="col-form-label">Board</label>
                                                        <select name="board_id" class="form-select" id="board" required>
                                                            <option value="">Select board</option>
                                                            @foreach ($board as $data)
                                                            <option value="{{ $data->id }}">{{ $data->title }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                <?php } elseif (!empty(session('SchoolId'))) { ?>

                                                    <input type="hidden" name="school_id" value="<?php echo session('SchoolId'); ?>">
                                                <?php } ?>
                                                <input type="hidden" name="device_id" class="form-control" value="1" id="recipient-name" required>
                                                <input type="hidden" name="device_type" class="form-control" value="android" id="recipient-name" required>
                                                <div class="mb-3">
                                                    <label for="recipient-name" class="col-form-label">Academic Year</label>
                                                    <select name="academic_year" class="form-select" id="" required>
                                                        <option value="">Select Academic</option>
                                                        @foreach ($academic as $data)
                                                        <option value="{{ $data->id }}">{{ $data->from }} {{ $data->to }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="recipient-name" class="col-form-label">medium</label>
                                                    <select name="medium_id" class="form-select" id="" required>
                                                        <option value="">Select medium</option>
                                                        @foreach ($medium as $data)
                                                        <option value="{{ $data->id }}">{{ $data->title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <?php if (empty(session('SchoolId'))) { ?>
                                                    <div class="mb-3">
                                                        <label for="recipient-name" class="col-form-label">school</label>
                                                        <select name="school_id" class="form-select" id="school" required>
                                                        </select>
                                                    </div>
                                                <?php    } ?>

                                                <div class="mb-3">
                                                    <label for="recipient-name" class="col-form-label">Class</label>
                                                    <select name="class_id" class="form-select" id="" required>
                                                        <option value="">Select Class</option>
                                                        @foreach ($period as $data)
                                                        <option value="{{ $data->id }}">{{ $data->title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="recipient-name" class="col-form-label">Section</label>
                                                    <select name="section_id" class="form-select" id="" required>
                                                        <option value="">Select Section</option>
                                                        @foreach ($section as $data)
                                                        <option value="{{ $data->id }}">{{ $data->title }}</option>
                                                        @endforeach
                                                    </select>
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


            @if ($errors->any())
            <?php
            echo '<script type ="text/JavaScript">';
            echo 'alert("' . $errors->first() . '")';
            echo '</script>';
            ?>
            @endif




    {{-- Add Student --}}

    <div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('save') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="deleted_id" value="0" class="form-control" id="recipient-name">
                        <?php if (empty(session('SchoolId'))) { ?>

                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Board</label>
                                <select name="board_id" class="form-select" id="boardit" required>
                                    <option value="">Select board</option>
                                    @foreach ($board as $data)
                                    <option value="{{ $data->id }}">{{ $data->title }}</option>
                                    @endforeach
                                </select>
                            </div>





                        <?php } elseif (!empty(session('SchoolId'))) { ?>

                            <input type="hidden" name="school_id" value="<?php echo session('SchoolId'); ?>">
                        <?php } ?>


                        <input type="hidden" name="device_id" class="form-control" value="1" id="recipient-name" required>
                        <input type="hidden" name="device_type" class="form-control" value="android" id="recipient-name" required>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Academic Year</label>
                            <select name="academic_year" class="form-select" id="" required>
                                <option value="">Select Academic</option>
                                @foreach ($academic as $data)
                                <option value="{{ $data->id }}">{{ $data->from }} {{ $data->to }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">medium</label>
                            <select name="medium_id" class="form-select" id="" required>
                                <option value="">Select medium</option>
                                @foreach ($medium as $data)
                                <option value="{{ $data->id }}">{{ $data->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <?php if (empty(session('SchoolId'))) { ?>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">school</label>
                                <select name="school_id" class="form-select" id="school1" required>
                                </select>
                            </div>
                        <?php    } ?>

                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Class</label>
                            <select name="class_id" class="form-select" id="" required>
                                <option value="">Select Class</option>
                                @foreach ($period as $data)
                                <option value="{{ $data->id }}">{{ $data->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Section</label>
                            <select name="section_id" class="form-select" id="" required>
                                <option value="">Select Section</option>
                                @foreach ($section as $data)
                                <option value="{{ $data->id }}">{{ $data->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="customFile">Input CSV</label>
                            <input type="file" name="file" class="form-control" id="customFile" />
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



    {{-- Search Student --}}
    <form action="{{ route('searchstudent') }}" method="GET">
        @csrf

        <?php if (empty(session('SchoolId'))) { ?>
            <input list="boardl" placeholder="board" style="width:100px;display:inline-block;text-transform:capitalize;" name="board_id" id="browser">
            <datalist id="boardl">
                @foreach ($board as $data)
                <option value="{{$data ->title}}">
                    @endforeach
            </datalist>
            <input list="mediuml" placeholder="Medium" style="width:100px;display:inline-block;text-transform:capitalize;" name="medium_id" id="browser">
            <datalist id="mediuml">
                @foreach ($medium as $data)
                <option value="{{$data ->title}}">
                    @endforeach
            </datalist>
        <?php } ?>



        <input list="class1" placeholder="class" style="width:100px;display:inline-block;text-transform:capitalize;" name="class" id="browser">
        <datalist id="class1">
            @foreach ($class as $data)
            <option value="{{$data ->title}}">
                @endforeach
        </datalist>



        <button type="submit" class="btn btn-primary">
            <i class="fas fa-search"></i></button>
    </form>




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



                        {{-- Table view --}}


                        <table class="table app-table-hover mb-0 text-left">
                            <thead>
                                <tr>
                                    <th class="cell">Id</th>
                                    <th class="cell">FullName</th>
                                    <th class="cell">profile</th>
                                    <th class="cell">Date Of Birth</th>
                                    <th class="cell">Father</th>
                                    <th class="cell">Board</th>
                                    <th class="cell">Class</th>
                                    <th class="cell">section</th>
                                    <th class="cell">Medium</th>
                                    <th class="cell">Acedemic</th>
                                    <th class="cell">School</th>
                                    <th class="cell">phone</th>
                                    <th class="cell">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                @foreach ($user as $data)
                                <tr>
                                    <td class="cell">{{ ++$i }}</td>
                                    <td class="cell">{{ $data->full_name }}</td>
                                    <td class="cell"><img src="{{ $data->profile_image }}" alt="profile" width="50px"> </td>
                                    <td class="cell">{{ $data->date_of_birth }}</td>
                                    <td class="cell">{{ $data->father }}</td>
                                    <td class="cell">{{ $data->board }}</td>
                                    <td class="cell">{{ $data->class }}</td>
                                    <td class="cell">{{ $data->section }}</td>
                                    <td class="cell">{{ $data->medium }}</td>
                                    <td class="cell">{{ $data->academic }}</td>
                                    <td class="cell">{{ $data->school_name }}</td>
                                    <td class="cell">{{ $data->phone }}</td>
                                    <td class="cell">
                                        <a href="{{route('viewsub',$data->id)}}" class="btn btn-primary">
                                            <i class="fas fa-money-check-alt"></i>
                                           </a>



                                        <a href="{{ route('student.edit', $data->id) }}" class="btn btn-primary"><i class="fas fa-edit fa-1x"></i></a>
                                        <?php if (empty(session('SchoolId'))) { ?>
                                            <form action="{{ route('student.destroy', $data->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm(' you want to delete?');" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                            <?php } ?>
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
            <!--//app-card-->
            <?php if (!isset($search)) { ?>
                {!! $user->links() !!}
            <?php } ?>
        </div>
        <!--//tab-pane-->
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <!-- Script -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
       
        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' type='text/javascript'></script>
        <script>
            $('#board').change(function() {
                var classID = $(this).val();
                if (classID) {
                    $.ajax({  
                        
                        type: "GET",
                        url: "{{ url('boardt') }}?board_id=" + classID,
                        success: function(res) {
                            if (res) {
                                $("#school").empty();
                                $("#school").append('<option>Select school</option>');
                                $.each(res, function(key, value) {
                                    $("#school").append('<option value="' + key + '">' + value +
                                        '</option>');
                                });
                            } else {
                                $("#school").empty();
                            }
                        }
                    });
                } else {
                    $("#school").empty();
                }
            });
  


            $('#school').on('change', function() {
                            var schoolID = $(this).val();
                            if (schoolID) {
                                $.ajax({
                                    type: "GET",
                                    url: "{{ url('sectionit') }}?school_id=" + schoolID,
                                    success: function(res) {
                                        if (res) {
                                            $("#section").empty();
                                            $("#section").append('<option>Select lesson</option>');
                                            $.each(res, function(key, value) {
                                                $("#section").append('<option value="' + key +
                                                    '">' + value +
                                                    '</option>');
                                            });
                                        } else {
                                            $("#section").empty();
                                        }
                                    }
                                });
                            } else {
                                $("#section").empty();
                            }
                        });



                        $('#school1').on('change', function() {
                            var schoolID = $(this).val();
                            if (schoolID) {
                                $.ajax({
                                    type: "GET",
                                    url: "{{ url('sectionit') }}?school_id=" + schoolID,
                                    success: function(res) {
                                        if (res) {
                                            $("#section1").empty();
                                            $("#section1").append('<option>Select lesson</option>');
                                            $.each(res, function(key, value) {
                                                $("#section1").append('<option value="' + key +
                                                    '">' + value +
                                                    '</option>');
                                            });
                                        } else {
                                            $("#section1").empty();
                                        }
                                    }
                                });
                            } else {
                                $("#section1").empty();
                            }
                        });
            $('#boardit').change(function() {
                var classID = $(this).val();
                if (classID) {
                    $.ajax({
                        type: "GET",
                        url: "{{ url('boardt') }}?board_id=" + classID,
                        success: function(res) {
                            if (res) {
                                $("#school1").empty();
                                $("#school1").append('<option>Select school</option>');
                                $.each(res, function(key, value) {
                                    $("#school1").append('<option value="' + key + '">' + value +
                                        '</option>');
                                });
                            } else {
                                $("#school1").empty();
                            }
                        }
                    });
                } else {
                    $("#school1").empty();
                }
            });


        </script>
        @endsection