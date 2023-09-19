<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ArticleCreationSchedule;
use Illuminate\Http\Request;

class ArticleCreationScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schedules = ArticleCreationSchedule::orderBy('id','DESC')->get();
        return view('pages.admin.article-schedules', compact(['schedules']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function updateStatus($scheduleId){
        ArticleCreationSchedule::where('id','!=',$scheduleId)
        ->where('status',1)
        ->update([
            'status'=>0
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $topics = json_encode(explode(",",$request->topics));

        $attributes = [
            'topics' => $topics,
            'language' => $request->language,
            'max_length' => $request->max_length,
            'creativity' => $request->creativity,
            'voice_tone' => $request->voice_tone,
            "interval"=> $request->interval,
            "status"=> $request->status,
        ];

        if(!isset($request->schedule_id)){
            $schedule = ArticleCreationSchedule::create($attributes);
        }else{
            ArticleCreationSchedule::where('id',$request->schedule_id)->update($attributes);
            $schedule = ArticleCreationSchedule::where('id',$request->schedule_id)->first();
        }

        if($schedule->status == 1){
            $this->updateStatus($schedule->id);
        }

        $response = array('error' => 0);
        return response($response, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(ArticleCreationSchedule $articleCreationSchedule)
    {
        return response(array("schedule"=>$articleCreationSchedule),200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ArticleCreationSchedule $articleCreationSchedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ArticleCreationSchedule $articleCreationSchedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ArticleCreationSchedule $articleCreationSchedule)
    {
        $articleCreationSchedule->delete();
        return response(array("error"=>0),200);
    }
}
