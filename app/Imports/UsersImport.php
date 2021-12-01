<?php

namespace App\Imports;

use App\Models\Order;
use App\Models\Customer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Customer([
            'Name' => $row['name'],
            'Phone Number' => $row['phoneNumber'], 
            'Address' => $row['address'],
            'Total Purchase' => Order::where('phoneNumber',$row['phoneNumber'])->sum()
        ]);
    }
}
