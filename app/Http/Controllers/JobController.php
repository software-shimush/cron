<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreJob;
use App\JobModel;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $jobs = JobModel::all()->where('user_id', $id);
        return view('jobs.job')->with('jobs',  $jobs);
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
    public function store(StoreJob $request)
    {
        $validated = $request->validated();

        $intervalInput = $request->input('intervalInput');

        $job = new JobModel;
        $job->sender_name = $request->input('sname');
        $job->recipient_name = $request->input('rname');
        $job->start_date = $request->input('sdate');
        $job->end_date = $request->input('edate');
        $job->start_time = $request->input('startTime');
        $job->interval = "55555555";
        $job->message = $request->input('msg');
        $job->status = 'active';
        $job->type = $request->input('type');
        $job->destination = $request->input('destination');
        $job->user_id = $user = Auth::id();
        $job->save();

        echo "sucessfuly added job";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
        print_r("successfuly deleted");
    }
}
