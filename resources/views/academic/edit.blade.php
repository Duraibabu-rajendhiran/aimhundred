{{-- @extends('layouts.app')

@section('content') --}}

<style>
    .adj {
        padding: 10px;
    }
</style>
<div class="adj">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="text-center font-weight-bolder">
                <h2 class="font-weight-bold">Edit Academic</h2>
            </div>

            {{-- <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('academic.index') }}" title="Go back"> <i class="fas fa-backward "></i> </a>
        </div> --}}
        
    </div>
</div>

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
<form action="{{ route('academic.update', $academic->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                <input type="text" name="title" value="{{ $academic->title }}" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>From:</strong>
                <input type="number" name="from" class="form-control" value="{{ $academic->from }}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>To:</strong>
                <input type="number" name="to" class="form-control" value="{{ $academic->to }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong></strong>
                <input type="hidden" name="updated" class="form-control" value="{{ $academic->updated }}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>


</div>
{{-- @endsection --}}