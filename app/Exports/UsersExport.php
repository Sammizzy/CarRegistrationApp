<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return User::orderBy('last_name')->orderBy('first_name')->get(['first_name','last_name','car_registration']);
    }

    public function map($user): array
    {
        return [
            $user->first_name . ' ' . $user->last_name,
            $user->car_registration,
        ];
    }

    public function headings(): array
    {
        return ['Name', 'Car Registration'];
    }
}
