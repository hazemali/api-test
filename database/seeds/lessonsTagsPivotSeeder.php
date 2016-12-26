<?php

use Illuminate\Database\Seeder;


use Faker\Factory as Faker;
use App\Tag ;
use App\lesson ;


class lessonsTagsPivotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $lessonsId = DB::table('lessons')->pluck('id')->all();

        $tagsId = DB::table('tags')->pluck('id')->all();


        foreach(range(1,30) as $index){

            DB::table('lesson_tag')->insert([
                'lesson_id' => $faker->randomElement($lessonsId),
                'tag_id' => $faker->randomElement($tagsId),
            ]);
        }
    }
}
