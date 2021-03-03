<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\Person;
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
        Group::factory()
            ->count(1)
            ->has(Person::factory()->count(5), 'persons')
            ->has(Person::factory()->count(3)->inactive(), 'persons')
            ->create();
        Group::factory(1)
            ->archived()
            ->has(Person::factory()->count(5), 'persons')
            ->create();
        // \App\Models\User::factory(10)->create();
    }
}
