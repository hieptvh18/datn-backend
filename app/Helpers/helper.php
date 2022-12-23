<?php

use Illuminate\Support\Facades\DB;
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

if(!function_exists('getMaxTable')){
    function getMaxTable ($table, $joinTable, $column=array()) {
        $max = DB::select(DB::raw("select $column[0], $column[1], numCount
        from (
            SELECT o.$column[0] as $column[0], e.$column[1] as $column[1] ,COUNT(o.$column[0]) AS numCount
            , max(COUNT(o.$column[0])) over() as maxof
            FROM $table o
            LEFT JOIN $joinTable e
            ON o.$column[0] = e.id
            GROUP BY o.$column[0], e.$column[1]
            ) d
        where numCount = maxof"));
        return $max;
    }
}

if(!function_exists('getCountTable')){
    function getCountGroupByDateTable ($table, $date_from, $date_to) {
        $data = DB::table($table)
        ->select(DB::raw('count(id) as count, date'))
        ->whereBetween('date', [$date_from, $date_to])
        ->orderBy('date', 'asc')
        ->groupBy('date')
        ->get();
        return $data;
    }
};
