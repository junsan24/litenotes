<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Notebook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = Note::whereBelongsTo(Auth::user())->where('status', 1)->latest('updated_at')->paginate(5);
        return view('notes.index')->with('notes', $notes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $notebooks = Notebook::whereBelongsTo(Auth::user())->orderBy('name', 'ASC')->get();
        return view('notes.create', compact('notebooks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|max:150',
            'content' => 'required',
            'notebook' => 'required'
        ]);

        Auth::user()->notes()->create([
            'uuid' => Str::uuid(),
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'status' => $request->get('status'),
            'notebook_id' => $request->get('notebook')
        ]);

        return redirect()->route('notes.index')->with('success', 'Note saved!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        if(!$note->user->is(Auth::user())) {
            abort(403);
        }

        return view('notes.show', [ 'note' => $note ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        if(!$note->user->is(Auth::user())) {
            abort(403);
        }

        $notebooks = Notebook::where('user_id', Auth::id())->orderBy('name', 'ASC')->get();

        return view('notes.edit', compact('note', 'notebooks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        if(!$note->user->is(Auth::user())) {
            abort(403);
        }

        $request->validate([
            'title' => 'required|max:150',
            'content' => 'required',
        ]);

        $note->update([
            'title' => $request->title,
            'content' => $request->content,
            'status' => $request->status,
            'notebook_id' => $request->notebook
        ]);

        return redirect()->route('notes.show', compact('note'))->with('success', 'Note updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        if(!$note->user->is(Auth::user())) {
            abort(403);
        }

        $note->delete();

        return to_route('notes.index', $note)->with('success', 'Note deleted!');
    }
}
