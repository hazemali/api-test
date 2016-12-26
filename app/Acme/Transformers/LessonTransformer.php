<?php


namespace Acme\Transformers;


class LessonTransformer extends Transformer
{


    /**
     * @param $lesson
     * @return array
     */

    public function transform($lesson)
    {

        return [
            'title' => $lesson['title'],
            'body' => $lesson['body']
        ];
    }

}