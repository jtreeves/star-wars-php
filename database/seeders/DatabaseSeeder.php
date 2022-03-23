<?php

namespace Database\Seeders;

use App\Models\Profile;
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
            ProfileSeeder::class,
            MashupSeeder::class
        ]);

        $profiles = Profile::all();
        $mashups = Mashup::all();

        foreach ($profiles as $profile) {
            $first = rand(1, 3);
            $second = rand(4, 6);
            $profile->mashups()->attach([$first, $second]);
        }

        foreach ($mashups as $mashup) {
            $first = rand(1, 3);
            $second = rand(4, 6);
            $mashup->profiles()->attach([$first, $second]);
        }
    }
}
