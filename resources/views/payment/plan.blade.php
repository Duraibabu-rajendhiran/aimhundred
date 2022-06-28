@extends('layouts.master')
@section('content')

<style>

    .card1:hover {
      background:#00ffb6 !important;
      border:1px solid #00ffb6;
    }

    .card1:hover .list-group-item{
      background:#00ffb6 !important
    }


    


    .card2:hover {
      background:#00C9FF ;
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
    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">

            @if (\Session::has('success'))
                <div class="alert alert-success">
                    <div>
                        <h4 style="text-align:center;">{!! \Session::get('success') !!}</h4>
                    </div>
                </div>
            @endif
            <div class="container-lg" style="display:flex;">
                <div class="container-fluid">
                    <div class="container p-5">
                      <div class="row">
                       @foreach ($sub as $item)
                        <div class="col-lg-4 col-md-12 mb-4">
                          <div class="card card1 h-100" style="background-color: #00C9FF">
                            <div class="card-body">
                              <h5 class="card-title">{{ $item->title }}</h5>
                              <small class='text-muted'>Individual</small>
                              <br><br>
                              <span class="h2">{{ $item->offer }}</span> - {{ $item->duration }} month
                              <br><br>
                              <div class="d-grid my-3">
                                <form action="{{ route('callplang', $value ? $value : $value1) }}" method="POST">
                                    @csrf
                                    @method("post")
                                    <input hidden type="text" name="plan_id" value="{{ $item->id }}">
                                     <button type="submit" class="btn btn-outline-dark btn-block">Pay</button>
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
