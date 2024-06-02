<?php

namespace Mockery\Exception;

<<<<<<< HEAD
class BadMethodCallException extends \BadMethodCallException
=======
class BadMethodCallException extends \BadMethodCallException implements MockeryExceptionInterface
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
{
    /**
     * @var bool
     */
    private $dismissed = false;

    public function dismiss()
    {
        $this->dismissed = true;

        // we sometimes stack them
        if ($this->getPrevious() && $this->getPrevious() instanceof BadMethodCallException) {
            $this->getPrevious()->dismiss();
        }
    }

    /**
     * @return bool
     */
    public function dismissed()
    {
        return $this->dismissed;
    }
}
