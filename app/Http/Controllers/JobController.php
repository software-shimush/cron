<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\JobSubmitted;
use App\Http\Requests\StoreJob;
use App\JobModel;

class JobController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $jobs = JobModel::all()->where('user_id',  $id);
        return view('jobs.jobs')->with('jobs',  $jobs);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job = JobModel::findOrFail($id);
        return view('jobs.job')->with('job',  $job);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if(!empty($request->input('type'))){
            $type = $request->input('type');
            return view('jobs.form')->with('type', $type);
        }
        return view('home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreJob  $request
     * @return Response
     */
    // public function store(StoreJob $request)
    public function store(Request $request)
    {

        $destination = $this->setDestination($request);
        $intervalInput = $request->input('intervalInput');
        $intervalType = $request->input('intervalType');
        $startDate = $request->input('sdate');
        $startTime = $request->input('startTime') . ":00";
        $dateTime = $startDate . " " . $startTime;
        $type = $request->input('type');

        $job = new JobModel;
        $job->sender_name = $request->input('sname');
        $job->recipient_name = $request->input('rname');
        $job->start_date = $request->input('sdate');
        $job->end_date = $request->input('edate');
        $job->start_time = $startTime;
        $job->start_time = $request->input('etime');
        $job->interval_type = $intervalType;
        $job->interval = $intervalInput;
        $job->message = $request->input('msg');
        $job->status = 'active';
        $job->type = $type; 
        $job->destination = $destination;
        $job->user_id = $user = Auth::id();
        $job->save();

        event(new JobSubmitted($job, true));

        return view('jobs.alert')->with('msg', 'created a cron job!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = JobModel::findOrFail($id);
        return view('jobs.update')->with('job',  $job);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    public function update(StoreJob $request, $id)
    {
        
        $destination = $this->setDestination($request);
        $intervalInput = $request->input('intervalInput');
        $intervalType = $request->input('intervalType');
        $startDate = $request->input('sdate');
        $startTime = $request->input('startTime');
        $dateTime = $startDate . " " . $startTime;

        $job = JobModel::findOrFail($id);
        $job->sender_name = $request->input('sname');
        $job->recipient_name = $request->input('rname');
        $job->start_date = $request->input('sdate');
        $job->end_date = $request->input('edate');
        $job->start_time = $request->input('startTime');
        $job->start_time = $request->input('etime');
        $job->interval = $intervalInput;
        $job->message = $request->input('msg');
        $job->destination = $destination;
        $job->status = 'active';
        $job->user_id = $user = Auth::id();
        $job->type = $request->input('type');
        $job->interval_type = $intervalType;
        $job->save();
        return view('jobs.alert')->with('msg', 'updated your cron job!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        JobModel::destroy($id);
        return view('jobs.alert')->with('msg', 'deleted your cron job!');
    }

    /**
     * Change status of the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request, $id)
    {
// dd($request->input('status'));
        $job = JobModel::findOrFail($id);
        if($request->input('status') === 'active'){
            $job->status = 'inactive';
        }else{
            $job->status = 'active';
        }
        $job->save();
        return view('jobs.job')->with('job',  $job);
    }

    private function setDestination($request){
        if(app('request')->exists('number')){
            return $request->input('number');
        }elseif(app('request')->exists('email')){
            return $request->input('email');
        }elseif(app('request')->exists('url')){
            return $request->input('url');
        }
    }
}
