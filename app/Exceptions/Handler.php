<?php

namespace App\Exceptions;

<<<<<<< HEAD
=======
use Illuminate\Auth\Access\AuthorizationException;
>>>>>>> d2046f5 (7 practice)
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
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
            //
        });
    }
<<<<<<< HEAD
=======

    public function render($request, Throwable $e)
    {
        if ($e instanceof AuthorizationException) {
            $message = $e->getMessage() !== ''
                ? $e->getMessage()
                : 'Недостаточно прав для выполнения этого действия.';

            if ($request->expectsJson()) {
                return response()->json(['message' => $message], 403);
            }

            return redirect()
                ->back(fallback: route('main'))
                ->with('error', $message);
        }

        return parent::render($request, $e);
    }
>>>>>>> d2046f5 (7 practice)
}
