<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Mashup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call([
            UserSeeder::class,
            MashupSeeder::class
        ]);

        $users = User::all();
        $mashups = Mashup::all();

        foreach ($users as $user) {
            $first = rand(1, 3);
            $second = rand(4, 6);
            $user->mashups()->attach([$first, $second]);
        }

        foreach ($mashups as $mashup) {
            $first = rand(1, 3);
            $second = rand(4, 6);
            $mashup->users()->attach([$first, $second]);
        }
    }
}
