<?php

use App\ServiceCategory;
use Illuminate\Database\Seeder;
use App\Client;
use App\User;
use App\Rate;

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
        ServiceCategory::truncate();
        Rate::truncate();

        factory(User::class, 1)->create();
        factory(Client::class, 300)->create();
        factory(ServiceCategory::class, 5)->create();
        factory(Rate::class, 5)->create();
    }
}
