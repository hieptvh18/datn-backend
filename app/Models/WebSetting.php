<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebSetting extends Model
{
    use HasFactory;

    protected $table = 'web_settings';

    protected $fillable = [
        'logo',
        'web_name',
        'base_url',
        'phones',
        'email',
        'facebook_url',
        'twitter_url',
        'instagram_url',
        'youtobe_url',
        'address',
        'open_time',
        'close_time',
        'start_date',
        'end_date',
        'short_introduce',
        'introduce',
    ];
}
