<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\UserOpenAi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\OpenAiSetting;
use OpenAI\Laravel\Facades\OpenAI;
use Symfony\Component\HttpFoundation\StreamedResponse;

class AIController extends Controller
{
    protected $settings;

    public function __construct()
    {
        //Settings
        $this->settings = OpenAiSetting::first();
        config(['openai.api_key' => $this->settings->api_key]);
    }


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

    public function getArticlePrompt($outline, $prompt)
    {
        $outline = json_decode($outline);
        $totalLength = 0;
        foreach ($outline as $items) {

            if ($items->level == 1) {
                $prompt .= "$items->item (max $items->maxLength words): ";
                if ($items->keywords) {
                    $prompt .= "Please focus on the keywords $items->keywords. ";
                }
                $prompt .= "Explain $items->item in " . count($items->types) . " formats - ";

                foreach ($items->types as $type) {
                    $prompt .= $type . ", ";
                }

                $prompt = rtrim($prompt, ", ");
                $prompt .= ".\n";

                $totalLength += $items->maxLength;
            }

        }

        return array("prompt"=>$prompt,"totalLength"=>$totalLength);
    }

    public function streamTextOutput(Request $request)
    {

        $post_type = $request->post_type;

        //SETTINGS
        $maximum_length = $request->maximum_length;
        $creativity = $request->creativity;
        $language = $request->language;
        $tone_of_voice = $request->tone_of_voice;

        //ARTICLE GENERATOR
        if ($post_type == 'article_generator') {
            $article_title = $request->article_title;
            $focus_keywords = $request->focus_keywords;
            $exclude_keywords = $request->exclude_keywords;

            $prompt = "Generate a $tone_of_voice article in $language (max $maximum_length words) about $article_title focusing on the keywords $focus_keywords with a creativity factor of $creativity. Exclude the words $exclude_keywords.\n";

            if (isset($request->outline_json)) {
                $genaretedPrompt = $this->getArticlePrompt($request->outline_json, $prompt);
                $prompt = $genaretedPrompt['prompt'];

                $maximum_length < $genaretedPrompt['totalLength'] ? $maximum_length = $genaretedPrompt['totalLength'] : $maximum_length = $maximum_length;
            }
        }

        //POST TITLE GENERATOR
        if ($post_type == 'post_title_generator') {
            $description = $request->description;
            $focus_keywords = $request->focus_keywords;
            $prompt = "Generate engaging and click-worthy post titles on '$description'. Also Focus on $focus_keywords. And Language is $language.";
        }

        // EMAIL GENERATOR
        if ($post_type == 'email_generator') {
            $subject = $request->subject;
            $description = $request->description;
            $focus_keywords = $request->focus_keywords;

            $prompt = "Write email about subject:
                    $subject, description:
                    $description.
                    Maximum $maximum_length words. Creativity is $creativity between 0 and 1. Language is $language. Tone of voice must be $tone_of_voice. Also focus on the key words $focus_keywords;
                    ";
        }
        // echo json_encode($prompt);
        // echo json_encode($maximum_length);
        // exit;

        $response = new StreamedResponse(function () use ($prompt, $creativity, $maximum_length, $post_type) {

            $total_used_tokens = 0;
            $output = "";
            $responsedText = "";

            try {
                $stream = OpenAI::completions()->createStreamed([
                    'model' => 'text-davinci-003',
                    'prompt' => $prompt,
                    'temperature' => (int)$creativity,
                    'max_tokens' => (int)$maximum_length,
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
                    $total_used_tokens += countWords($messageFix);

                    // $string_length = Str::length($messageFix);
                    // $needChars = 6000 - $string_length;
                    // $random_text = Str::random($needChars);


                    echo 'data: ' . $messageFix . "\n\n";
                    ob_flush();
                    flush();
                    usleep(500);
                }
            }

            $user = User::where('id',auth()->id())->first();
            $user->openAi()->create([
                "type"=> $post_type,
                "input"=>$prompt,
                "output"=>$output,
                "credits"=>$total_used_tokens,
            ]);
            
        });


        $response->headers->set('Content-Type', 'text/event-stream');
        $response->headers->set('Cache-Control', 'no-cache');
        $response->headers->set('Connection', 'keep-alive');

        return $response;
    }
}
