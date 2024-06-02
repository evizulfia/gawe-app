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

use Exception;
use InvalidArgumentException as BaseInvalidArgumentException;

class ParseErrorException extends BaseInvalidArgumentException implements InvalidArgumentException
{
    /**
     * Constructor.
     *
     * @param string         $expected
     * @param string         $actual
     * @param int            $code
     * @param Exception|null $previous
     */
<<<<<<< HEAD
    public function __construct($expected, $actual, $help = '', $code = 0, Exception $previous = null)
=======
    public function __construct($expected, $actual, $help = '', $code = 0, ?Throwable $previous = null)
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
    {
        $actual = $actual === '' ? 'data is missing' : "get '$actual'";

        parent::__construct(trim("Format expected $expected but $actual\n$help"), $code, $previous);
    }
}
