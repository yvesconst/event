@extends('layouts.app')

@section('content')

<div class="row">
<div class="col-sm-3"></div>
<div class="col-sm-6">
<div class="row flex-lg-nowrap">
    <div class="col mb-3">
    <div class="e-panel card">
        <div class="card-body">
        <div class="card-title">
        <a class="btn btn-primary" href="{{ route('festivals.index') }}"> Back</a>
        </div>
        <div class="e-table">

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

<form action="{{ route('festivals.store') }}" method="POST">
    @csrf

     <div class="row">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Name">
        </div>
        <div class="form-group row">
            <label>Date</label>
            <div class="col">
                <input type="date" id="start_at" class="form-control" name="start_at">
            </div>
            <div class="col">
                <input type="date" id="end_on" class="form-control" name="end_on">
            </div>
        </div>
        <div class="form-group">
            Active
            <input type="checkbox" style="margin-top: 15px;" id="is_active" name="is_active">
        </div>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>


</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="col-sm-3"></div>
</div>



@endsection
