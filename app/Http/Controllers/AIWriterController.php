<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AIWriterController extends Controller
{
    public function articleWriter(){
        $post_type = "article_generator";
        return view('pages.admin.ai-writer.article-writer', compact(['post_type']));
    }
    public function postTitleGenerator(){
        $post_type = "post_title_generator";
        return view('pages.admin.ai-writer.post-title-generator', compact(['post_type']));
    }
    public function emailGenerator(){
        $post_type = "email_generator";
        return view('pages.admin.ai-writer.email-generator', compact(['post_type']));
    }
}
