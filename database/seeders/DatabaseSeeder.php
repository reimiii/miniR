<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        \App\Models\User::factory(200)->create();
        \App\Models\Topic::factory(50)->create();
        $this->call(CommunitySeeder::class);
        $this->call(PostSeeder::class);
        $this->call(PostVoteSeeder::class);
    }

}
