<?php

use Illuminate\Database\Seeder;
use App\Client;
use App\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Client::truncate();

        factory(User::class, 1)->create();
        factory(Client::class, 300)->create();
    }
}
