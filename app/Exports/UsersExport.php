<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    protected $userIds;

    public function __construct(array $userIds = [])
    {
        $this->userIds = $userIds;
    }

    public function collection()
    {
        $query = User::query()->select('first_name', 'last_name', 'car_registration');

        if (!empty($this->userIds)) {
            $query->whereIn('id', $this->userIds);
        }

        return $query->get();
    }

    public function headings(): array
    {
        return [
            'First Name',
            'Last Name',
            'Car Registration',
        ];
    }
}
