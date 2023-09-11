<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;

class AIController extends Controller
{
    public function testIntegration()
    {
        try {
            $result = OpenAI::completions()->create([
                'model' => 'text-davinci-003',
                'prompt' => 'Hello',
            ]);
            echo json_encode(array("message" => "Connected"));
        } catch (Exception $e) {
            echo json_encode(array("message" => $e->getMessage()));
        }
    }

    public function generateOutput(Request $request)
    {
        $post_type = $request->post_type;

        //SETTINGS
        $number_of_results = $request->number_of_results;
        $maximum_length = $request->maximum_length;
        $creativity = $request->creativity;
        $language = $request->language;
        $tone_of_voice = $request->tone_of_voice;

        //ARTICLE GENERATOR
        if ($post_type == 'article_generator') {
            $article_title = $request->article_title;
            $focus_keywords = $request->focus_keywords;
            $prompt = "Generate article about $article_title. Focus on $focus_keywords.
                     Maximum $maximum_length words. Creativity is $creativity between 0 and 1. Language is $language. Generate $number_of_results different articles. Tone of voice must be $tone_of_voice";
        }

        try {
            $result = OpenAI::completions()->create([
                'model' => 'text-davinci-003',
                'prompt' => $prompt,
                'temperature' => (int)$creativity,
                'max_tokens' => (int)$maximum_length,
                'n' => (int)$number_of_results
            ]);

            echo json_encode(array("message" => "successfull","result"=>$result));
        } catch (Exception $e) {
            echo json_encode(array("message" => $e->getMessage()));
        }
    }
}
