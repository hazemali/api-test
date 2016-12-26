<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $tables = [
        'lessons','users','tags','lesson_tag'
    ];

    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        $this->cleanTables();

        $this->call(usersSeeder::class);
        $this->call(lessonsSeeder::class);
        $this->call(tagsSeeder::class);
        $this->call(lessonsTagsPivotSeeder::class);

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

    }


    protected function cleanTables()
    {

        foreach($this->tables as $table){

            DB::Table($table)->truncate();
        }


    }
}
