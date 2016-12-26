<?php


namespace Acme\Transformers;


class TagsTransformer extends Transformer
{


    /**
     * @param $Tag
     * @return array
     */

    public function transform($Tag)
    {

        return [
            'name' => $Tag['name'],
        ];
    }

}