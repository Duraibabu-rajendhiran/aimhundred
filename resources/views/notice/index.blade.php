@extends('layouts.master')

@section('content')

    <script type="text/javascript" id="MathJax-script" async
      src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/startup.js">
    </script>
    
<div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0">
                                   <img width="30px" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAAA8CAYAAAA6/NlyAAAABmJLR0QA/wD/AP+gvaeTAAAFe0lEQVRogd2aXWxVRRDHfxdqKypFE6iWaAIaJUYwqDyICBrkxX48+IEmWsVg/YhGq09IVDAajfikTwQlGqVGHjQQSkxUFEP6IoIPUj+qQQk0StSXYost0nt9mNmccw979p7Pe1r/yc295+zs7Mzd2dmZ2YX/F1qBbmAnMAT8AxwA1gKlAuXKDCXgGuB5YD9QBiohn3eZokrPANqAzcAxqpUaBXYBDwPzgHOALmBY2x8oQN5E8JvqKNVKDgFbgA7kz7DhPqXdn7ukCeEy1TKyLjcC1xHNTJu170gewiZFVFOdm4D3POXzWyaSpkBaU42Kh5TnzpR8EuEqYB3QD0xQreR3wKvAjWTrUfuU/4MZ8gxFnqZqMAfYDtwVMv4osvZbU4zhRL1M1eAV5f2Bpa0Dn4duyGjAErBYmXcCS/BMsgIcRMxqN/CNvssSbyvP1y1tHfrdl3aQepiqC7OBZ4ALHTQlxKIqyDYXG/U21TC0AId03HUOumuV5hgRnWDWAUAW8Ct7CJnpMGxUus0uhmcDq4A3gKNUz+JJ4DOgB7g4peBJMAf4VmX5AbioBv0Bpb3V1rgM+JBiTdWF4My21KCfi1jhCDKJVXiR+gQASRF3ZkEcZgXYEWy4TRvGgefIz6smRdyZNdilfbqDDfu04bGMBMwSSZU10dUElujqhDJszkbGzDCTZMpCILryYxpiylCsQ7JhPrAQGABuAf6I0dcZXZlMYlMa6XLCIuC8BP16gVPAlbbGZdpYRjKOpUmlm0RoxB1yci/wN9629COwnmKCi1zh32NbgaeRKp/xbGXgc6TEuQOJtOqFq5GI76yUfE4BexDHZ8V0JAvajhSyzawPA1uB5eQbjJSA1zizGpLmM4EEUjUFPx+4G1hD9do+DLynnyPp9DsD3cBbwBjwPvBXSn6zEattQk4gImMB8DLVCUUZ2IsUuON60xbgTWBF4P2g8r49Jj8X7sQLS2NjGrK2tlGdaIwga32l0rjgj6C2BNpO6/vGJMKFoFF5/puW0QxgNZIy+nPlIWTNXG7pUysRMDyyhrHIzHAp8ALwC9Um34/UhWcRLTa2KdyBhIkj+t1u6VeLJnOFDUrATcA7eHG6KR6Y+pIrNg4q3IHd87bHpMlNYT/ORQ6y9uBtM0O4E4Ggwl/r83rl96w+fxWTpi4K+7EQUfokYt5hCCpsrMTsAk36PBaTpgKUa3nTLDEAfIk4OtsJQRgG9ftJxNua7K4pJk0huB/5p/sdNMEZbse+PuPS1N2kQdbXCR3YtmWB3Uu3I+txHLsyUWgKURjEe1eAl0Laa+3DtvUZhaYwhW/WwY9gj8hcCjcihcagB45CU5jCJbzgZKWlPSzwGKPaVNti0tTdS/sH3qa/18ToA5Lbmijq4wQ0hWE+3qnAzEDblIml48LUw4N3p/LIlowTS50tpcFaFWJv4L3Jh+/IcKzVyvP7Is+NmoHfkcjrMuBXfd+DnOSPIxWPP0P6m1rVvsD7BuARvDBzAXAPMstPZCR7YvQi//wG37s4Na2fLTxXWOhOI/l5qeiTwVVI8eAwEnn5ndUi5MTBdlK4FFHsI6R840cD8Dhe5fU4YgkDmUmdAtPwamTLY/QzpyWxinKTBebK0daI9P6TwSjnxJMOVyD74zBy3bcWOnGHlk4UEWkF8RMifDNyOF8Lnfqd+t5VkXgUmbVPa9D5710tzluoPDELKf1MAJc46JYgyh4l4XHPZDBpkPXbh8jT5aAzB927ySferivaECUGCZ+9g0pjvXc11TAdubFeAa63tDvvXUXFZDFpkPXbq797LO3dyMx/gru8M6XQincTYZM+XwA8hSQLYbM/pdGF5K22ZGGDo9+Uxg3ITbrjiAf/As9Dp8J/5iIogEimxqoAAAAASUVORK5CYII="/>
                            Notice</h1>
                    </div>
                    <style>
                        #sty{
                          cursor: pointer;
                          color:white;
                          background-color:red;
                          width:100px;
                          border-radius:5px; 
                        }
                        #sty:hover{
                            color:red;
                            background-color:white;
                            width:100px;
                            border-radius:5px;
                        }
                    </style>
                    
                    <div class="col-auto">
                        <div class="page-utilities">
                            <div class="row g-2 justify-content-start justify-content-md-end align-items-center">

                                <button type="button" onMouseOver="this.style.color='#15A362'"
                                    onMouseOut="this.style.color='#676778'"
                                    style="border-radius:5px;padding:4px;background-color:white;border:1px solid #676778;;color:#676778; "
                                    class="col-auto" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    data-bs-whatever="@getbootstrap">Add Notice</button>

                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add Notice</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                @if ($errors->any())

                                                    <div class="alert alert-danger">
                                                        <strong>Whoops!</strong> There were some problems with your
                                                        input.<br><br>
                                                        <ul>

                                                            @foreach ($errors->all() as $error)

                                                                <li>{{ $error }}</li>

                                                            @endforeach

                                                        </ul>

                                                    </div>
                                                @endif

                                                <form action="{{ route('notice.store') }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label for="recipient-name"
                                                            class="col-form-label">Description</label>
                                                           <input type="hidden" name="valid" value="0" class="form-control"
                                                            id="recipient-name">
                                                            
                                                       
                                                            
                                                            <script src="https://cdn.ckeditor.com/4.16.2/standard-all/ckeditor.js"></script>

                                                            <textarea cols="5" id="editor1"  name="description"  data-sample-short>
                                                            </textarea>
                                                              <script>
CKEDITOR.plugins.addExternal('ckeditor_wiris', 'https://www.wiris.net/demo/plugins/ckeditor/', 'plugin.js');
  

    var mathElements = [
        'math',
        'maction',
        'maligngroup',
        'malignmark',
        'menclose',
        'merror',
        'mfenced',
        'mfrac',
        'mglyph',
        'mi',
        'mlabeledtr',
        'mlongdiv',
        'mmultiscripts',
        'mn',
        'mo',
        'mover',
        'mpadded',
        'mphantom',
        'mroot',
        'mrow',
        'ms',
        'mscarries',
        'mscarry',
        'msgroup',
        'msline',
        'mspace',
        'msqrt',
        'msrow',
        'mstack',
        'mstyle',
        'msub',
        'msup',
        'msubsup',
        'mtable',
        'mtd',
        'mtext',
        'mtr',
        'munder',
        'munderover',
        'semantics',
        'annotation',
        'annotation-xml',
        'mprescripts',
        'none'
    ];
    
    CKEDITOR.replace( 'editor1', {
        extraPlugins: 'ckeditor_wiris',
        athJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-AMS_HTML',
        height: 320,
        removePlugins: 'filetools,uploadimage,uploadwidget,uploadfile,filebrowser,easyimage',
        height: 320,
        // Update the ACF configuration with MathML syntax.
        extraAllowedContent: mathElements.join( ' ' ) + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
    } );

</script>
                                                           <label for="recipient-name"
                                                            class="col-form-label">Notice Image</label>
                                                           <input type="file" name="image" class="form-control"
                                                            id="recipient-name">

                                                    </div>


                                 <?php  if(!empty(session('SchoolId'))){ ?>
                                    <input type="hidden"  name="board_id" value="<?php echo $board->board_id ?>" >
                                    <input type="hidden"  name="school_id" value="<?php echo $board->school_id ?>" >
                         
                                    <?php }else{ ?>

<div onclick="schoolshow()" id="sty" >Add School</div>
<div  id="showschool" style="display:none;">
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">Board</label><br/>
                                            <select name="board_id" id="boardd" class="form-select">
                                                <option value="">Select Board</option>
                                                @foreach ($board as $data)
                                                    <option value="{{ $data->id }}">{{ $data->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">School</label><br/>
                                            <select name="school_id" id="boardd" class="form-select">
                                                <option value="">Select School</option>
                                                @foreach ($school as $data)
                                                    <option value="{{ $data->id }}">{{ $data->school_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                                                   
                                    <?php  } ?>

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
                                <style>
                                    input {
                                        text-transform: capitalize;
                                    }

                                </style>


                            </div>
                            <!--//row-->
                        </div>
                        <!--//table-utilities-->
                    </div>
                    <!--//col-auto-->
                </div>
                <!--//row-->
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
                                                <th class="cell">Description</th>
                                                <th class="cell">Notice Image</th>
                                                  <th class="cell">Board</th>
                                                 <th class="cell">School</th>
                                                <th class="cell">Action</th>

 
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $i = 1; ?>
                                            @foreach ($notices as $data)
                                                <tr>
                                                    <td class="cell">{{ $i++ }}</td>
                                                    <td class="cell"><span class="truncate">

                                                    <?php
                                                       echo $data->description; 
                                                    ?>
                                                    </span>
                                                    </td>
                                                    <td class="cell"><span class="truncate">	<img src="{{ URL::asset('notices')}}/{{  $data->image}}" width="40px"></span>
                                                    </td>
                                                    <td class="cell"><span class="truncate">{{ $data->board }}</span>
                                                    </td>
                                                    <td class="cell"><span class="truncate">{{ $data->school }}</span>
                                                    </td>
                                                    <td class="cell">
                                                        <a href="{{ route('notice.edit', $data->id) }}"
                                                            class="btn btn-primary"><i class="fas fa-edit fa-1x"></i></a>
                                        
                                                    <form action="{{ route('notice.destroy', $data->id) }}" method="POST" style="display:inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                            <button type="submit"
                                                                onclick="return confirm(' you want to delete?');"
                                                                class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                                        </td>
                                                    </form>
                                                </tr>
                                            @endforeach


                                        </tbody>
                                    </table>

                                </div>
                     
                            </div>
                            <!--//app-card-body-->
                        </div>
                        <!--//app-card-->
                    </div>
                    <!--//tab-pane-->

                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' type='text/javascript'></script>
                    

            <script>
                function schoolshow(){
                    var value = document.getElementById('showschool').style.display;
                    if(value == "none"){
                        var value = document.getElementById('showschool').style.display = "block";
                    }else{

                        var value = document.getElementById('showschool').style.display = "none";
                    }


                }
            </script>

                @endsection
