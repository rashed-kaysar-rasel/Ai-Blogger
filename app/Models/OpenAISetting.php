<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpenAiSetting extends Model
{
    use HasFactory;
    protected $fillable = [
        'api_key',
        'default_model',
        'default_language',
        'default_voice_tone',
        'default_creativity',
        'max_input_length',
        'max_output_length',
    ];
}
