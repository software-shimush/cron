@extends('layouts.app') 
@section('style') body { padding-top: 54px; } @media (min-width: 992px) { body { padding-top: 56px;
} }
@endsection
 
@section('content')
<div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="row">
        @foreach ($jobs as $job)
        <div class="col-sm-6">
            <div class="card">
                <h5 class="card-header">{{ $job->type }}</h5>
                <div class="card-body">
                    <h5 class="card-title">{{ $job->status }}</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Sender Name: {{ $job->sender_name }}</li>
                        <li class="list-group-item">Receiver Name: {{ $job->recipient_name }}</li>
                        <li class="list-group-item">Address: {{ $job->destination }}</li>
                        <li class="list-group-item">Receiver Name: {{ $job->recipient_name }}</li>
                        <li class="list-group-item">Start Date: {{ $job->start_time }}</li>
                        <li class="list-group-item">End Date: {{ $job->end_time }}</li>
                        <li class="list-group-item">Interval: TODO</li>
                    </ul>
                    <p class="card-text">{{ $job->message }}</p>
                    <div class="d-flex align-content-start justify-content-md-between">
                        <form action={{url( "/jobs", $job->id) }} method="POST"> @method('PUT') @csrf
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                        <form action={{url( "/jobs", $job->id) }} method="POST"> @method('DELETE') @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection