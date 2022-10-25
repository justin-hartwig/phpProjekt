<?php

namespace App\Http\Controllers;

use App\Models\BookEntry;
use Illuminate\Http\Request;

class BookEntryController extends Controller
{
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

        BookEntry::create($formData);

        return redirect('/')->with('message', 'Gästebucheintrag erstellt. Der Eintrag ist sichtbar nach der Freigabe des Betreibers.');
    }
}
