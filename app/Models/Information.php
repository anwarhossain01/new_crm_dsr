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

    protected $fillable = [
        'Agente_ID', 'Data_Creaz', 'Tip_Cliente', 'Azienda', 'Brand', 'Agente',
        'Indirizzo', 'Citta', 'Telefono', 'Sito', 'Note_Az', 'Referente', 'Pos_Az',
        'Tel_Uf', 'Cell', 'Mail', 'Birth', 'Note_Ref', 'Part_Ev', 'Note_Ev',
        'Note_Coll', 'Notedir', 'richiedente'
    ];

    public function User(){

        return $this->hasOne(User::class, 'ID', 'Agente_ID');
    }

}
