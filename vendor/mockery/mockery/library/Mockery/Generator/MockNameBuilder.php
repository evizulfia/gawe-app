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

class MockNameBuilder
{
<<<<<<< HEAD
    protected static $mockCounter = 0;

    protected $parts = [];

=======
    /**
     * @var int
     */
    protected static $mockCounter = 0;

    /**
     * @var list<string>
     */
    protected $parts = [];

    /**
     * @param string $part
     */
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
    public function addPart($part)
    {
        $this->parts[] = $part;

        return $this;
    }

    /**
     * @return string
     */
    public function build()
    {
        $parts = ['Mockery', static::$mockCounter++];

        foreach ($this->parts as $part) {
            $parts[] = str_replace("\\", "_", $part);
        }

        return implode('_', $parts);
    }
}
