<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\OpenAiSetting;
use App\Http\Controllers\Controller;

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
        $openAISetting->api_key = $request->api_key;
        $openAISetting->default_model = $request->defaul_model;
        $openAISetting->default_language = $request->language;
        $openAISetting->default_voice_tone = $request->tone_of_voice;
        $openAISetting->default_creativity = $request->creativity;
        $openAISetting->max_input_length = $request->max_input_length;
        $openAISetting->max_output_length = $request->max_output_length;

        $openAISetting->update();

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
