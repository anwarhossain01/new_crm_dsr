<?php

namespace App\Exports;

use App\Models\Information;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;

use Maatwebsite\Excel\Concerns\WithHeadings;

class InformationExport implements FromQuery, WithHeadings
{

    use Exportable;
    private $data;

    public function __construct($manualData = null)
    {
        $this->data = $manualData
            ? Information::query()->select(['Agente_ID', 'Data_Creaz', 'Tip_Cliente', 'Azienda', 'Brand', 'Agente', 'Indirizzo', 'Citta', 'Telefono', 'Sito', 'Note_Az', 'Referente', 'Pos_Az', 'Tel_Uf', 'Cell', 'Mail', 'Birth', 'Note_Ref', 'Part_Ev', 'Note_Ev', 'Note_Coll', 'Notedir', 'richiedente'])->whereIn('ID', $manualData)
            : Information::query()->select(['Agente_ID', 'Data_Creaz', 'Tip_Cliente', 'Azienda', 'Brand', 'Agente', 'Indirizzo', 'Citta', 'Telefono', 'Sito', 'Note_Az', 'Referente', 'Pos_Az', 'Tel_Uf', 'Cell', 'Mail', 'Birth', 'Note_Ref', 'Part_Ev', 'Note_Ev', 'Note_Coll', 'Notedir', 'richiedente']);
    }

    public function headings(): array
    {
        return [
            'Agente ID',
            'Data Creazione',
            'Topology',
            'Azienda',
            'Brand',
            'Agente',
            'Indirizzo',
            'Citta',
            'Telefono',
            'Sito',
            'Note Sull Azienda',
            'Referente',
            'Agente Posozione',
            'Ufficio',
            'Cell',
            'Mail',
            'Compleanno',
            'Note sul Referente',
            'Part Eventi',
            'Note Eventi',
            'Note del Collaboratore',
            'Note del Direttore',
            'Richiedente'
        ];
    }

    public function query()
    {
        return $this->data;
    }
}