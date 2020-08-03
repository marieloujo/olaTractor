<?php

namespace App\Exports;

use App\Modeles\Tracteur;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class TracteursExport implements FromCollection, WithHeadings
{

    public function collection()
    {
        return Tracteur::all();
    }


    public function headings(): array
    {
        return [
            '#',
            'id',
            'Marque',
            'Modele',
            'Puissance'
        ];
    }

}