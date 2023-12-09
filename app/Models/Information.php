<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;
    protected $table = "anagrafiche";
    // change primary key
    protected $primaryKey = 'ID';

// no time stamps
    public $timestamps = false;

    public function User(){

        return $this->hasOne(User::class, 'ID', 'Agente_ID');
    }

}
