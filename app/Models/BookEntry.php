<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BookEntry extends Model
{
    use HasFactory;

    //Defines that a book entry belongs to one specific user.
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
