<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Note extends Model
{
    use HasFactory;
    protected $fillable = [
        'content',
        'user_id',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public static function setNote($content)
    {
        
        $userId = Auth::id();
        $note = new Note();
        $note->user_id = $userId;
        $note->content = $content;
        $note->save();

        return $note;
    }
}
