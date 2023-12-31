<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutoGeneratedArticle extends Model
{
    use HasFactory;
    protected $fillable = [
        'topic',
        'article',
        'total_token'
    ];
}
