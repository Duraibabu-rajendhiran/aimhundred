@extends('layouts.master')

@section('content')
    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0">
                            <img width="23px" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAABmJLR0QA/wD/AP+gvaeTAAAESUlEQVR4nO3bS4gcVRQG4G/MaBJ0VIKa0SQaJQpGHRWMouBj7SJLEzRCNi5ERBeCLlwrgvuso4ILF4KggoLEScxCF8HE+CAiaiYPH3li1JjouDi36bKnuqa6u2qqZfqHy+2+XXX7r/+eOvd0n1OMMEIe1uItnMJxvIlrG2XUGybxBn7CEbyGVWVPXoEZzHa0Q7iqaqY1YAUOmsv/+/TZvHglnTCN68TKT6exV6vnWzmK+L9cZoJd6eAHMmMPpbHdVTKtCUX8d3YefEHOBKdTvyYztjr1v1VAsG4U8T9VZoKtQq3jeD6142nsiWo41ooi/lvKTLDEXAfSakuq51s5euI/1mWS2dRvS/2T8xw/bBiYf0uxbu+HHaX5ZxX5BPeV/IJduD/zfrkINK7GSpxM43+JmGImva4TffHPCtDrCj+Le3CviByLMIsfsR/78EV6/SXO9vi9WYzhLmzEi32cmyvAfPdJnlDnRKR1Wmw1Z8QWu0pYxEr5W+55HBCC7BOiHBDh6685x1+B9bgZG/CwsLosyvIfWIDt+Cy1zxWv5BJcjyncmtptWIfxLuf8KWL5i9P5F+KSnON+wHvKO7rKBMge168PWCpW9BYhyHpxO10jP24/iW/wlbCaD4Tl9M2/m/pl8IxqfMCe1DqxXIjZit7+1o7yWhgTt8LG3um3J8iS7BzLw8gHpH7kA+Y5rgwa9wFNC1CEMj4gi4H5lw13hzUs7ov/ILtA3sS0lS1DpvEfV3meeVGhSgvoXM3GV7cMFr0FjARomkDTqGMXKIvO3aKR3WNkARXO1e+qNLp7jCygxrnz7uVB7vu8eQbGyAJqnLtolYYmalz0FjASoGkCTWMkQNMEmkadu0BZFMUA3eKEURxQFYbBAsqs5iArXvhvcZUCLBMJjztxB67EZbgIEyJxckLkCb8VWaC9ov6wMQwqwCQewSbc3ed8x0RmaW+m7ReZoSIsFcmUDf5bEteJQusZJDHyER7ULjw6Ky5kj8jaHMIv+CN9Pi4yPmtxg8gG3S4/A/QPDot845E0dkJY1KSoWF0n0mVF11TEv5ICiTOipvgdfKi/OsLVImc4JQSZwo3yLy6L8/haCL5buyBqwQR4Gq9rp66q9AHjIrO8Vrs+eQK/46iwrO+0rauIf7ef3pXkBofJB2zO8OrGd877Kn3AOXyauYAZ/KxdGbIMl4s0+U3CWhbCB9QmAJGtfVv4gR3CJ/SKun1AzwKUxVPiQYQ6CqgH8QFlMWehd+peY9vZpnv8soVApfwXTansfF572zyfDzv64r+oyuXzfg4/nvpjeA4viAcO4NGKydaBTv6tByYoyf99odbmzNiWNPZuNRxrRYv/pszYY7rwz7OAidRnQ9SDqb+0AoJ1o8X/cGZsJvWl+LceO9sh9uI12lvMS9VwrBUt/h+LIKtn/gM/eNgwKuE/KaK8o+JW2K6HR0+HAP93/iMsGP4FuTShszie8/cAAAAASUVORK5CYII="/>
                     
                     
                            banner</h1>
                    </div>
                    <div class="col-auto">
                        <div class="page-utilities">
                            <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                                <div class="col-auto">
                                    <style>
                                        input {
                                            text-transform: capitalize;
                                        }
                                    </style>
                                </div>
                                



                               
                                <button type="button" onMouseOver="this.style.color='#15A362'"
                                    onMouseOut="this.style.color='#676778'"
                                    style="border-radius:5px;padding:4px;background-color:white;border:1px solid #676778;;color:#676778; "
                                    class="col-auto" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    data-bs-whatever="@getbootstrap"><i class="fa fa-plus" aria-hidden="true"></i> Add banner</button>
                            
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"> Add Banner</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                       
                                                <form action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label for="recipient-name" class="col-form-label">Title</label>
                                                        <input type="hidden" name="updated" value="0" class="form-control" id="recipient-name">
                                                        <input type="text" name="title" class="form-control" id="recipient-name" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="recipient-name" class="col-form-label">Banner Image</label>
                                                        <input type="file" name="banner_image" class="form-control" id="recipient-name" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="recipient-name" class="col-form-label">Banner Description</label>
                                                        <input type="text" name="description" class="form-control" id="recipient-name" required>
                                                    </div>
                                                     </div>
                                                    <div class="modal-footer">
                                                        <a data-bs-dismiss="modal"
                                                        aria-label="Close" class="btn btn-secondary">Close</a>
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
echo 'alert("'.$errors->first().'")';  
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
                                                <th class="cell">Banner Image</th>
                                                <th class="cell">Description</th>
                                                <th class="cell">Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($banner as $data)
                                                <tr>
                                                    <td class="cell">{{ ++$i }}</td>
                                                    <td class="cell"><span class="truncate">{{ $data->title }}</span></td>
                                                    <td class="cell"><span class="truncate"><img src="banners/{{ $data->banner_image }}" alt="" width="120px"> </span></td>
                                                    <td class="cell"><span class="truncate">{{ $data->description }}</span></td>


                                                    <td>
                                                        <a href="{{ route('banner.edit', $data->id) }}" class="btn btn-primary"><i class="fas fa-edit fa-1x"></i></a>
                                                        <form action="{{ route('banner.destroy', $data->id)}}"  method="POST" style="display:inline-block;">
                                                            @csrf
                                                            @method('DELETE')
															 <button type="submit" onclick="return confirm(' you want to delete?');" class="btn btn-danger"><i class="fas fa-trash fa-1x"></i></button>
                                                    </td> 
                                                    </form>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                          
                        </div>
                      
                    </div>
                   
                  
                    <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
                        aria-hidden="true">
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
