<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use App\Tag ;

class tagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        foreach(range(1,10) as $index){

            Tag::create([
                'name' => $this->getUniqueTag()
            ]);

        }

    }

    public function getUniqueTag()
    {
        $word = Faker::create()->word;

        if(! Tag::where('name' , $word)->first() ){
            return $word;
        }

        return $this->getUniqueTag();

    }
}
