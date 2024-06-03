<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\AccountService;
use App\Models\Address;
use App\Models\Billing;
use App\Models\Contact;
use App\Models\ManualNote;
use App\Models\Phone;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){

        $account_number = session('account_number');
        // dd($account_number);
        $account = Account::where('id', $account_number)->first();
        // dd($account);
        if ($account) {
            $address = Address::getAddressDetails($account->contact_code);
            $bill = Billing::getBillDetails($account->contact_code);
            $contact = Contact::getContactDetails($account->contact_code);
            $phone = Phone::getPhoneDetails($account->contact_code);
            $accountservice = AccountService::getData($account->id);
            $notes = ManualNote::getNotesByAccountId($account->id);
            $account_number = $account->contact_code;

            return view('user.home', compact('account', 'address', 'bill', 'contact', 'phone', 'account_number', 'notes', 'accountservice'));
        } else {
            $account = null;
            return view('user.home', compact('account', 'account_number'));
        }
    }
    
}
