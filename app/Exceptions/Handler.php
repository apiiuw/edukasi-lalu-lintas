<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof NotFoundHttpException) {
            return response()->view('errors.404', ['title' => '404 Not Found | Edulantas'], 404);
        }
    
        // Periksa apakah exception memiliki method getStatusCode()
        if (method_exists($exception, 'getStatusCode')) {
            $statusCode = $exception->getStatusCode();
    
            if ($statusCode == 500) {
                return response()->view('errors.500', ['title' => '500 Server Error | Edulantas'], 500);
            } elseif ($statusCode == 403) {
                return response()->view('errors.403', ['title' => '403 Forbidden | Edulantas'], 403);
            } elseif ($statusCode == 419) {
                return response()->view('errors.419', ['title' => '419 Session Expired | Edulantas'], 419);
            }
        }
    
        return parent::render($request, $exception);
    }
    
}
