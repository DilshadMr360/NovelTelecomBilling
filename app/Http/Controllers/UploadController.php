<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CustomersImport;
use App\Imports\AccountsImport;

class UploadController extends Controller
{
    public function uploadFile(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|file|mimes:xlsx,csv',
        ]);

        Excel::import(new CustomersImport, request()->file('csv_file'));

        return back()->with('success', 'Customers imported successfully.');
    }
    public function excelupload(Request $request){
        
        $request->validate([
            'csv_file' => 'required|file|mimes:xlsx,csv',
        ]);

        Excel::import(new AccountsImport, request()->file('csv_file'));

        return back()->with('success', 'Customers imported successfully.');
    
}
}
