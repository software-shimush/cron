@extends('layouts.app') 
@section('style') body { padding-top: 54px; } @media (min-width: 992px) { body { padding-top: 56px;
} }
@endsection
 
@section('content')
<div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Well done!</h4>
    <p>You successfully <span>{{$msg}}</span></p>
    <div>
        <a href="/jobs" class="btn btn-primary">Jobs</a>
        <a href="/home" class="btn btn-primary">Home</a>
    </div>
</div>
@endsection