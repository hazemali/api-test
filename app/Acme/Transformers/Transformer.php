<?php

namespace Acme\Transformers;

abstract class Transformer
{

    /**
     * transform a collection of items
     *
     * @param array $items
     * @return array
     */
    public function transformCollection(array $items)
    {
        return array_map([$this , 'transform'] , $items);
    }


    public abstract function Transform($item);

}