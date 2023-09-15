<?php

namespace App\Http\Controllers;

use App\Models\OpenAiSetting;
use Illuminate\Http\Request;

class OpenAiSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $openAiSettings = OpenAiSetting::first();
        return view('pages.admin.settings.openai',compact(['openAiSettings']));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(OpenAISetting $openAISetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OpenAISetting $openAISetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OpenAISetting $openAISetting)
    {
        return response()->json(['message' => 'Setting successfully updated']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OpenAISetting $openAISetting)
    {
        //
    }
}
