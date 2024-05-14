<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManualNote extends Model
{
    use HasFactory;
    protected $fillable = [
        'creater',
        'note',
        'user_id',
    ];
    public static function getNotesByAccountId($accId)
    {
        // Query the notes based on the account ID
        return self::where('creater', $accId)->get();
    }

    //     public function showNotes()
    // {
    //     $account_number = session('account_number'); // Retrieve account number from session

    //     if ($account_number) {
    //         $notes = ManualNote::where('account_number', $account_number)->get(); // Filter notes by account number
    //     } else {
    //         $notes = collect(); // Return an empty collection if no account number
    //     }

    //     return view('notes.show', compact('notes'));
    // }

    // public function clearSession()
    // {
    //     session()->forget('account_number'); // Clear the account number from the session
    //     return redirect()->back(); // Redirect back to where the user was
    // }

}
