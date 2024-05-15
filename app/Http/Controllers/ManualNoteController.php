<?php

namespace App\Http\Controllers;

use App\Models\ManualNote;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManualNoteController extends Controller
{


    public function store( Request $request){

        $data = [
            'creater' =>  $request->input('accountId'),
            'note' => $request->input('note'),
            'user_id' => Auth::check(),
        ];

        // Store data in the ManualNote model
        $note = ManualNote::create($data);

        return response()->json([
            'creater' => $note->creater, // Return the creater value
            'message' => 'Note saved successfully', // Optionally, you can send a message
        ]);
    //     $validatedData = $request->validate([
    //         'note' => 'required|string', // Adjust validation rules as needed
    //     ]);

    //     try {
    //         $note = ManualNote::create([
    //             'note' => $validatedData['note'],
    //         ]);
    //         return response()->json(['message' => 'Note saved successfully', 'note' => $note], 200);
    //     } catch (Exception $e) {
    //         return response()->json(['error' => 'Failed to save note: ' . $e->getMessage()], 500);
    //     }

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
