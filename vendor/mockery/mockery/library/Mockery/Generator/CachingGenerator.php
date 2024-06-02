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

class CachingGenerator implements Generator
{
<<<<<<< HEAD
=======
    /**
     * @var array<string,string>
     */
    protected $cache = [];

    /**
     * @var Generator
     */
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
    protected $generator;
    protected $cache = array();

    public function __construct(Generator $generator)
    {
        $this->generator = $generator;
    }

    /**
     * @return string
     */
    public function generate(MockConfiguration $config)
    {
        $hash = $config->getHash();

        if (array_key_exists($hash, $this->cache)) {
            return $this->cache[$hash];
        }

        return $this->cache[$hash] = $this->generator->generate($config);
    }
}
