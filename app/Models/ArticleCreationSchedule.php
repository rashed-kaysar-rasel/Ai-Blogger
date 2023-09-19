<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleCreationSchedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'topics',
        'language',
        'max_length',
        'voice_tone',
        'creativity',
        'interval',
        'status',
    ];
}
