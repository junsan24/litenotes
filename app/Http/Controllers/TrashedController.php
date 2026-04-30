<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrashedController extends Controller
{
    public function index()
    {
        $notes = Note::whereBelongsTo(Auth::user())->onlyTrashed()->get();
        return view('trashed.index', compact('notes'));
    }
}
