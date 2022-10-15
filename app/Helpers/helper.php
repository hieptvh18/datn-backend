<?php
use Twilio\Rest\Client;

function randomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

if (!function_exists('fileUploader')) {
    function fileUploader($file, $prefixName = '', $folder)
    {
        $fileName = $file->hashName();
        $fileName = $prefixName
            ? $prefixName . '_' . $fileName
            : time() . '_' . $fileName;

        return $file->storeAs($folder, $fileName);
    }
}


if (!function_exists('sendSms')) {
    function sendSms($phone, $content)
    {
        // Your Account SID and Auth Token from twilio.com/console
        $account_sid = env('TWILIO_SID');
        $auth_token = env('TWILIO_TOKEN');
        // sdt ảo
        $twilio_number = env('TWILIO_FROM');

        $client = new Client($account_sid, $auth_token);
        $client->messages->create(
            // Where to send a text message (your cell phone?)
            '+84'.$phone,
            array(
                'from' => $twilio_number,
                'body' => $content
            )
        );
    }
}