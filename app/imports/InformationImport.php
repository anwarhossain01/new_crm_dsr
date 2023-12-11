<?php

namespace App\Imports;

use App\Models\Information;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class InformationImport implements ToModel, WithHeadingRow
{

    public function model(array $row)
    {
     
        return new Information([
            'Agente_ID' => $row["agente_id"],
            'Data_Creaz' => $row["data_creazione"],
            'Tip_Cliente' => $row["topology"],
            'Azienda' => $row["azienda"],
            'Brand' => $row["brandprodotto"],
            'Agente' => $row["agente"],
            'Indirizzo' => $row["indirizzo"],
            'Citta' => $row["citta"],
            'Telefono' => $row["telefono"],
            'Sito' => $row["sito"],
            'Note_Az' => $row["note_sull_azienda"],
            'Referente' => $row["referente"],
            'Pos_Az' => $row["agente_posozione"],
            'Tel_Uf' => $row["ufficio"],
           'Cell' => $row["cell"],
            'Mail' => $row["mail"],
            'Birth' => $row["compleanno"],
            'Note_Ref' => $row["note_sul_referente"],
            'Part_Ev' => $row["part_eventi"],
            'Note_Ev' => $row["note_eventi"],
            'Note_Coll' => $row["note_del_collaboratore"],
            'Notedir' => $row["note_del_direttore"],
            'richiedente' => $row["richiedente"],
        ]);

    }

    public function headingRow(): int
    {
        return 1;
    }

}