<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Mime\Part;

use Symfony\Component\Mime\Message;
use Symfony\Component\Mime\RawMessage;

/**
 * @final
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class MessagePart extends DataPart
{
<<<<<<< HEAD
    private $message;

    public function __construct(RawMessage $message)
    {
=======
    public function __construct(
        private RawMessage $message,
    ) {
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
        if ($message instanceof Message) {
            $name = $message->getHeaders()->getHeaderBody('Subject').'.eml';
        } else {
            $name = 'email.eml';
        }
        parent::__construct('', $name);
    }

    public function getMediaType(): string
    {
        return 'message';
    }

    public function getMediaSubtype(): string
    {
        return 'rfc822';
    }

    public function getBody(): string
    {
        return $this->message->toString();
    }

    public function bodyToString(): string
    {
        return $this->getBody();
    }

    public function bodyToIterable(): iterable
    {
        return $this->message->toIterable();
    }
}
