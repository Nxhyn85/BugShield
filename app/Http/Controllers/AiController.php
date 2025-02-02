<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use League\CommonMark\CommonMarkConverter;

class AiController extends Controller
{

    public function generate(Request $request) {
        $url = 'http://127.0.0.1:5000/generate';
    
        $prompt = $request->input('prompt');
    
        // Example JSON payload
        $data = [
            'prompt' => 'can you please suggest me a fix for this issue? And Also please provide an code exmple in any language if possible.' . $prompt
        ];
    
        // Make POST request with JSON payload
        $response = Http::post($url, $data);
    
        // Extract the generated text from the response
        $generatedText = $response->json('generated_text');
    
        // Now you can use $generatedText in your application
        // return response()->json(['generated_text' => $generatedText]);
        // return $generatedText;
    
        $converter = new CommonMarkConverter();
        $htmlOutput = $converter->convert($generatedText);
        return $htmlOutput;
    }
}
