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
        $schedules = ArticleCreationSchedule::all();
        return view('pages.admin.article-schedules', compact(['schedules']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        ArticleCreationSchedule::create([
            'topics' => $request->topics,
            'language' => $request->language,
            'length' => $request->length,
            'creativity' => $request->creativity,
            'voice_tone' => $request->voice_tone,
            "frequency"=> $request->frequency,
            "status"=> $request->status,
        ]);
        
        $response = array('error' => 0);
        return response($response, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(ArticleCreationSchedule $articleCreationSchedule)
    {
        //
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
        //
    }
}
