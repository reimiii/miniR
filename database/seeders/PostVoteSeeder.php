<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PostVoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\PostVote::factory(5000)->create();
    }
}
