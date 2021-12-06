<?php

namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Validation\ValidationException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var string[]
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var string[]
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->renderable(function (Throwable $e, $request) {
            if ($request->wantsJson()) {
                $response = ['success' => false, 'message' => $e->getMessage()];

                if ($e instanceof ValidationException) {
                    $response = array_merge($response, ['errors' => $e->errors()]); 
                }                
                
                if ($e instanceof UnauthorizedHttpException) {
                    $response['message'] = 'Invalid login or password'; 
                }

                return response()->json($response, 400); 
            }
        });
    } 

}
