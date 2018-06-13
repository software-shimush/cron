@extends('layouts.app') 
@section('style') body { padding-top: 54px; } @media (min-width: 992px) { body { padding-top: 56px;
} }
@endsection
 
@section('content')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-sm-10 col-lg-6">
            <form action="/post" method="POST">
                @csrf
                <div class="form-group">
                    <label for="sname">Senders Name</label>
                    <input type="text" class="form-control" id="sname" placeholder="Enter Senders Name">
                </div>
                <div class="form-group">
                    <label for="rname">Recipient Name</label>
                    <input type="text" class="form-control" id="rname" placeholder="Enter Recipient Name">
                </div>
                <div class="form-group">
                    <label for="url">Url</label>
                    <input type="text" class="form-control" id="url" placeholder="Enter The Url">
                </div>
                <div class="form-group">
                    <label for="sdate">Start Date</label>
                    <input type="datetime-local" class="form-control" id="sdate">
                </div>
                <div class="form-group">
                    <label for="edate">End Date</label>
                    <input type="datetime-local" class="form-control" id="edate">
                </div>
                How Often
                <div class="form-row justify-content-md-center">
                    <div class="form-group col-md-2">
                        <label for="intDay">Days</label>
                        <input type="number" class="form-control" id="intDay">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="intHour">Hours</label>
                        <input type="number" class="form-control" id="intHour">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="intMin">Minutes</label>
                        <input type="number" class="form-control" id="intMin">
                    </div>
                </div>
                <div class="form-group">
                    <label for="msg">Message</label>
                    <textarea class="form-control" id="msg" rows="4"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection