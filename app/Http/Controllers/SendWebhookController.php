<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SendWebhookController extends Controller
{
    public function send()
    {
        $url = 'https://webhook.site/fc201276-0d2b-49e5-a461-0965c18abf8e';
        $data = [
            'status_code' => 200,
            'status' => 'success',
            'message' => 'webhook send successfully',
            'extra_data' => [
                'first_name' => 'marcelo',
                'last_name' => 'dead inside'
            ],
        ];

        $json_array = json_encode($data); // array to json 
        $curl = curl_init();
        $headers = ['Content-Type: application/json'];
        
        //tecnique data
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $json_array);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HEADER, 1);
        curl_setopt($curl, CURLOPT_TIMEOUT, 30);

        $response = curl_exec($curl);
        $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        curl_close($curl);

        if ($http_code >= 200 && $http_code < 300) {
            echo 'Webhook send successfullu';
        }else{
            echo 'webhook failed';
        }
    }
}
