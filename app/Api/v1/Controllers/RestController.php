<?php

namespace App\Api\v1\Controllers;

use App\Http\Requests;
use Laravel\Lumen\Routing\Controller as BaseController;

class RestController extends BaseController
{
    /**
     * @var int
     */
    protected $statusCode = 200;

    /**
     * @param $statusCode
     * @return $this
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * @param string $message
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function responseNotFound($message = 'Not Found!')
    {
        return $this->setStatusCode(404)->responseWithError($message);
    }

    public function responseWithError($message)
    {
        $response = [
            'code' => $this->statusCode,
            'status' => 'success',
            'message' => $message
        ];
        return response()->json($response, $this->statusCode);
    }
    public function responseData($data, $headers =[])
    {
        $response = [
            'code' => $this->statusCode,
            'status' => 'success',
            'data' => $data
        ];
        return response()->json($response, $this->statusCode,$headers);
    }


    protected function createdResponse($data)
    {
        $response = [
            'code' => 201,
            'status' => 'success',
            'data' => $data
        ];
        return response()->json($response, $response['code']);
    }
    protected function showResponse($data)
    {
        $response = [
            'code' => 200,
            'status' => 'success',
            'data' => $data
        ];
        return response()->json($response, $response['code']);
    }
    protected function errorResponse($message)
    {
        $response = [
            'code' => 400,
            'status' => 'error',
            'data' => 'Resource Not Found',
            'message' => $message
        ];
        return response()->json($response, $response['code']);
    }
    protected function notFoundResponse($message)
    {
        $response = [
            'code' => 404,
            'status' => 'error',
            'data' => 'Resource Not Found',
            'message' => $message
        ];
        return response()->json($response, $response['code']);
    }
    protected function deletedResponse($message)
    {
        $response = [
            'code' => 204,
            'status' => 'success',
            'data' => [],
            'message' => $message
        ];
        return response()->json($response, $response['code']);
    }
    protected function clientErrorResponse($data)
    {
        $response = [
            'code' => 422,
            'status' => 'error',
            'data' => $data,
            'message' => 'Unprocessable entity'
        ];
        return response()->json($response, $response['code']);
    }
}
