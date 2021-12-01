<?php

namespace App\Exports;

use App\Models\Customer;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class CustomersExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Customer::all();
    }

    /**
     * Set header columns
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID',
            'Phone Number',
            'Customer Name',
            'Address',
            'Created At',
            'Last Purchased Date',
            'FBID'
        ];
    }

     /**
     * Mapping data
     *
     * @return array
     */
    public function map($bill): array
    {
        return [
            $bill->id,
            $bill->phoneNumber,
            $bill->name,
            $bill->address,
            $bill->created_at,
            $bill->last_purchased_date,
            $bill->psid
        ];
    }
}
