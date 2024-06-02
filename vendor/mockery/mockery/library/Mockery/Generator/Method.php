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

namespace Mockery\Generator;

use Mockery\Reflector;

/**
 * @mixin ReflectionMethod
 */
class Method
{
    /** @var \ReflectionMethod */
    private $method;

    public function __construct(\ReflectionMethod $method)
    {
        $this->method = $method;
    }

    /**
     * @template TArgs
     * @template TMixed
     *
     * @param string       $method
     * @param array<TArgs> $args
     *
     * @return TMixed
     */
    public function __call($method, $args)
    {
<<<<<<< HEAD
        return call_user_func_array(array($this->method, $method), $args);
=======
        /** @var TMixed */
        return $this->method->{$method}(...$args);
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
    }

    /**
     * @return list<Parameter>
     */
    public function getParameters()
    {
        return array_map(function (\ReflectionParameter $parameter) {
            return new Parameter($parameter);
        }, $this->method->getParameters());
    }

    /**
     * @return string|null
     */
    public function getReturnType()
    {
        return Reflector::getReturnType($this->method);
    }
}
