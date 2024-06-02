<?php

namespace Illuminate\Foundation\Testing\Concerns;

use Illuminate\Contracts\Debug\ExceptionHandler;
<<<<<<< HEAD
=======
use Illuminate\Support\Testing\Fakes\ExceptionHandlerFake;
use Illuminate\Testing\Assert;
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
use Illuminate\Validation\ValidationException;
use Symfony\Component\Console\Application as ConsoleApplication;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

trait InteractsWithExceptionHandling
{
    /**
     * The original exception handler.
     *
     * @var \Illuminate\Contracts\Debug\ExceptionHandler|null
     */
    protected $originalExceptionHandler;

    /**
     * Restore exception handling.
     *
     * @return $this
     */
    protected function withExceptionHandling()
    {
        if ($this->originalExceptionHandler) {
            $currentExceptionHandler = app(ExceptionHandler::class);

            $currentExceptionHandler instanceof ExceptionHandlerFake
                ? $currentExceptionHandler->setHandler($this->originalExceptionHandler)
                : $this->app->instance(ExceptionHandler::class, $this->originalExceptionHandler);
        }

        return $this;
    }

    /**
     * Only handle the given exceptions via the exception handler.
     *
     * @param  array  $exceptions
     * @return $this
     */
    protected function handleExceptions(array $exceptions)
    {
        return $this->withoutExceptionHandling($exceptions);
    }

    /**
     * Only handle validation exceptions via the exception handler.
     *
     * @return $this
     */
    protected function handleValidationExceptions()
    {
        return $this->handleExceptions([ValidationException::class]);
    }

    /**
     * Disable exception handling for the test.
     *
     * @param  array  $except
     * @return $this
     */
    protected function withoutExceptionHandling(array $except = [])
    {
        if ($this->originalExceptionHandler == null) {
            $currentExceptionHandler = app(ExceptionHandler::class);

            $this->originalExceptionHandler = $currentExceptionHandler instanceof ExceptionHandlerFake
                ? $currentExceptionHandler->handler()
                : $currentExceptionHandler;
        }

        $exceptionHandler = new class($this->originalExceptionHandler, $except) implements ExceptionHandler, WithoutExceptionHandlingHandler
        {
            protected $except;
            protected $originalHandler;

            /**
             * Create a new class instance.
             *
             * @param  \Illuminate\Contracts\Debug\ExceptionHandler  $originalHandler
             * @param  array  $except
             * @return void
             */
            public function __construct($originalHandler, $except = [])
            {
                $this->except = $except;
                $this->originalHandler = $originalHandler;
            }

            /**
             * Report or log an exception.
             *
             * @param  \Throwable  $e
             * @return void
             *
             * @throws \Exception
             */
            public function report(Throwable $e)
            {
                //
            }

            /**
             * Determine if the exception should be reported.
             *
             * @param  \Throwable  $e
             * @return bool
             */
            public function shouldReport(Throwable $e)
            {
                return false;
            }

            /**
             * Render an exception into an HTTP response.
             *
             * @param  \Illuminate\Http\Request  $request
             * @param  \Throwable  $e
             * @return \Symfony\Component\HttpFoundation\Response
             *
             * @throws \Throwable
             */
            public function render($request, Throwable $e)
            {
                foreach ($this->except as $class) {
                    if ($e instanceof $class) {
                        return $this->originalHandler->render($request, $e);
                    }
                }

                if ($e instanceof NotFoundHttpException) {
                    throw new NotFoundHttpException(
                        "{$request->method()} {$request->url()}", $e, $e->getCode()
                    );
                }

                throw $e;
            }

            /**
             * Render an exception to the console.
             *
             * @param  \Symfony\Component\Console\Output\OutputInterface  $output
             * @param  \Throwable  $e
             * @return void
             */
            public function renderForConsole($output, Throwable $e)
            {
                (new ConsoleApplication)->renderThrowable($e, $output);
            }
        };

        $currentExceptionHandler = app(ExceptionHandler::class);

        $currentExceptionHandler instanceof ExceptionHandlerFake
            ? $currentExceptionHandler->setHandler($exceptionHandler)
            : $this->app->instance(ExceptionHandler::class, $exceptionHandler);

        return $this;
    }
}
