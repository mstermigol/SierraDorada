<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Exceptions\PostTooLargeException;
use Throwable;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\MessageBag;


class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = ['current_password', 'password', 'password_confirmation'];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Illuminate\Http\Response
     */


     public function render($request, Throwable $exception)
     {
         if ($exception instanceof PostTooLargeException) {
             $errorMessages = ['File too large. Please upload a smaller file.'];
             $errors = new MessageBag(['default' => $errorMessages]);
             $previousUrl = URL::previous();
             $viewName = app('router')->getRoutes()->match(app('request')->create($previousUrl))->getName();
             return response()->view($viewName, ['errors' => $errors], 500);
         }

         return parent::render($request, $exception);
     }



}
