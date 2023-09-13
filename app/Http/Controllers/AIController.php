<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;
use Symfony\Component\HttpFoundation\StreamedResponse;

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

    public function streamTextOutput(Request $request)
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


        // $result = OpenAI::completions()->create([
        //     'model' => 'text-davinci-003',
        //     'prompt' => $prompt,
        //     'temperature' => (int)$creativity,
        //     'max_tokens' => (int)$maximum_length,
        //     'n' => (int)$number_of_results
        // ]);


        $response = new StreamedResponse(function () use ($prompt, $creativity, $maximum_length, $number_of_results) {

            $total_used_tokens = 0;
            $output = "";
            $responsedText = "";

            try {
                $stream = OpenAI::completions()->createStreamed([
                    'model' => 'text-davinci-003',
                    'prompt' => $prompt,
                    'temperature' => (int)$creativity,
                    'max_tokens' => (int)$maximum_length,
                    'n' => (int)$number_of_results
                ]);
            } catch (\Exception $e) {
                $messageError = 'Error from API call. Please try again. If error persists again please contact system administrator with this message ' . $e->getMessage();
                echo "data: $messageError";
                echo "\n\n";
                ob_flush();
                flush();
                echo 'data: [DONE]';
                echo "\n\n";
                ob_flush();
                flush();
                usleep(50000);
            }
            foreach ($stream as $streamResponse) {

                    if (isset($streamResponse->choices[0]->text)) {
                        $message = $streamResponse->choices[0]->text;
                        $messageFix = str_replace(["\r\n", "\r", "\n"], "<br/>", $message);
                        $output .= $messageFix;
                        $responsedText .= $message;

                        $string_length = Str::length($messageFix);
                        $needChars = 6000 - $string_length;
                        $random_text = Str::random($needChars);


                        echo 'data: ' . $messageFix . "\n\n";
                        ob_flush();
                        flush();
                        usleep(500);
                    }


            }
            
        });


        $response->headers->set('Content-Type', 'text/event-stream');
        $response->headers->set('Cache-Control', 'no-cache');
        $response->headers->set('Connection', 'keep-alive');
        // $response->headers->set('X-Accel-Buffering', 'no');

        return $response;
    }
}
