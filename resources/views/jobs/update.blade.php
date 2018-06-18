@extends('layouts.app') 
@section('style') body { padding-top: 54px; } @media (min-width: 992px) { body { padding-top: 56px;
} }
@endsection
 
@section('content')
<div class="container">
    {{ $job->start_time }}
    <div class="row justify-content-md-center">
        <div class="col-sm-10 col-lg-6">
            <form action={{url( "/jobs/$job->id") }} method="POST">
                @method('PUT') @csrf
                <div class="form-group">
                    <label for="sname">Senders Name</label>
                    <input type="text" class="form-control" id="sname" placeholder="Enter Senders Name" name="sname" value={{ $job->sender_name
                    }}>
                </div>
                <div class="form-group">
                    <label for="rname">Recipient Name</label>
                    <input type="text" class="form-control" id="rname" placeholder="Enter Recipient Name" name="rname" value={{ $job->recipient_name
                    }}>
                </div>
                <div class="form-group" id="typeInput">
                </div>
                <div class="form-group">
                    <label for="sdate">Start Date</label>
                    <input type="date" class="form-control" id="sdate" name="sdate" value={{ $job->start_date }}>
                </div>
                <div class="form-group">
                    <label for="edate">End Date</label>
                    <input type="date" class="form-control" id="edate" name="edate" value={{ $job->end_date }}>
                </div>
                How Often
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="daily" name="intervalType" class="custom-control-input" value="daily">
                    <label class="custom-control-label" for="daily">Daily</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="hourly" name="intervalType" class="custom-control-input" value="hourly">
                    <label class="custom-control-label" for="hourly">Hourly</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="min" name="intervalType" class="custom-control-input" value="min">
                    <label class="custom-control-label" for="min">Minute</label>
                </div>
                <div class="form-row" id="howOften">
                    <div class="form-group col-sm-4">
                        <label for="startTime">Start Time</label>
                        <input type="time" class="form-control" id="startTime" name="startTime" value={{ $job->start_time
                        }}>
                    </div>
                    <div class="form-group col-sm-5">
                        <label for="intervalInput">Interval: </label>
                        <input type="number" class="form-control" id="intervalInput" name="intervalInput" value={{ $job->interval
                        }}>
                    </div>
                </div>
                <div class="form-group">
                    <label for="msg">Message</label>
                    <textarea class="form-control" id="msg" rows="4" name="msg">{{ $job->message }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection