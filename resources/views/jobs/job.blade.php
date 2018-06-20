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
                        <li class="list-group-item">Start Date: {{ $job->start_date }}</li>
                        <li class="list-group-item">End Date: {{ $job->end_date }}</li>
                        <li class="list-group-item">Scheduled: {{ $job->interval_type }}</li>
                        <li class="list-group-item">Start Time: {{ $job->start_time }}</li>
                        <li class="list-group-item">Interval: {{ $job->interval }}</li>
                    </ul>
                    <p class="card-text">{{ $job->message }}</p>
                    <div class="d-flex align-content-start justify-content-md-between">
                        <form action={{url( "/jobs/$job->id/edit") }} method="GET"> @csrf
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
                                  Delete
                                </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Warning</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this job?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
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