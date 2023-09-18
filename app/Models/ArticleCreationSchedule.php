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
        'length',
        'voice_tone',
        'creativity',
        'frequency',
        'status',
    ];
}
