<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\lesson as lesson;

class lessonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(App\lesson::class , 30)->create();

    }
}
