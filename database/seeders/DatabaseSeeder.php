<?php

namespace Database\Seeders;

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
        $users = \App\Models\User::factory(1)->create([
            'name' => 'Dale Snowdon',
            'email' => 'dale@snowdon.dev',
            'email_verified_at' => null,
        ]);

        \App\Models\Message::factory(10)->create([
            'message' => 'asdfasdf',
            'user_id' => $users->first()->id,
        ]);
    }
}
