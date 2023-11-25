<?php

namespace App\Exceptions;

use App\Mail\ErrorAlert;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

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
            // Create Notification Data
            $exception      = [
                "name"      => get_class($e),
                "message"   => $e->getMessage(),
                "file"      => $e->getFile(),
                "line"      => $e->getLine(),
            ];

            \Log::error($e->getTraceAsString());
            Mail::to(env('APP_DEV_EMAIL', 'support@companyDomain.com'))->send(new ErrorAlert($exception));//Uses developer email found in .env or default company email.

            abort(Response::HTTP_INTERNAL_SERVER_ERROR);
        });

    }
}
