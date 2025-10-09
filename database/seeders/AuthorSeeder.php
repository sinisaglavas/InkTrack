<?php

namespace Database\Seeders;

use App\Models\Author;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        $authorNumber = $this->command->getOutput()->ask('How many authors do you want to enter?', 20);
        $this->command->getOutput()->progressStart($authorNumber);

        for ($i=0; $i<=$authorNumber; $i++)
        {
            Author::create([
                'name' => $faker->name, // ako imaš autore sa ID 1-10
                'last_name' => $faker->lastName,              // npr. "The Hidden Garden"
                'year_of_birth' => $faker->numberBetween(1920, (date('Y')-10)),
            ]);
            $this->command->getOutput()->progressAdvance();
        }
        $this->command->getOutput()->progressFinish();
    }

}
