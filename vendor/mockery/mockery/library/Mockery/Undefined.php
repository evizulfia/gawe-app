<?php
/**
 * Mockery
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://github.com/padraic/mockery/blob/master/LICENSE
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to padraic@php.net so we can send you a copy immediately.
 *
 * @category   Mockery
 * @package    Mockery
 * @copyright  Copyright (c) 2010 Pádraic Brady (http://blog.astrumfutura.com)
 * @license    http://github.com/padraic/mockery/blob/master/LICENSE New BSD License
 */

namespace Mockery;

class Undefined
{
    /**
     * Call capturing to merely return this same object.
     *
     * @param string $method
<<<<<<< HEAD
     * @param array $args
=======
     * @param array  $args
     *
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
     * @return self
     */
    public function __call($method, array $args)
    {
        return $this;
    }

    /**
     * Return a string, avoiding E_RECOVERABLE_ERROR
     *
     * @return string
     */
    public function __toString()
    {
        return __CLASS__ . ":" . spl_object_hash($this);
    }
}
