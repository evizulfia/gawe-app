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

class UndefinedTargetClass implements TargetClassInterface
{
    /**
     * @var class-string
     */
    private $name;

    /**
     * @param class-string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

<<<<<<< HEAD
    public static function factory($name)
    {
        return new self($name);
=======
    /**
     * @return class-string
     */
    public function __toString()
    {
        return $this->name;
    }

    /**
     * @param  class-string $name
     * @return self
     */
    public static function factory($name)
    {
        return new self($name);
    }

    /**
     * @return list<class-string>
     */
    public function getAttributes()
    {
        return [];
    }

    /**
     * @return list<self>
     */
    public function getInterfaces()
    {
        return [];
    }

    /**
     * @return list<Method>
     */
    public function getMethods()
    {
        return [];
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
    }

    /**
     * @return class-string
     */
    public function getName()
    {
        return $this->name;
    }

<<<<<<< HEAD
=======
    /**
     * @return string
     */
    public function getNamespaceName()
    {
        $parts = explode('\\', ltrim($this->getName(), '\\'));
        array_pop($parts);
        return implode('\\', $parts);
    }

    /**
     * @return string
     */
    public function getShortName()
    {
        $parts = explode('\\', $this->getName());
        return array_pop($parts);
    }

    /**
     * @return bool
     */
    public function hasInternalAncestor()
    {
        return false;
    }

    /**
     * @param  class-string $interface
     * @return bool
     */
    public function implementsInterface($interface)
    {
        return false;
    }

    /**
     * @return bool
     */
    public function inNamespace()
    {
        return $this->getNamespaceName() !== '';
    }

    /**
     * @return bool
     */
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
    public function isAbstract()
    {
        return false;
    }

    /**
     * @return bool
     */
    public function isFinal()
    {
        return false;
    }
<<<<<<< HEAD

    public function getMethods()
    {
        return array();
    }

    public function getInterfaces()
    {
        return array();
    }

    public function getNamespaceName()
    {
        $parts = explode("\\", ltrim($this->getName(), "\\"));
        array_pop($parts);
        return implode("\\", $parts);
    }

    public function inNamespace()
    {
        return $this->getNamespaceName() !== '';
    }

    public function getShortName()
    {
        $parts = explode("\\", $this->getName());
        return array_pop($parts);
    }

    public function implementsInterface($interface)
    {
        return false;
    }

    public function hasInternalAncestor()
    {
        return false;
    }

    public function __toString()
    {
        return $this->name;
    }
=======
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
}
