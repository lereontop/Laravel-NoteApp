<?php

namespace App\Http\Controllers;

use App\Models\note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = Note::query()
            ->where('user_id', request()->user()->id)
            ->orderBy('created_at', 'desc')
            ->paginate(15);
        // dd($note);
        return view('note.index', ['notes' => $notes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {



        return  view('note.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([

            'note' => ['required', 'string']
        ]);
        $data['user_id'] = request()->user()->id;
        $note = Note::create($data);
        // return to_route('note.show', $note)->with('message', 'Not Created sucessful');
        return to_route('note.show', $note)->with('message', 'Note Created sucessful');
    }

    /**
     * Display the specified resource.
     */
    public function show(note $note)
    {
        if($note->user_id !== request()->user()->id){
            abort(403);

        }
        return   view('note.show', ['note' => $note]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(note $note)
    {
        if($note->user_id !== request()->user()->id){
            abort(403);

        }
        return   view('note.edit', ['note' => $note]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, note $note)
    {

        $data = $request->validate([
            'note' => ['required', 'string']
        ]);

        $note->update($data);

        return to_route('note.show', $note)->with('message', 'Note Updated sucessful');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(note $note)
    {
        $note->delete();
        return to_route('note.index', $note)->with('message', 'Note Deleted sucessful');
    }
}
