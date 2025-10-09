<?php

namespace Database\Seeders;

use App\Models\Book;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        $bookNumber = $this->command->getOutput()->ask('How many books do you want to enter?', 80);
        $this->command->getOutput()->progressStart($bookNumber);

        for ($i=0; $i<$bookNumber; $i++)
        {
            Book::create([
                'author_id' => $faker->numberBetween(1, 20),
                'title' => $faker->sentence(3), // npr. "The Hidden Garden"
                'year_of_publication' => $faker->numberBetween(1500, date('Y')),
                'genre' => $faker->randomElement(['Drama', 'Horror', 'Mystery', 'Romance', 'Action/Adventure', 'Fantasy']),
                'status' => $faker->boolean(),
            ]);
            $this->command->getOutput()->progressAdvance();
        }
        $this->command->getOutput()->progressFinish();
    }
}
