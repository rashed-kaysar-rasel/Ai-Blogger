<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AIWriterController extends Controller
{
    public function articleWriter(){
        return view('pages.admin.ai-writer.article-writer');
    }
}
