<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;

class ApiException extends HttpResponseException
{
    public function __construct($code, $message, $errors = [])
    {
        $response = [
            'massage' => $message
        ];

        if (count($errors)){
            $response['errors'] = $errors;
        }
        parent::__construct(response()->json($response)->setStatusCode($code, $message));
    }
}
