<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Namelivia\TravelPerk\OAuth\MissingCodeException;
use Namelivia\TravelPerk\Laravel\Facades\TravelPerk;
use kamermans\OAuth2\Exception\AccessTokenRequestException;
use Illuminate\Support\Facades\Redirect;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if (is_a($exception, MissingCodeException::class)) {
            return Redirect::to(TravelPerk::getAuthUri());
        }
        if (is_a($exception, AccessTokenRequestException::class)) {
            //TODO: This is more informative than the one returned by the oauth library.
            return parent::render($request, $exception->getPrevious());
        }
        return parent::render($request, $exception);
    }
}
