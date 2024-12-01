<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OpenAIService;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Whatsapp;

class OpenAIController extends Controller
{
    protected $openAIService;
    public $whatsapp;

    public function __construct(OpenAIService $openAIService)
    {
        $this->openAIService = $openAIService;
        $this->whatsapp = new Whatsapp();
    }

    public function generateResponse_credits(Request $request)
    {      
       
        // $prompt = $request->input('promt');
        // $response = $this->openAIService->generateText($prompt); 
        //echo($response) ;

         var_dump(auth()->id());
        // User::where('id', '=', $userLog->id)->update(['credit' => $userLog->credit-1]);

        // return response()->json([
        //     'data' => $response
        // ], 200);
        // return response()->json(['response' => $response]);
    } 
    
    public function generateResponse(Request $request)
    {      
       
        $prompt = $request->input('promt');
        $phone = $request->input('whatsapp');
        $email = $request->input('email');

        $response = $this->openAIService->generateText($prompt,$phone); 
        
        $params = [
            'phone' => $phone,
            'message' => $response
        ];

         $send = $this->whatsapp->send_whatsapp_message($params);

        return response()->json([
            'data' => $response
        ], 200);
        // return response()->json(['response' => $response]);
    } 

}
