<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Whatsapp extends Model
{

    public $permitted_chars;

    public function __construct()
    {
        $this->permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    }

    
    public function send_whatsapp_message($params)
    {

        $xParams = [];
        $url = "";
        $xParams += [
            'token' => env("TOKEN_WHATSAPP", ""),
            'to' => $params['phone']
        ];

        $xParams += [
            'body' => $params['message']
        ];
        $url = "https://api.ultramsg.com/" . env("INSTANCE_ID_WHATSAPP", "") . "/messages/chat";


        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => http_build_query($xParams),
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded"
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);


        if ($err) {
            $res = [
                'error' => $err,
                'status' => 2
            ];

            return $res;
        } else {
            $res = [
                'message' => $response,
                'status' => 1
            ];
            return $res; // SI se envia el whatsapp
        }
    }
}
