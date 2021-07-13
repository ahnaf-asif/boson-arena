<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class DemoControllerForTesting extends Controller
{
    public function index(){
        return view('demo-stuff');
    }
    public function upload(Request $req){

        $file = $req->file('fileToUpload');
        $file_path = $file->getPathName();
        $client = new Client();
        $response = $client->request('POST', 'https://api.imgur.com/3/image', [
            'headers' => [
                'Authorization' => "Client-ID ".ENV('IMGUR_CLIENT_ID'),
                'content-type' => 'application/x-www-form-urlencoded',
            ],
            'form_params' => [
                'image' => base64_encode(file_get_contents($req->file('fileToUpload')->path($file_path)))
            ],
        ]);
        $data['file'] = data_get(response()->json(json_decode(($response->getBody()->getContents())))->getData(), 'data.link');

        return $data;
    }
}
