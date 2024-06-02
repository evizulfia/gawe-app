<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\Event;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\HttpKernelInterface;

/**
 * Allows to filter a Response object.
 *
 * You can call getResponse() to retrieve the current response. With
 * setResponse() you can set a new response that will be returned to the
 * browser.
 *
 * @author Bernhard Schussek <bschussek@gmail.com>
 */
final class ResponseEvent extends KernelEvent
{
<<<<<<< HEAD
    private $response;

    public function __construct(HttpKernelInterface $kernel, Request $request, int $requestType, Response $response)
    {
=======
    public function __construct(
        HttpKernelInterface $kernel,
        Request $request,
        int $requestType,
        private Response $response,
    ) {
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
        parent::__construct($kernel, $request, $requestType);
    }

    public function getResponse(): Response
    {
        return $this->response;
    }

    public function setResponse(Response $response): void
    {
        $this->response = $response;
    }
}
