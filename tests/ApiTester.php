<?php

use Faker\Factory as Faker;

class ApiTester extends TestCase
{

    protected $times = 1;

    /**
     * @var \Faker\Generator
     */
    protected $fake;

    /**
     * ApiTester constructor.
     * @param $fake
     */
    public function __construct()
    {
        $this->fake = Faker::create();
    }

    public function times($count)
    {
        $this->times = $count;

        return $this;
    }


    public function getJsonObject($uri)
    {

       return  json_decode($this->getJson($uri)->response->getContent());
        
    }


}