<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class AdminDashboardController extends Controller
{
    public function index(){
        return view('pages.admin.dashboard');
    }
    public function streamData(Request $request)
    {
        $max = $request->input('max', 10); // Default to 10 if not provided
        $delay = $request->input('delay', 1); // Default to 1 second if not provided

        $response = new StreamedResponse(function () use ($max, $delay) {
            for ($i = 1; $i <= $max; $i++) {
                echo "data: $i\n\n"; // Send the data as a Server-Sent Event (SSE)
                ob_flush();
                flush();
                sleep($delay);
            }
        });

        $response->headers->set('Content-Type', 'text/event-stream');
        $response->headers->set('Cache-Control', 'no-cache');
        $response->headers->set('Connection', 'keep-alive');

        return $response;
    }
}
