<?php

namespace Database\Seeders;

use App\Models\Person;
use App\Models\Teacher;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Person::factory(12)->create()->each(function ($person){
            Teacher::factory()->create(['person_id'=>$person->id]);
        });
    }
}
