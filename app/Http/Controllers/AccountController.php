<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\AccountService;
use App\Models\Address;
use App\Models\Billing;
use App\Models\Contact;
use App\Models\ManualNote;
use App\Models\Phone;
use Exception;
use Illuminate\Http\Request;


class AccountController extends Controller
{
    public function account_index(Request $request)
    {
        return view('account.newAccount');
    }

    public function store(Request $request)
    {
        // dd($request);
        // Validate the incoming request data
        $validatedAccountData  = $request->validate([
            //     'contact_code' => 'required|numeric',
            //     'typeSelect' => 'required|numeric',
            //     'key' => 'nullable|numeric',
            //     'title' => 'nullable|numeric',
            //     'business_unit' => 'required|string|max:255',
            //     'name' => 'required|string|max:255',
            //     'trading_name' => 'nullable|string|max:255',
            //     'acn' => 'required|string|max:255',
            //     'abn' => 'required|string|max:255',
            //     'email' => 'nullable|email|max:255',
            //     'question' => 'nullable|string|max:255',
            //     'answer' => 'nullable|string|max:255',
            //     'initials' => 'nullable|string|max:255',
            //     'first_name' => 'required|string|max:255',
            //     'last_name' => 'required|string|max:255',
            //     'gender' => 'required|string|max:255',
            //     'date_of_birth' => 'required|date',
            //     'salutation' => 'nullable|string|max:255',
            //     'employee_no' => 'nullable|string|max:255',
            //     'question_2' => 'nullable|string|max:255',
            //     'answer_2' => 'nullable|string|max:255',

            //     'address1' => 'required|string|max:255',
            //     'address2' => 'required|string|max:255',
            //     'post_code' => 'required|numeric|max:255',
            //     'suburb' => 'required|string|max:255',
            //     'state' => 'required|string|max:255',
            //     'country' => 'required|string|max:255',
            //     'address_type' => 'required|string|max:255',

            //     'area_code' => 'required|string|max:255',
            //     'phone_number' => 'required|string|max:255',
            //     'phone_type' => 'required|string|max:255',

            //     'paymentType' => 'nullable|string|max:255',
            //     'provide_paper_bill' => 'required|string|max:255',
            //     'provide_email_bill' => 'required|string|max:255',
            //     'provide_excel_bill' => 'required|string|max:255',

            //     'contact_code2' => 'required|string|max:255',
            //     'contact_type' => 'required|string|max:255',
            //     'name1' => 'required|string|max:255',
        ]);

        // Create the Account record
        $accountValidate = Account::where('contact_code', $request->contact_code)->first();

        if ($accountValidate == null) {
            $accountData = [
                'contact_code' => $request->contact_code,
                'typeSelect' => $request->typeSelect,
                'key' => $request->key,
                'title' => $request->title,
                'business_unit' => 'Novel Telecom',
                'name' => $request->name,
                'trading_name' => $request->trading_name,
                'acn' => $request->acn,
                'abn' => $request->abn,
                'email' => $request->email,
                'question' => $request->question,
                'answer' => $request->answer,
                'initials' => $request->initials,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'gender' => $request->gender,
                'date_of_birth' => $request->date_of_birth,
                'salutation' => $request->salutation,
                'employee_no' => $request->employee_no,
                'question_2' => $request->question_2,
                'answer_2' => $request->answer_2,
            ];
            $account = Account::create($accountData);


            // Create the Address record
            for ($i = 0; $i < count($request->address2s); $i++) {
                $addressData = [
                    'contact_code' => $request->contact_code,
                    'address1' => $request->address1s[$i],
                    'address2' => $request->address2s[$i],
                    'post_code' => $request->post_codes[$i],
                    'suburb' => $request->suburbs[$i],
                    'state' => $request->states[$i],
                    'country' => $request->countrys[$i],
                    'address_type' => $request->addresstypes[$i],
                ];

                $address = Address::create($addressData);
            }


            // Create the Phone record
            for ($i = 0; $i < count($request->area_codes); $i++) {
                $phoneData = [
                    'contact_code' => $request->contact_code,
                    'area_code' => $request->area_codes[$i],
                    'phone_number' => $request->phone_numbers[$i],
                    'phone_type' => $request->phone_types[$i],
                ];

                $phone = Phone::create($phoneData);
            }

            // Create the Billing record
            for ($i = 0; $i < count($request->area_codes); $i++) {
                $billingData = [
                    'contact_code' => $request->contact_code,
                    'paymentType' => $request->paymentType,
                ];

                if (isset($request->bill_types[$i])) {
                    $billingData['bill_types'] = $request->bill_types[$i];
                }

                $billing = Billing::create($billingData);
            }

            // Create the Contact record
            for ($i = 0; $i < count($request->contact_types); $i++) {
                $contactData = [
                    'contact_code' => $request->contact_code,
                    'contact_code2s' => $request->contact_code2s[$i],
                    'contact_types' => $request->contact_types[$i],
                    'name1s' => $request->name1s[$i],
                    'contactUsages' => $request->contactUsages[$i],
                ];
                $contact = Contact::create($contactData);
            }

            // Redirect the user after successful creation
            return view('account.newAccount')->with('success', 'Account created successfully!');
        }
        else {
            return redirect()->back();
        }

    }

    public function search(Request $request)
    {
        try {
            $account_number = $request->search;



            $account = Account::where('contact_code', $account_number)->first();
            // Check if there is an existing 'account_number' session variable and clear it
            if (session()->has('account_number')) {
                session()->forget('account_number');
            }

            // Set the new account number in the session
            session(['account_number' => $account->id]);
            if ($account) {
                $address = Address::getAddressDetails($account->contact_code);
                $bill = Billing::getBillDetails($account->contact_code);
                $contact = Contact::getContactDetails($account->contact_code);
                $phone = Phone::getPhoneDetails($account->contact_code);

                $accountservice=AccountService::getData($account->id);
                // dd($accountservice);


                $notes = ManualNote::getNotesByAccountId($account->id);

                return view('user.home', compact('account', 'address', 'bill', 'contact', 'phone', 'account_number', 'notes','accountservice'));

            } else {
                $account = null;
                return view('user.home', compact('account', 'account_number'));
            }
        } catch (Exception $e) {
            $account = null;
            return view('user.home', compact('account', 'account_number'));
        }
    }
}
