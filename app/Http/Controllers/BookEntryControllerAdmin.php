<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\BookEntry;

// This Controller manages all operations of the admin user concerning the book entries.
class BookEntryControllerAdmin extends Controller
{
    //Returns the manage view with all entries and all users.
    public function manage() {
        return view('bookentry.manage_admin', ['bookEntrys' => BookEntry::all(), 'users' => User::all()]);
    }

    //Deletes the specified entry and returns the user back to the previous view.
    public function destroy(BookEntry $bookentry) {
        $bookentry->delete();
        return back()->with('message', 'Eintrag wurde gelöscht!');
    }

    //Changes visibility of the specified entry depending on its current visibility.
    public function update(BookEntry $bookentry) {
        $bookentry->update(['released' => !($bookentry->released)]);
        if($bookentry->released) {
            return back()->with('message', 'Gästebucheintrag freigegben.');
        } else {
            return back()->with('message', 'Gästebucheintrag verborgen.');
        }
    }
}