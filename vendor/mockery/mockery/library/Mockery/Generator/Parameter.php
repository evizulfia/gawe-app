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
<<<<<<< HEAD
=======
use ReflectionClass;
use ReflectionParameter;
use function class_exists;
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec

/**
 * @mixin ReflectionParameter
 */
class Parameter
{
<<<<<<< HEAD
    /** @var int */
    private static $parameterCounter = 0;

    /** @var \ReflectionParameter */
    private $rfp;

    public function __construct(\ReflectionParameter $rfp)
=======
    /**
     * @var int
     */
    private static $parameterCounter = 0;

    /**
     * @var ReflectionParameter
     */
    private $rfp;

    public function __construct(ReflectionParameter $rfp)
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
    {
        $this->rfp = $rfp;
    }

    /**
     * Proxy all method calls to the reflection parameter.
     *
     * @template TMixed
     * @template TResult
     *
     * @param string        $method
     * @param array<TMixed> $args
     *
     * @return TResult
     */
    public function __call($method, array $args)
    {
<<<<<<< HEAD
        return call_user_func_array(array($this->rfp, $method), $args);
=======
        /** @var TResult */
        return $this->rfp->{$method}(...$args);
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
    }

    /**
     * Get the reflection class for the parameter type, if it exists.
     *
     * This will be null if there was no type, or it was a scalar or a union.
     *
     * @return \ReflectionClass|null
     *
     * @deprecated since 1.3.3 and will be removed in 2.0.
     */
    public function getClass()
    {
        $typeHint = Reflector::getTypeHint($this->rfp, true);

<<<<<<< HEAD
        return \class_exists($typeHint) ? DefinedTargetClass::factory($typeHint, false) : null;
=======
        return class_exists($typeHint) ? DefinedTargetClass::factory($typeHint, false) : null;
    }

    /**
     * Get the name of the parameter.
     *
     * Some internal classes have funny looking definitions!
     *
     * @return string
     */
    public function getName()
    {
        $name = $this->rfp->getName();

        if (! $name || $name === '...') {
            return 'arg' . self::$parameterCounter++;
        }

        return $name;
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
    }

    /**
     * Get the string representation for the paramater type.
     *
     * @return string|null
     */
    public function getTypeHint()
    {
        return Reflector::getTypeHint($this->rfp);
    }

    /**
     * Get the string representation for the paramater type.
     *
     * @return string
     *
     * @deprecated since 1.3.2 and will be removed in 2.0. Use getTypeHint() instead.
     */
    public function getTypeHintAsString()
    {
        return (string) Reflector::getTypeHint($this->rfp, true);
    }

    /**
     * Get the name of the parameter.
     *
     * Some internal classes have funny looking definitions!
     *
     * @return string
     */
    public function getName()
    {
        $name = $this->rfp->getName();
        if (!$name || $name == '...') {
            $name = 'arg' . self::$parameterCounter++;
        }

        return $name;
    }

    /**
     * Determine if the parameter is an array.
     *
     * @return bool
     */
    public function isArray()
    {
        return Reflector::isArray($this->rfp);
    }

    /**
     * Determine if the parameter is variadic.
     *
     * @return bool
     */
    public function isVariadic()
    {
        return $this->rfp->isVariadic();
    }
}
