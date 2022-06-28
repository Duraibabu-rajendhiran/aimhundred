@extends('layouts.master')

@section('content')

<style>
    .form {
        margin-left: 30%;
        width: 50%;
        background-color: lightgray;
        padding: 5px 20px;
        margin-top: 10px;
        border-radius: 6px;
    }

    label {
        text-align: center;
    }
</style>

<div class="form">
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route('updatepayg', $data->id) }}" method="POST">
    @csrf
    @method('POST')
        <div class="mb-3">
            <h4 style="text-align:center;">Edit Subscription</h4>
        </div>
        <div class="mb-3">
 
            <label for="recipient-name" class="col-form-label">Title</label>
                <input type="text" name="title" value="{{ $data->title }}" class="form-control" id="recipient-name"> 
            <label for="recipient-name" class="col-form-label">duration</label>

   
                <select size="1" class="form-select" name="duration">
                    <option selected value="{{ $data->duration }}">{{ $data->duration }} Month</option>
                    <option value="1">1 Month</option>
                    <option value="2">2 Month</option>
                    <option value="3">3 Month</option>
                    <option value="4">4 Month</option>
                    <option value="5">5 Month</option>
                    <option value="6">6 Month</option>
                    <option value="7">7 Month</option>
                    <option value="8">8 Month</option>
                    <option value="9">9 Month</option>
                    <option value="10">10 Month</option>
                    <option value="11">11 Month</option>
                    <option value="12">12 Month</option>
                    </select>

   
     
            <label for="recipient-name" class="col-form-label">Price</label>

                <input type="text" name="price" value="{{ $data->price }}" class="form-control" id="recipient-name">

 
            <label for="recipient-name" class="col-form-label">Offer</label>
            <input type="text" name="offer" value="{{ $data->offer }}" class="form-control" id="recipient-name">


            <label for="recipient-name" class="col-form-label">User Limit</label>
            <input type="text" name="user_limit" value="{{ $data->user_limit }}" class="form-control" id="recipient-name">



            <label for="recipient-name" class="col-form-label">Board</label>
            <select name="board" id="" class="form-control">

<option value="{{$data->board}}">{{$data->board_title}}</option>

@foreach ($board as $item)
<option value="{{$item->id}}">{{$item->title}}</option>

@endforeach


            </select>


            <label for="recipient-name" class="col-form-label">Color</label>
            <input type="color" name="color" value="{{ $data->color }}" class="form-control" id="recipient-name">


                
        </div>
  

        <button style="margin-left:34%;" type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection
