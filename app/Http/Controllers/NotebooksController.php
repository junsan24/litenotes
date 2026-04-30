<?php

namespace App\Http\Controllers;

use App\Models\Notebook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NotebooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notebooks = Notebook::whereBelongsTo(Auth::user())->where('status', 1)->latest('updated_at')->paginate(5);
        return view('notebooks.index', compact('notebooks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('notebooks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100'
        ]);

        $notebook = new Notebook();
        $notebook->name = $request->name;
        $notebook->description = $request->description;
        $notebook->status = $request->status;
        $notebook->user_id = Auth::id();

        $notebook->save();

        return redirect()->route('notebooks.index')->with('success', 'Notebook created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Notebook $notebook)
    {
        if(!$notebook->user()->is(Auth::user())) {
            abort(403);
        }

        return view('notebooks.show', compact('notebook'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notebook $notebook)
    {
        if(!$notebook->user()->is(Auth::user())) {
            abort(403);
        }

        return view('notebooks.edit', compact('notebook'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Notebook $notebook)
    {

        $request->validate([
            'name' => 'required|max:100',
            'description' => 'nullable|max:255'
        ]);

        $notebook->name = $request->name;
        $notebook->description = $request->description;
        $notebook->status = $request->status;

        $notebook->save();

        return redirect()->route('notebooks.show', $notebook)->with('success', 'Notebook updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notebook $notebook)
    {
        if(!$notebook->user()->is(Auth::user())) {
            abort(403);
        }

        $notebook->notes()->delete();
        $notebook->delete();

        return redirect()->route('notebooks.index')->with('success', 'Notebook deleted.');
    }
}
