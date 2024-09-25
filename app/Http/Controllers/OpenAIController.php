<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OpenAIService;

class OpenAIController extends Controller
{
    protected $openAIService;

    public function __construct(OpenAIService $openAIService)
    {
        $this->openAIService = $openAIService;
    }

    public function generateResponse(Request $request)
    {        
        $prompt = $request->input('prompt');
        $response = $this->openAIService->generateText($prompt);        

        return response()->json(['response' => $response]);
    }    

}
