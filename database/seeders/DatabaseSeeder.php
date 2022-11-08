<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\BookEntry;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::factory()->create();
        $admin->name = 'Hans Peter';
        $admin->is_admin = 1;
        $admin->email = 'test@test.de';
        $admin->password = bcrypt('Passwort');
        $admin->save();

        $user = User::factory()->create();

        BookEntry::factory(6)->create([
            'user_id' => $user->id
        ]);
    }
}
