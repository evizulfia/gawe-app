<?php

namespace Mockery\Generator\StringManipulation\Pass;

use Mockery\Generator\MockConfiguration;
<<<<<<< HEAD
=======
use function array_key_exists;
use function sprintf;
use function strrpos;
use function substr_replace;
use function var_export;
use const PHP_EOL;
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec

class ConstantsPass implements Pass
{
    /**
     * @param  string $code
     * @return string
     */
    public function apply($code, MockConfiguration $config)
    {
        $cm = $config->getConstantsMap();
        if (empty($cm)) {
            return $code;
        }

        if (!isset($cm[$config->getName()])) {
            return $code;
        }

        $cm = $cm[$config->getName()];

        $constantsCode = '';
        foreach ($cm as $constant => $value) {
            $constantsCode .= sprintf("\n    const %s = %s;\n", $constant, var_export($value, true));
        }

        $i = strrpos($code, '}');
        $code = substr_replace($code, $constantsCode, $i);
        $code .= "}\n";

        return $code;
    }
}
