<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromQuery, WithHeadings
{
    use Exportable;
    private $data;

    public function __construct($manualData = null)
    {
        $fields = ["Nome", "Gruppo", "mail", "active", "notes"];
        $this->data = $manualData
            ? User::query()->select($fields)->whereIn('ID', $manualData)
            : User::query()->select($fields);
    }

    public function headings(): array
    {
        return [
            'Nome',
            'Gruppo',
            'Mail',
            'Activo',
            'Note',
        ];
    }

    public function query()
    {
        return $this->data;
    }
}
