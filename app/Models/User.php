<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'utenze';
    // change primary key
    protected $primaryKey = 'ID';
    // no timestamps
    public $timestamps = false;

    // ...

    // add fillable Nome
    protected $fillable = [
        'Nome',
        'Password',
        'Gruppo',
        'mail', 'active'
    ];


    public function Information(){
        return $this->hasMany(Information::class, 'Agente_ID', 'ID');
    }
}
