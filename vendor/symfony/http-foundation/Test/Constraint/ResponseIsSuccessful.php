<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpFoundation\Test\Constraint;

use PHPUnit\Framework\Constraint\Constraint;
use Symfony\Component\HttpFoundation\Response;

final class ResponseIsSuccessful extends Constraint
{
    /**
<<<<<<< HEAD
     * {@inheritdoc}
     */
=======
     * @param bool $verbose If true, the entire response is printed on failure. If false, the response body is omitted.
     */
    public function __construct(private readonly bool $verbose = true)
    {
    }

>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
    public function toString(): string
    {
        return 'is successful';
    }

    /**
     * @param Response $response
     *
     * {@inheritdoc}
     */
    protected function matches($response): bool
    {
        return $response->isSuccessful();
    }

    /**
     * @param Response $response
     *
     * {@inheritdoc}
     */
    protected function failureDescription($response): string
    {
        return 'the Response '.$this->toString();
    }

    /**
     * @param Response $response
     *
     * {@inheritdoc}
     */
    protected function additionalFailureDescription($response): string
    {
        return $this->verbose ? (string) $response : explode("\r\n\r\n", (string) $response)[0];
    }
}
