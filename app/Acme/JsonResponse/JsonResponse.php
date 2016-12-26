<?php

namespace Acme\JsonResponse;

use Illuminate\Http\Response;

/**
 * Class jsonResponse
 * @package Acme\JsonResponse
 */
class jsonResponse
{


    /**
     * HTTP Status Code
     * @see http://www.restapitutorial.com/httpstatuscodes.html
     * @var int
     */
    protected $HTTP_status_code = Response::HTTP_OK;


    /**
     * @return int
     */
    protected function getStatusCode()
    {
        return $this->HTTP_status_code;
    }


    /**
     * @param $HTTP_status_code
     * @return $this
     */

    protected function setStatusCode($HTTP_status_code)
    {
        $this->HTTP_status_code = $HTTP_status_code;
        return $this;
    }

    /**
     * @param string $message
     * @return Response
     */

    public function respondCreated($message)
    {

        return $this->setStatusCode(Response::HTTP_CREATED)->respondMessage($message);
    }

    /**
     * @param string $message
     * @return Response
     */
    public function respondNotFound($message = 'Source is Not Found')
    {
        return $this->setStatusCode(Response::HTTP_NOT_FOUND)->respondError($message);

    }

    /**
     * @param string $message
     * @return Response
     */

    public function respondInternalError($message = 'Internal error !')
    {

        return $this->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR)->respondError($message);
    }


    public function respondInvalidRequest($message = 'Invalid Request !')
    {

        return $this->setStatusCode(Response::HTTP_UNPROCESSABLE_ENTITY)->respondError($message);

    }


    /**
     * @param string $message
     * @return Response
     */
    public function respondError($message)
    {

        return $this->respond([
            'error' => [
                'message' => $message,
                'status_code' => $this->getStatusCode()
            ]]);

    }

    /**
     * @param string $message
     * @return Response
     */
    public function respondMessage($message)
    {
        return $this->respond([
            'message' => $message
        ]);

    }


    /**
     * display data
     *
     * @param array $data
     * @return Response
     */

    public function respondData(array $data)
    {
        return $this->respond([
            'data' => $data
        ]);
    }


    /**
     * @param array $data
     * @param array $headers
     * @return Response
     */

    private function respond(array $data, $headers = [])
    {
        return Response()->json($data, $this->getStatusCode(), $headers);
    }

}