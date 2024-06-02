<?php

/**
 * This file is part of the Carbon package.
 *
 * (c) Brian Nesbitt <brian@nesbot.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Carbon\Exceptions;

use BadMethodCallException as BaseBadMethodCallException;
use Exception;

class BadFluentConstructorException extends BaseBadMethodCallException implements BadMethodCallException
{
    /**
     * Constructor.
     *
     * @param string         $method
     * @param int            $code
     * @param Exception|null $previous
     */
<<<<<<< HEAD
    public function __construct($method, $code = 0, Exception $previous = null)
=======
    public function __construct($method, $code = 0, ?Throwable $previous = null)
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
    {
        parent::__construct(sprintf("Unknown fluent constructor '%s'.", $method), $code, $previous);
    }
}
