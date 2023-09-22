<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserArticle;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;

class UserArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(ArticleRequest $request)
    {
        $user = User::where('id',auth()->id())->first();

        $user->article()->create([
            'title'=>$request->title,
            'description'=>$request->description,
            'word_count'=>countWords($request->input('description')),
        ]);

        return response(array("error"=>0,"message"=>"article saved"),200);
    }

    /**
     * Display the specified resource.
     */
    public function show(UserArticle $userArticle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserArticle $userArticle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserArticle $userArticle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserArticle $userArticle)
    {
        //
    }
}
