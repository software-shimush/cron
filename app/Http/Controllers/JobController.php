<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    public function create()
    {
        $type = $_GET['type'];
        return view('jobs.form')->with('type', $type);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sname = $_POST['sname'];
        $rname =  $_POST['rname'];
        $destination = $_POST['destination'];
        $sdate = $_POST['sdate'];
        $edate = $_POST['edate'];
        $intDay = $_POST['intDay'];
        $intHour = $_POST['intHour'];
        $intMin = $_POST['intMin'];
        $msg = $_POST['msg'];
        $type = $_POST['type'];

        $job = new JobModel;
        $job->sender_name = $sname;
        $job->recipient_name = $rname;
        $job->start_time = $sdate;
        $job->end_time = $edate;
        $job->interval = $intDay;
        $job->message = $msg;
        $job->status = 'active';
        $job->type = $type;
        $job->destination = $destination;
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
