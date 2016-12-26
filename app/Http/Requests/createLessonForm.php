<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Acme\JsonResponse\jsonResponse;


class createLessonForm extends FormRequest
{

    protected $jsonResponse;

    /**
     * createLesson constructor.
     * @param $jsonResponse
     */
    public function __construct(jsonResponse $jsonResponse)
    {
        $this->jsonResponse = $jsonResponse;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'min:3|max:20|required',
            'body' => 'min:3|max:20|required'
        ];
    }


    public function response(array $errors)
    {

        return $this->jsonResponse->respondInvalidRequest($errors);

    }
}
