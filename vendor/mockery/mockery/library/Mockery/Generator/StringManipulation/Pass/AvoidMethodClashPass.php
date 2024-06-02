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

namespace Mockery\Generator\StringManipulation\Pass;

use Mockery\Generator\Method;
use Mockery\Generator\Parameter;
use Mockery\Generator\MockConfiguration;
<<<<<<< HEAD
=======
use function array_map;
use function in_array;
use function preg_replace;
use function sprintf;
use function str_replace;
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec

class AvoidMethodClashPass implements Pass
{
    /**
     * @param  string $code
     * @return string
     */
    public function apply($code, MockConfiguration $config)
    {
        $names = array_map(function ($method) {
            return $method->getName();
        }, $config->getMethodsToMock());

        foreach (["allows", "expects"] as $method) {
            if (in_array($method, $names)) {
                $code = preg_replace(
                    "#// start method {$method}.*// end method {$method}#ms",
                    "",
                    $code
                );

                $code = str_replace(" implements MockInterface", " implements LegacyMockInterface", $code);
            }
        }

        return $code;
    }
}
