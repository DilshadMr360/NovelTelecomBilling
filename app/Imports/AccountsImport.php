<?php

namespace App\Imports;

use App\Models\Account;
use App\Models\Address;
use App\Models\Billing;
use App\Models\Contact;
use App\Models\Phone;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AccountsImport implements ToModel,WithHeadingRow
{
    use Importable;

    public function model(array $row)
    {
        // dd($row);
        $existingAccount = Account::where('contact_code', $row['contact_code'])->exists();
        // dd($existingAccount);
        if(!$existingAccount){
            $accountData = [
                'contact_code'  => $row['contact_code'],
                'typeSelect'    => $row['typeselect'],
                'key'           => $row['key'],
                'title'         => $row['title'],
                'business_unit' => 'Novel Telecom',
                'name'          => $row['name'],
                'trading_name'  => $row['trading_name'],
                'acn'           => $row['acn'],
                'abn'           => $row['abn'],
                'email'         => $row['email'],
                'question'      => $row['question'],
                'answer'        => $row['answer'],
                'initials'      => $row['initials'],
                'first_name'    => $row['first_name'],
                'last_name'     => $row['last_name'],
                'gender'        => $row['gender'],
                'date_of_birth' => $row['date_of_birth'],
                'salutation'    => $row['salutation'],
                'employee_no'   => $row['employee_no'],
                'question_2'    => $row['question_2'],
                'answer_2'      => $row['answer_2'],
            ];
            $account = Account::create($accountData);
        }
        
        // Create the Address record
        $addressData = [
            'contact_code'  => $row['contact_code'],
            'address1'      => $row['address1'],
            'address2'      => $row['address2'],
            'post_code'     => $row['post_code'],
            'suburb'        => $row['suburb'],
            'state'         => $row['state'],
            'country'       => $row['country'],
            'address_type'  => $row['address_type'],
        ];
        $address = Address::create($addressData);
    
        // Create the Phone record
        $phoneData = [
            'contact_code'  => $row['contact_code'],
            'area_code'     => $row['area_code'],
            'phone_number'  => $row['phone_number'],
            'name1'         => $row['phone_type'],
        ];
        $phone = Phone::create($phoneData);
    
        // Create the Billing record
        $billingData = [
            'contact_code'  => $row['contact_code'],
            'bill_types'    => $row['bill_types'],
        ];
        $billing = Billing::create($billingData);
    
        // Create the Contact record
        $contactData = [
            'contact_code'  => $row['contact_code'],
            'contact_code1' => $row['contact_code1'],
            'contact_type'  => $row['contact_type'],
            'name'  => $row['name'],
            'contact_usage'  => $row['contact_usage'],
        ];
        $contact = Contact::create($contactData);
    
        // You can return any of the created models if needed
        return null;
    
}
}