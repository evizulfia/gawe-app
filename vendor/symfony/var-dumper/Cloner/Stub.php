<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\VarDumper\Cloner;

/**
 * Represents the main properties of a PHP variable.
 *
 * @author Nicolas Grekas <p@tchwork.com>
 */
class Stub
{
    public const TYPE_REF = 1;
    public const TYPE_STRING = 2;
    public const TYPE_ARRAY = 3;
    public const TYPE_OBJECT = 4;
    public const TYPE_RESOURCE = 5;

    public const STRING_BINARY = 1;
    public const STRING_UTF8 = 2;

    public const ARRAY_ASSOC = 1;
    public const ARRAY_INDEXED = 2;

<<<<<<< HEAD
    public $type = self::TYPE_REF;
    public $class = '';
    public $value;
    public $cut = 0;
    public $handle = 0;
    public $refCount = 0;
    public $position = 0;
    public $attr = [];
=======
    public int $type = self::TYPE_REF;
    public string|int|null $class = '';
    public mixed $value = null;
    public int $cut = 0;
    public int $handle = 0;
    public int $refCount = 0;
    public int $position = 0;
    public array $attr = [];
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec

    private static array $defaultProperties = [];

    /**
     * @internal
     */
    public function __sleep(): array
    {
        $properties = [];

        if (!isset(self::$defaultProperties[$c = static::class])) {
            self::$defaultProperties[$c] = get_class_vars($c);

            foreach ((new \ReflectionClass($c))->getStaticProperties() as $k => $v) {
                unset(self::$defaultProperties[$c][$k]);
            }
        }

        foreach (self::$defaultProperties[$c] as $k => $v) {
            if ($this->$k !== $v) {
                $properties[] = $k;
            }
        }

        return $properties;
    }
}
