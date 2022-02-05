<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Custom response json validation
     *
     * @param Request $request
     * @param array $rules
     * @param array $message
     * @param array $customAttributes
     * @return void
     */
    public function validate(Request $request, array $rules, array $message = [], array $customAttributes = [])
    {
        $validator = $this->getValidationFactory()->make($request->all(), $rules, $message, $customAttributes);

        if ($validator->fails()) {
            $errors = (new \Illuminate\Validation\ValidationException($validator))->errors();

            throw new \Illuminate\Http\Exceptions\HttpResponseException(response()->json([
                'status'    =>  [
                    'code'  => \Illuminate\Http\JsonResponse::HTTP_UNPROCESSABLE_ENTITY,
                    'description'    =>  \Illuminate\Http\JsonResponse::$statusTexts[422]
                ],
                'results'   =>  [
                    'errors'    =>  $errors
                ]
            ], \Illuminate\Http\JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
        }
    }
}
