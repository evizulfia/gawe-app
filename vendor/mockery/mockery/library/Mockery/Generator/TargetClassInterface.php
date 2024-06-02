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

interface TargetClassInterface
{
    /**
<<<<<<< HEAD
     * Returns a new instance of the current
     * TargetClassInterface's
     * implementation.
     *
     * @param string $name
     * @return TargetClassInterface
=======
     * Returns a new instance of the current TargetClassInterface's implementation.
     *
     * @param class-string $name
     *
     * @return TargetClassInterface
     */
    public static function factory($name);

    /**
     * Returns the targetClass's attributes.
     *
     * @return array<class-string>
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
     */
    public static function factory($name);

    /**
     * Returns the targetClass's name.
     *
<<<<<<< HEAD
     * @return string
=======
     * @return array<TargetClassInterface>
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
     */
    public function getName();

    /**
     * Returns the targetClass's methods.
     *
     * @return array<Method>
     */
    public function getMethods();

    /**
     * Returns the targetClass's interfaces.
     *
<<<<<<< HEAD
     * @return array
=======
     * @return class-string
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
     */
    public function getInterfaces();

    /**
     * Returns the targetClass's namespace name.
     *
     * @return string
     */
    public function getNamespaceName();

    /**
     * Returns the targetClass's short name.
     *
     * @return string
     */
    public function getShortName();

    /**
<<<<<<< HEAD
=======
     * Returns whether the targetClass has
     * an internal ancestor.
     *
     * @return bool
     */
    public function hasInternalAncestor();

    /**
     * Returns whether the targetClass is in
     * the passed interface.
     *
     * @param class-string|string $interface
     *
     * @return bool
     */
    public function implementsInterface($interface);

    /**
     * Returns whether the targetClass is in namespace.
     *
     * @return bool
     */
    public function inNamespace();

    /**
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
     * Returns whether the targetClass is abstract.
     *
     * @return bool
     */
    public function isAbstract();

    /**
     * Returns whether the targetClass is final.
     *
     * @return bool
     */
    public function isFinal();
<<<<<<< HEAD

    /**
     * Returns whether the targetClass is in namespace.
     *
     * @return boolean
     */
    public function inNamespace();

    /**
     * Returns whether the targetClass is in
     * the passed interface.
     *
     * @param mixed $interface
     * @return boolean
     */
    public function implementsInterface($interface);

    /**
     * Returns whether the targetClass has
     * an internal ancestor.
     *
     * @return boolean
     */
    public function hasInternalAncestor();
=======
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
}
