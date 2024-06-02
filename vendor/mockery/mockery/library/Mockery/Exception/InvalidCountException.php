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

namespace Mockery\Exception;

use Mockery;
use Mockery\Exception\RuntimeException;

class InvalidCountException extends Mockery\CountValidator\Exception
{
<<<<<<< HEAD
    protected $method = null;
=======
    /**
     * @var int|null
     */
    protected $actual = null;
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec

    /**
     * @var int
     */
    protected $expected = 0;

    /**
     * @var string
     */
    protected $expectedComparative = '<=';

<<<<<<< HEAD
    protected $actual = null;
=======
    /**
     * @var string|null
     */
    protected $method = null;
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec

    /**
     * @var LegacyMockInterface|null
     */
    protected $mockObject = null;

<<<<<<< HEAD
    public function setMock(Mockery\LegacyMockInterface $mock)
=======
    /**
     * @return int|null
     */
    public function getActualCount()
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
    {
        $this->mockObject = $mock;
        return $this;
    }

<<<<<<< HEAD
    public function setMethodName($name)
    {
        $this->method = $name;
        return $this;
=======
    /**
     * @return int
     */
    public function getExpectedCount()
    {
        return $this->expected;
    }

    /**
     * @return string
     */
    public function getExpectedCountComparative()
    {
        return $this->expectedComparative;
    }

    /**
     * @return string|null
     */
    public function getMethodName()
    {
        return $this->method;
    }

    /**
     * @return LegacyMockInterface|null
     */
    public function getMock()
    {
        return $this->mockObject;
    }

    /**
     * @throws RuntimeException
     * @return string|null
     */
    public function getMockName()
    {
        $mock = $this->getMock();

        if ($mock === null) {
            return '';
        }

        return $mock->mockery_getName();
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
    }

    /**
     * @param  int  $count
     * @return self
     */
    public function setActualCount($count)
    {
        $this->actual = $count;
        return $this;
    }

    /**
     * @param  int  $count
     * @return self
     */
    public function setExpectedCount($count)
    {
        $this->expected = $count;
        return $this;
    }

    /**
     * @param  string $comp
     * @return self
     */
    public function setExpectedCountComparative($comp)
    {
        if (!in_array($comp, array('=', '>', '<', '>=', '<='))) {
            throw new RuntimeException(
                'Illegal comparative for expected call counts set: ' . $comp
            );
        }
        $this->expectedComparative = $comp;
        return $this;
    }

<<<<<<< HEAD
    public function getMock()
=======
    /**
     * @param  string $name
     * @return self
     */
    public function setMethodName($name)
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
    {
        return $this->mockObject;
    }

<<<<<<< HEAD
    public function getMethodName()
=======
    /**
     * @return self
     */
    public function setMock(LegacyMockInterface $mock)
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
    {
        return $this->method;
    }

    public function getActualCount()
    {
        return $this->actual;
    }

    public function getExpectedCount()
    {
        return $this->expected;
    }

    public function getMockName()
    {
        return $this->getMock()->mockery_getName();
    }

    public function getExpectedCountComparative()
    {
        return $this->expectedComparative;
    }
}
