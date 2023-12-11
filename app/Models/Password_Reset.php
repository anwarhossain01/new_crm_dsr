<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Password_Reset extends Model
{
    use HasFactory;
    protected $table = 'password_reset_tokens';
    public $timestamps = false;

    public $fillable = [
        'token'
    ];
}
