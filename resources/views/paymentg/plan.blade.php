@extends('layouts.master')
@section('content')

<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0- 
alpha/css/bootstrap.css" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" 
href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">

            <style>

                .card1:hover {
                  background:#00ffb6;
                  border:1px solid #00ffb6;
                }
            
                .card1:hover .list-group-item{
                  background:#00ffb6 !important
                }
            
            
                
            
            
                .card2:hover {
                  background:#00C9FF;
                  border:1px solid #00C9FF;
                }
            
                .card2:hover .list-group-item{
                  background:#00C9FF !important
                }
            
            
                .card3:hover {
                  background:#ff95e9;
                  border:1px solid #ff95e9;
                }
            
                .card3:hover .list-group-item{
                  background:#ff95e9 !important
                }
            
            
                .card:hover .btn-outline-dark{
                  color:white;
                  background:#212529;
                }
            
              </style>
            
            <script>
            @if(Session::has('message'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
            toastr.warning("Your Subscription Will be Expired Select plan and Login Again ");
            @endif
            </script>
  
            <div class="container-lg" style="display:flex;">
                <div class="container-fluid">
                    <div class="container p-5">
                      <div class="row">
                       @foreach ($sub as $item)
                        <div class="col-lg-4 col-md-12 mb-4">
                          <div class="card card1 h-100">
                            <div class="card-body">
                              <h5 class="card-title">{{ $item->title }}</h5>
                              <small class='text-muted'>group</small>
                              <br><br>
                              <span class="h2">{{ $item->offer }}</span> - {{ $item->duration }} month
                              <br><br>
                              <div class="d-grid my-3">
                                <form action="{{ route('callplang', $value ? $value : $value1) }}" method="POST">
                                    @csrf
                                    @method("post")
                                    <input hidden type="text" name="plan_id" value="{{ $item->id }}">
                                     <button type="submit" class="btn btn-outline-dark btn-block">Select</button>
                                </form>
                              </div>
                              <ul>
                                <li>Today Offer</li>
                                <li>{{ $item->offer }} - {{ $item->price }}</li>
                              </ul>
                            </div>
                        </div>
                        </div>
                        @endforeach
                      </div>    
                    </div>
                </div>
        
    @endsection
