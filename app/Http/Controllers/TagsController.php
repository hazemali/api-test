<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use Acme\Transformers\TagsTransformer;
use Acme\JsonResponse\JsonResponse;


class TagsController extends Controller
{


    protected $transformer;

    protected $jsonResponse;

    /**
     * TagsController constructor.
     * @param $transformer
     * @param $jsonResponse
     */
    public function __construct(TagsTransformer $transformer, JsonResponse $jsonResponse)
    {
        $this->transformer = $transformer;
        $this->jsonResponse = $jsonResponse;
    }


    public function index()
    {

        $tags = tag::all();

        return $this->jsonResponse->respondData($this->transformer->transformCollection($tags->toArray()));
        
    }

    public function show($tagId)
    {
        $tag = Tag::findOrFail($tagId)->first();

        return $this->jsonResponse->respondData($this->transformer->transform($tag));

    }


}
