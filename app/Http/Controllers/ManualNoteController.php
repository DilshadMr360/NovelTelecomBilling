<?php

namespace App\Http\Controllers;

use App\Models\ManualNote;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManualNoteController extends Controller
{


    public function store($noteText, $account)
{
    $data = [
        'creater' => $account,
        'note' => $noteText,
        'user_id' => Auth::id(), // Assuming you want to store the authenticated user's ID
    ];

    // Store data in the ManualNote model
    $note = ManualNote::create($data);

    return response()->json([
        'creater' => $note->creater, // Return the creater value
        'message' => 'Note saved successfully', // Optionally, you can send a message
    ]);
}


    public function index(Request $request)
    {
        // Get the account ID from the request
        $accId = $request->input('accId');

        // Call the model function to get notes by account ID
        $notes = ManualNote::getNotesByAccountId($accId);

        return response()->json($notes);
    }




}
