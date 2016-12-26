<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\lesson;

class LessonsTest extends ApiTester
{


    /**  @test */

    public function it_fetches_lessons()
    {

        // arrange
        $this->makeLesson();

        // act
        $this->getJson('api/v1/lessons');

        // assert

        $this->assertResponseOk();


    }

    /** @test */
    public function it_fetches_a_single_lesson()
    {

        $this->makeLesson();

        $lesson = $this->getJsonObject('api/v1/lessons/1')->data;

        $this->assertObjectHasAttribute('title',$lesson);
        $this->assertObjectHasAttribute('body',$lesson);

        $this->assertResponseOk();


    }


    private function makeLesson($lessonFields = [])
    {


        while($this->times--) {

            $lesson = array_merge([
                'title' => $this->fake->sentence,
                'body' => $this->fake->paragraph
            ],$lessonFields);


            lesson::create($lesson);
        }

    }



}
