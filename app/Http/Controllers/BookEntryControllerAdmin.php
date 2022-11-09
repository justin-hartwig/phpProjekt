<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\BookEntry;
use Illuminate\Http\Request;

class BookEntryControllerAdmin extends Controller
{
    public function manage() {
        return view('bookentry.manage_admin', ['bookEntrys' => BookEntry::all(), 'users' => User::all()]);
    }

    public function destroy(BookEntry $bookentry) {
        $bookentry->delete();
        return back()->with('message', 'Eintrag wurde gelöscht!');
    }

    public function update(BookEntry $bookentry) {
        $bookentry->update(['released' => !($bookentry->released)]);
        if($bookentry->released) {
            return back()->with('message', 'Gästebucheintrag freigegben.');
        } else {
            return back()->with('message', 'Gästebucheintrag verborgen.');
        }
    }
}