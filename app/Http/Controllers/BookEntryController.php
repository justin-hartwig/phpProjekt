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
        return view('bookentry.create', [
            'bookEntrys' => BookEntry::all()
        ]);
    }
}
