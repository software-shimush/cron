<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JobModel;
class PostController extends Controller
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
        $job = JobModel::all();
        echo $job;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jobs.post');
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
        $rurl = $_POST['rurl'];
        $sdate = $_POST['sdate'];
        $edate = $_POST['edate'];
        $intDay = $_POST['intDay'];
        $intHour = $_POST['intHour'];
        $intMin = $_POST['intMin'];
        $msg = $_POST['msg'];

        $job = new JobModel;
        $job->sender_name = $sname;
        $job->recipient_name = $rname;
        $job->start_time = $sdate;
        $job->end_time = $edate;
        $job->interval = $intDay;
        $job->message = $msg;
        $job->status = 'active';
        $job->type = 'post';
        $job->destination = $rurl;
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
        //
    }
}
