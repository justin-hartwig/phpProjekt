<?php

namespace App\Http\Controllers;

use App\Models\BookEntry;
use App\Models\User;
use Illuminate\Http\Request;

//This Controller manages all CRUD operations concerning the book entries.
class BookEntryController extends Controller
{
    //Checks if the performed user action was allowed. Returns a 403 code if not.
    public function userActionAllowed(BookEntry $bookentry){
        if($bookentry->user_id != auth()->id()){
            abort(403, 'Unerlaubte Aktion!');
        }
    }

    //Returns the index view and passes all book entries and users to it.
    public function index() {
        return view('bookentry.index', [
            'bookEntrys' => BookEntry::all(),
            'users' => User::all()
        ]);
    }

    //Processes the given request query and returns the suitable book entries and all users as JSON.
    public function search(Request $request) {
        $entrys = BookEntry::where('title', 'Like', '%'.$request->search.'%')->get();

        return response()->json([
            'entrys' => $entrys,
            'users' => User::all()
         ]);
    }

    //Returns the show view with a specific entry and all users.
    public function show(BookEntry $bookentry) {
        return view('bookentry.show', [
            'bookEntry' => $bookentry,
            'users' => User::all()
        ]);
    }

    //Returns the create view.
    public function create() {
        return view('bookentry.create');
    }

    /*Stores a book entry with the given data. The data is validated to be not empty and not too long.
    Returns the user back to the home screen.*/
    public function store(Request $request) {
        $formData = $request->validate([
            'title' => 'required|max:255',
            'text' => 'required|max:1000'
        ]);

        $formData['user_id'] = auth()->id();

        BookEntry::create($formData);

        return redirect('/')->with('message', 'Gästebucheintrag erstellt. Der Eintrag ist sichtbar nach der Freigabe des Betreibers.');
    }

    //Checks if the user action was allowed and returns the edit view.
    public function edit(BookEntry $bookentry) {
        BookEntryController::userActionAllowed($bookentry);

        return view('bookentry.edit', ['bookentry' => $bookentry]);
    }

    /*Updates the current book entry with the given data. The data is validated to be not empty and not too long.
    Returns the user back to the detail site of the updated entry.*/
    public function update(Request $request, BookEntry $bookentry) {
        $formData = $request->validate([
            'title' => 'required|max:255',
            'text' => 'required|max:1000'
        ]);

        $bookentry->update($formData);
        $bookentry->update(['released' => false]);

        return redirect('/Eintraege/'.$bookentry->id)->with('message', 'Gästebucheintrag bearbeitet. Der bearbeitete Eintrag ist sichtbar nach der Freigabe des Betreibers.');
    }

    //Checks if the user action was allowed and deletes the specified entry. Returns the user to the home screen.
    public function destroy(BookEntry $bookentry) {
        BookEntryController::userActionAllowed($bookentry);

        $bookentry->delete();
        return redirect('/')->with('message', 'Eintrag wurde gelöscht!');
    }

    //Returns the manage view with all entries of the current user and all users.
    public function manage() {
        return view('bookentry.manage', ['bookEntrys' => auth()->user()->bookentrys()->get(), 'users' => User::all()]);
    }
}
