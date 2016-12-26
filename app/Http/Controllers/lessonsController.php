<?php

namespace App\Http\Controllers;

use Acme\Transformers\TagsTransformer;
use App\Http\Requests\createLessonForm;
use Acme\JsonResponse\jsonResponse;
use Acme\Transformers\LessonTransformer;
use App\Lesson;

class lessonsController extends Controller
{

    /**
     * @var Acme\Transformers\LessonTransformer
     */

    protected $lessonTransformer;

    /**
     * @var Acme\JsonResponse\JsonResponse
     */
    protected $jsonResponse;

    /**
     * lessonsController constructor.
     * @param $lessonTransformer
     * @param $jsonResponse
     */
    public function __construct(LessonTransformer $lessonTransformer , jsonResponse $jsonResponse)
    {
        $this->lessonTransformer = $lessonTransformer;
        $this->jsonResponse = $jsonResponse;

        $this->middleware('auth.basic')->only('store');
    }

    /**
     * @return mixed
     */
    public function index()
    {

        $lessons = Lesson::all();

        return $this->jsonResponse->respondData($this->lessonTransformer->transformCollection($lessons->toArray()));
    }

    /**
     * @param $lessonId
     * @return mixed
     */

    public function show($lessonId)
    {
        $lesson = Lesson::find($lessonId);
        if (!$lesson) {

            return $this->jsonResponse->respondNotFound('Lesson Not found!');
        }

        return $this->jsonResponse->respondData($this->lessonTransformer->transform($lesson));

    }

    /**
     * @param createLessonForm $request
     * @return \Illuminate\Http\Response
     */

    public function store(createLessonForm $request)
    {

        Lesson::create(['title' => $request->input('title') , 'body' => $request->input('body')]);

        return $this->jsonResponse->respondCreated('Lesson Successfully Created!');

    }

    /**
     * @param $lessonId
     * @param TagsTransformer $tagsTransformer
     * @return \Illuminate\Http\Response
     */
    public function tags($lessonId , TagsTransformer $tagsTransformer)
    {
        $lesson = Lesson::findOrFail($lessonId);

        $tags = $lesson->tags->toArray();

        return $this->jsonResponse->respondData($tagsTransformer->transformCollection($tags));


    }


}
