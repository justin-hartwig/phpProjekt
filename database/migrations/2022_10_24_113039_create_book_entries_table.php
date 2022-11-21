<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Schema for a book entry. 
     * Containing a unique id.
     * The id of the user who created the entry.
     * Strings for title and text with different sizes.
     * A field to determine if the entry was released.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title',255);
            $table->string('text',1000);
            $table->string('released')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_entries');
    }
};
