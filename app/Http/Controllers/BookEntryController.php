<?php

namespace App\Http\Controllers;

use App\Models\BookEntry;
use App\Models\User;
use Illuminate\Http\Request;

class BookEntryController extends Controller
{
    public function userActionAllowed(BookEntry $bookentry){
        if($bookentry->user_id != auth()->id()){
            abort(403, 'Unerlaubte AKtion!');
        }
    }

    public function index() {
        return view('bookentry.index', [
            'bookEntrys' => BookEntry::all()
        ]);
    }

    public function show(BookEntry $bookentry) {
        return view('bookentry.show', [
            'bookEntry' => $bookentry
        ]);
    }

    public function create() {
        return view('bookentry.create');
    }

    public function store(Request $request) {
        $formData = $request->validate([
            'title' => 'required|max:255',
            'text' => 'required|max:1000'
        ]);

        $formData['user_id'] = auth()->id();

        BookEntry::create($formData);

        return redirect('/')->with('message', 'Gästebucheintrag erstellt. Der Eintrag ist sichtbar nach der Freigabe des Betreibers.');
    }

    public function edit(BookEntry $bookentry) {
        BookEntryController::userActionAllowed($bookentry);

        return view('bookentry.edit', ['bookentry' => $bookentry]);
    }

    public function update(Request $request, BookEntry $bookentry) {
        $formData = $request->validate([
            'title' => 'required|max:255',
            'text' => 'required|max:1000'
        ]);

        $bookentry->update($formData);
        $bookentry->update(['released' => false]);

        return redirect('/bookentrys/'.$bookentry->id)->with('message', 'Gästebucheintrag bearbeitet. Der bearbeitete Eintrag ist sichtbar nach der Freigabe des Betreibers.');
    }

    public function destroy(BookEntry $bookentry) {
        BookEntryController::userActionAllowed($bookentry);

        $bookentry->delete();
        return redirect('/')->with('message', 'Eintrag wurde gelöscht!');
    }

    public function manage() {
        return view('bookentry.manage', ['bookEntrys' => auth()->user()->bookentrys()->get()]);
    }
}
