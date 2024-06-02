<?php

namespace Illuminate\Support\Traits;

use Closure;
use Illuminate\Support\HigherOrderWhenProxy;

trait Conditionable
{
    /**
     * Apply the callback if the given "value" is (or resolves to) truthy.
     *
     * @template TWhenReturnType
     *
     * @param  bool  $value
     * @param  (callable($this): TWhenReturnType)|null  $callback
     * @param  (callable($this): TWhenReturnType)|null  $default
     * @return $this|TWhenReturnType
     */
<<<<<<< HEAD
    public function when($value, callable $callback = null, callable $default = null)
=======
    public function when($value = null, ?callable $callback = null, ?callable $default = null)
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
    {
        $value = $value instanceof Closure ? $value($this) : $value;

        if (! $callback) {
            return new HigherOrderWhenProxy($this, $value);
        }

        if ($value) {
            return $callback($this, $value) ?? $this;
        } elseif ($default) {
            return $default($this, $value) ?? $this;
        }

        return $this;
    }

    /**
     * Apply the callback if the given "value" is (or resolves to) falsy.
     *
     * @template TUnlessReturnType
     *
     * @param  bool  $value
     * @param  (callable($this): TUnlessReturnType)  $callback
     * @param  (callable($this): TUnlessReturnType)|null  $default
     * @return $this|TUnlessReturnType
     */
<<<<<<< HEAD
    public function unless($value, callable $callback = null, callable $default = null)
=======
    public function unless($value = null, ?callable $callback = null, ?callable $default = null)
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
    {
        $value = $value instanceof Closure ? $value($this) : $value;

        if (! $callback) {
            return new HigherOrderWhenProxy($this, ! $value);
        }

        if (! $value) {
            return $callback($this, $value) ?? $this;
        } elseif ($default) {
            return $default($this, $value) ?? $this;
        }

        return $this;
    }
}
