<?php

namespace App\Imports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CustomersImport implements ToModel, WithHeadingRow
{
    use Importable;

    public function model(array $row)
    {
        return new Customer([
            'debtor_code'   => $row['debtor_code'],
            'last_name'     => $row['last_name'],
            'first_name'    => $row['first_name'],
            'business_name' => $row['business_name'],
            'date_of_birth' => $row['date_of_birth'],
            'gender'        => $row['gender'],
            'email_address' => $row['email_address'],
            'address_1'     => $row['address_1'],
            'address_2'     => $row['address_2'],
            'suburb'        => $row['suburb'],
            'state'         => $row['state'],
            'post_code'     => $row['post_code'],
            'email_billing' => $row['email_billing'],
        ]);
    }
}
