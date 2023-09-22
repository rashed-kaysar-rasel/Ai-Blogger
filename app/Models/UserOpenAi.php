<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOpenAi extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'type', 'input', 'output', 'credits'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
