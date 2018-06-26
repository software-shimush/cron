@extends('layouts.app') 
@section('style') body { padding-top: 54px; } @media (min-width: 992px) { body { padding-top: 56px;
} }
@endsection
 
@section('content')
<div class="container">
    @if ($jobs)
    <div class="row justify-content-around">
        <div class="col-sm-7">
            <ul class="list-group">
                <li class="list-group-item active">{{ Auth::user()->name }}'s Jobs</li>
                @foreach ($jobs as $job)
                <a href="jobs/{{$job->id}}" class="list-group-item list-group-item-action justify-content-between">
                    <h3 class="col-4">{{$job->type}}</h3> <span class="col-4"><strong>status:</strong> {{$job->status}}</span></a>
                @endforeach
            </ul>
        </div>
    </div>
    @else
    <h2 class="text-primary">You currently have no scheduled jobs.</h2>
    @endif
</div>
@endsection