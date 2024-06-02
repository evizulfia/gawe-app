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

namespace Mockery;

<<<<<<< HEAD
=======
use Closure;
use Exception as PHPException;
use Mockery;
use Mockery\Exception\InvalidOrderException;
use Mockery\Exception\RuntimeException;
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
use Mockery\Generator\Generator;
use Mockery\Generator\MockConfigurationBuilder;
use Mockery\Loader\Loader as LoaderInterface;

/**
 * Container for mock objects
 *
 * @template TMockObject of object
 */
class Container
{
    const BLOCKS = \Mockery::BLOCKS;

    /**
     * Store of mock objects
     *
     * @var array
     */
    protected $_mocks = array();

    /**
     * Order number of allocation
     *
     * @var int
     */
    protected $_allocatedOrder = 0;

    /**
     * Current ordered number
     *
     * @var int
     */
    protected $_currentOrder = 0;

    /**
     * Ordered groups
     *
     * @var array
     */
    protected $_groups = array();

    /**
     * @var Generator
     */
    protected $_generator;

    /**
     * @var LoaderInterface
     */
    protected $_loader;

    /**
<<<<<<< HEAD
     * @var array
=======
     * Store of mock objects
     *
     * @var array<class-string<LegacyMockInterface&MockInterface&TMockObject>|array-key,LegacyMockInterface&MockInterface&TMockObject>
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
     */
    protected $_namedMocks = array();

    public function __construct(Generator $generator = null, LoaderInterface $loader = null)
    {
<<<<<<< HEAD
        $this->_generator = $generator ?: \Mockery::getDefaultGenerator();
        $this->_loader = $loader ?: \Mockery::getDefaultLoader();
=======
        $this->_generator = $generator instanceof Generator ? $generator : Mockery::getDefaultGenerator();
        $this->_loader = $loader instanceof LoaderInterface ? $loader : Mockery::getDefaultLoader();
        $this->instantiator = $instantiator instanceof Instantiator ? $instantiator : new Instantiator();
    }

    /**
     * Return a specific remembered mock according to the array index it
     * was stored to in this container instance
     *
     * @template TMock of object
     *
     * @param class-string<TMock> $reference
     *
     * @return null|(LegacyMockInterface&MockInterface&TMock)
     */
    public function fetchMock($reference)
    {
        return $this->_mocks[$reference] ?? null;
    }

    /**
     * @return Generator
     */
    public function getGenerator()
    {
        return $this->_generator;
    }

    /**
     * @param string $method
     * @param string $parent
     *
     * @return null|string
     */
    public function getKeyOfDemeterMockFor($method, $parent)
    {
        $keys = array_keys($this->_mocks);

        $match = preg_grep('/__demeter_' . md5($parent) . sprintf('_%s$/', $method), $keys);
        if ($match === false) {
            return null;
        }

        if ($match === []) {
            return null;
        }

        return array_values($match)[0];
    }

    /**
     * @return LoaderInterface
     */
    public function getLoader()
    {
        return $this->_loader;
    }

    /**
     * @template TMock of object
     * @return array<class-string<LegacyMockInterface&MockInterface&TMockObject>|array-key,LegacyMockInterface&MockInterface&TMockObject>
     */
    public function getMocks()
    {
        return $this->_mocks;
    }

    /**
     * @return void
     */
    public function instanceMock()
    {
    }

    /**
     * see http://php.net/manual/en/language.oop5.basic.php
     *
     * @param string $className
     *
     * @return bool
     */
    public function isValidClassName($className)
    {
        if ($className[0] === '\\') {
            $className = substr($className, 1); // remove the first backslash
        }

        // all the namespaces and class name should match the regex
        return array_filter(
            explode('\\', $className),
            static function ($name): bool {
                return ! preg_match('/^[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*$/', $name);
            }
        ) === [];
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
    }

    /**
     * Generates a new mock object for this container
     *
     * I apologies in advance for this. A God Method just fits the API which
     * doesn't require differentiating between classes, interfaces, abstracts,
     * names or partials - just so long as it's something that can be mocked.
     * I'll refactor it one day so it's easier to follow.
     *
<<<<<<< HEAD
     * @param array ...$args
     *
     * @return Mock
     * @throws Exception\RuntimeException
=======
     * @template TMock of object
     *
     * @param array<class-string<TMock>|TMock|Closure(LegacyMockInterface&MockInterface&TMock):LegacyMockInterface&MockInterface&TMock|array<TMock>> $args
     *
     * @throws ReflectionException|RuntimeException
     *
     * @return LegacyMockInterface&MockInterface&TMock
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
     */
    public function mock(...$args)
    {
        $expectationClosure = null;
        $quickdefs = array();
        $constructorArgs = null;
        $blocks = array();
        $class = null;

        if (count($args) > 1) {
            $finalArg = end($args);
            reset($args);
            if (is_callable($finalArg) && is_object($finalArg)) {
                $expectationClosure = array_pop($args);
            }
        }

        $builder = new MockConfigurationBuilder();

        foreach ($args as $k => $arg) {
            if ($arg instanceof MockConfigurationBuilder) {
                $builder = $arg;
                unset($args[$k]);
            }
        }
        reset($args);

        $builder->setParameterOverrides(\Mockery::getConfiguration()->getInternalClassMethodParamMaps());
        $builder->setConstantsMap(\Mockery::getConfiguration()->getConstantsMap());

        while (count($args) > 0) {
            $arg = array_shift($args);
            // check for multiple interfaces
            if (is_string($arg)) {
                foreach (explode('|', $arg) as $type) {
                    if ($arg === 'null') {
                        // skip PHP 8 'null's
<<<<<<< HEAD
                    } elseif (strpos($type, ',') && !strpos($type, ']')) {
=======
                        continue;
                    }

                    if (strpos($type, ',') && !strpos($type, ']')) {
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
                        $interfaces = explode(',', str_replace(' ', '', $type));
                        $builder->addTargets($interfaces);
                    } elseif (substr($type, 0, 6) == 'alias:') {
                        $type = str_replace('alias:', '', $type);
                        $builder->addTarget('stdClass');
                        $builder->setName($type);
                    } elseif (substr($type, 0, 9) == 'overload:') {
                        $type = str_replace('overload:', '', $type);
                        $builder->setInstanceMock(true);
                        $builder->addTarget('stdClass');
                        $builder->setName($type);
                    } elseif (substr($type, strlen($type)-1, 1) == ']') {
                        $parts = explode('[', $type);
<<<<<<< HEAD
                        if (!class_exists($parts[0], true) && !interface_exists($parts[0], true)) {
                            throw new \Mockery\Exception('Can only create a partial mock from'
                            . ' an existing class or interface');
=======

                        $class = $parts[0];

                        if (! class_exists($class, true) && ! interface_exists($class, true)) {
                            throw new Exception('Can only create a partial mock from an existing class or interface');
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
                        }
                        $class = $parts[0];
                        $parts[1] = str_replace(' ', '', $parts[1]);
                        $partialMethods = array_filter(explode(',', strtolower(rtrim($parts[1], ']'))));
                        $builder->addTarget($class);
                        foreach ($partialMethods as $partialMethod) {
                            if ($partialMethod[0] === '!') {
                                $builder->addBlackListedMethod(substr($partialMethod, 1));
                                continue;
                            }
                            $builder->addWhiteListedMethod($partialMethod);
                        }
<<<<<<< HEAD
                    } elseif (class_exists($type, true) || interface_exists($type, true) || trait_exists($type, true)) {
                        $builder->addTarget($type);
                    } elseif (!\Mockery::getConfiguration()->mockingNonExistentMethodsAllowed() && (!class_exists($type, true) && !interface_exists($type, true))) {
                        throw new \Mockery\Exception("Mockery can't find '$type' so can't mock it");
                    } else {
                        if (!$this->isValidClassName($type)) {
                            throw new \Mockery\Exception('Class name contains invalid characters');
                        }
=======

                        continue;
                    }

                    if (class_exists($type, true) || interface_exists($type, true) || trait_exists($type, true)) {
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
                        $builder->addTarget($type);
                    }
<<<<<<< HEAD
                    break; // unions are "sum" types and not "intersections", and so we must only process the first part
=======

                    if (! $mockeryConfiguration->mockingNonExistentMethodsAllowed()) {
                        throw new Exception(sprintf("Mockery can't find '%s' so can't mock it", $type));
                    }

                    if (! $this->isValidClassName($type)) {
                        throw new Exception('Class name contains invalid characters');
                    }

                    $builder->addTarget($type);

                    // unions are "sum" types and not "intersections", and so we must only process the first part
                    break;
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
                }
            } elseif (is_object($arg)) {
                $builder->addTarget($arg);
<<<<<<< HEAD
            } elseif (is_array($arg)) {
                if (!empty($arg) && array_keys($arg) !== range(0, count($arg) - 1)) {
=======

                continue;
            }

            if (is_array($arg)) {
                if ([] !== $arg && array_keys($arg) !== range(0, count($arg) - 1)) {
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
                    // if associative array
                    if (array_key_exists(self::BLOCKS, $arg)) {
                        $blocks = $arg[self::BLOCKS];
                    }
<<<<<<< HEAD
                    unset($arg[self::BLOCKS]);
                    $quickdefs = $arg;
                } else {
                    $constructorArgs = $arg;
                }
            } else {
                throw new \Mockery\Exception(
                    'Unable to parse arguments sent to '
                    . get_class($this) . '::mock()'
                );
=======

                    unset($arg[self::BLOCKS]);

                    $quickDefinitions = $arg;

                    continue;
                }

                $constructorArgs = $arg;

                continue;
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
            }

            throw new Exception(sprintf(
                'Unable to parse arguments sent to %s::mock()', get_class($this)
            ));
        }

        $builder->addBlackListedMethods($blocks);

        if (!is_null($constructorArgs)) {
            $builder->addBlackListedMethod("__construct"); // we need to pass through
        } else {
            $builder->setMockOriginalDestructor(true);
        }

        if (!empty($partialMethods) && $constructorArgs === null) {
            $constructorArgs = array();
        }

        $config = $builder->getMockConfiguration();

        $this->checkForNamedMockClashes($config);

        $def = $this->getGenerator()->generate($config);

        if (class_exists($def->getClassName(), $attemptAutoload = false)) {
            $rfc = new \ReflectionClass($def->getClassName());
            if (!$rfc->implementsInterface("Mockery\LegacyMockInterface")) {
                throw new \Mockery\Exception\RuntimeException("Could not load mock {$def->getClassName()}, class already exists");
            }
        }

        $this->getLoader()->load($def);

        $mock = $this->_getInstance($def->getClassName(), $constructorArgs);
        $mock->mockery_init($this, $config->getTargetObject(), $config->isInstanceMock());

        if (!empty($quickdefs)) {
            if (\Mockery::getConfiguration()->getQuickDefinitions()->shouldBeCalledAtLeastOnce()) {
                $mock->shouldReceive($quickdefs)->atLeast()->once();
            } else {
                $mock->shouldReceive($quickdefs)->byDefault();
            }
        }
<<<<<<< HEAD
        if (!empty($expectationClosure)) {
=======

        // if the last parameter passed to mock() is a closure,
        if ($expectationClosure instanceof Closure) {
            // call the closure with the mock object
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
            $expectationClosure($mock);
        }
        $this->rememberMock($mock);
        return $mock;
    }

    public function instanceMock()
    {
    }

    public function getLoader()
    {
        return $this->_loader;
    }

    public function getGenerator()
    {
        return $this->_generator;
    }

    /**
     * @param string $method
     * @param string $parent
     * @return string|null
     */
    public function getKeyOfDemeterMockFor($method, $parent)
    {
        $keys = array_keys($this->_mocks);
        $match = preg_grep("/__demeter_" . md5($parent) . "_{$method}$/", $keys);
        if (count($match) == 1) {
            $res = array_values($match);
            if (count($res) > 0) {
                return $res[0];
            }
        }
        return null;
    }

    /**
     * @return array
     */
    public function getMocks()
    {
        return $this->_mocks;
    }

    /**
     *  Tear down tasks for this container
     *
     * @throws \Exception
     * @return void
     */
    public function mockery_teardown()
    {
        try {
            $this->mockery_verify();
        } catch (\Exception $e) {
            $this->mockery_close();
            throw $e;
        }
    }

    /**
     * Verify the container mocks
     *
     * @return void
     */
    public function mockery_verify()
    {
        foreach ($this->_mocks as $mock) {
            $mock->mockery_verify();
        }
    }

    /**
     * Retrieves all exceptions thrown by mocks
     *
     * @return array
     */
    public function mockery_thrownExceptions()
    {
        $e = [];

        foreach ($this->_mocks as $mock) {
            $e = array_merge($e, $mock->mockery_thrownExceptions());
        }

        return $e;
    }

    /**
     * Reset the container to its original state
     *
     * @return void
     */
    public function mockery_close()
    {
        foreach ($this->_mocks as $mock) {
            $mock->mockery_teardown();
        }
        $this->_mocks = array();
    }

    /**
     * Fetch the next available allocation order number
     *
     * @return int
     */
    public function mockery_allocateOrder()
    {
        $this->_allocatedOrder += 1;
        return $this->_allocatedOrder;
    }

    /**
     * Set ordering for a group
     *
     * @param mixed $group
     * @param int $order
     */
    public function mockery_setGroup($group, $order)
    {
        $this->_groups[$group] = $order;
    }

    /**
     * Fetch array of ordered groups
     *
     * @return array
     */
    public function mockery_getGroups()
    {
        return $this->_groups;
    }

    /**
     * Set current ordered number
     *
     * @param int $order
     * @return int The current order number that was set
     */
    public function mockery_setCurrentOrder($order)
    {
        $this->_currentOrder = $order;
        return $this->_currentOrder;
    }

    /**
     * Get current ordered number
     *
     * @return int
     */
    public function mockery_getCurrentOrder()
    {
        return $this->_currentOrder;
    }

    /**
     * Validate the current mock's ordering
     *
     * @param string $method
     * @param int $order
     * @throws \Mockery\Exception
     * @return void
     */
    public function mockery_validateOrder($method, $order, \Mockery\LegacyMockInterface $mock)
    {
        if ($order < $this->_currentOrder) {
            $exception = new \Mockery\Exception\InvalidOrderException(
                'Method ' . $method . ' called out of order: expected order '
                . $order . ', was ' . $this->_currentOrder
            );
            $exception->setMock($mock)
                ->setMethodName($method)
                ->setExpectedOrder($order)
                ->setActualOrder($this->_currentOrder);
            throw $exception;
        }
        $this->mockery_setCurrentOrder($order);
    }

    /**
     * Gets the count of expectations on the mocks
     *
     * @return int
     */
    public function mockery_getExpectationCount()
    {
        $count = 0;
        foreach ($this->_mocks as $mock) {
            $count += $mock->mockery_getExpectationCount();
        }
        return $count;
    }

    /**
<<<<<<< HEAD
     * Store a mock and set its container reference
     *
     * @param \Mockery\Mock $mock
     * @return \Mockery\LegacyMockInterface|\Mockery\MockInterface
=======
     * Fetch array of ordered groups
     *
     * @return array<string,int>
     */
    public function mockery_getGroups()
    {
        return $this->_groups;
    }

    /**
     * Set current ordered number
     *
     * @param int $order
     *
     * @return int The current order number that was set
     */
    public function mockery_setCurrentOrder($order)
    {
        return $this->_currentOrder = $order;
    }

    /**
     * Set ordering for a group
     *
     * @param string $group
     * @param int    $order
     *
     * @return void
     */
    public function mockery_setGroup($group, $order)
    {
        $this->_groups[$group] = $order;
    }

    /**
     * Tear down tasks for this container
     *
     * @throws PHPException
     */
    public function mockery_teardown()
    {
        try {
            $this->mockery_verify();
        } catch (PHPException $phpException) {
            $this->mockery_close();

            throw $phpException;
        }
    }

    /**
     * Retrieves all exceptions thrown by mocks
     *
     * @return array<Throwable>
     */
    public function mockery_thrownExceptions()
    {
        /** @var array<Throwable> $exceptions */
        $exceptions = [];

        foreach ($this->_mocks as $mock) {
            foreach ($mock->mockery_thrownExceptions() as $exception) {
                $exceptions[] = $exception;
            }
        }

        return $exceptions;
    }

    /**
     * Validate the current mock's ordering
     *
     * @param string $method
     * @param int    $order
     *
     * @throws Exception
     */
    public function mockery_validateOrder($method, $order, LegacyMockInterface $mock)
    {
        if ($order < $this->_currentOrder) {
            $exception = new InvalidOrderException(
                sprintf(
                    'Method %s called out of order: expected order %d, was %d',
                    $method,
                    $order,
                    $this->_currentOrder
                )
            );

            $exception->setMock($mock)
                ->setMethodName($method)
                ->setExpectedOrder($order)
                ->setActualOrder($this->_currentOrder);

            throw $exception;
        }

        $this->mockery_setCurrentOrder($order);
    }

    /**
     * Verify the container mocks
     */
    public function mockery_verify()
    {
        foreach ($this->_mocks as $mock) {
            $mock->mockery_verify();
        }
    }

    /**
     * Store a mock and set its container reference
     *
     * @template TRememberMock of object
     *
     * @param LegacyMockInterface&MockInterface&TRememberMock $mock
     *
     * @return LegacyMockInterface&MockInterface&TRememberMock
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
     */
    public function rememberMock(\Mockery\LegacyMockInterface $mock)
    {
        if (!isset($this->_mocks[get_class($mock)])) {
            $this->_mocks[get_class($mock)] = $mock;
        } else {
            /**
             * This condition triggers for an instance mock where origin mock
             * is already remembered
             */
            $this->_mocks[] = $mock;
        }
        return $mock;
    }

    /**
     * Retrieve the last remembered mock object, which is the same as saying
     * retrieve the current mock being programmed where you have yet to call
     * mock() to change it - thus why the method name is "self" since it will be
     * be used during the programming of the same mock.
     *
     * @return \Mockery\Mock
     */
    public function self()
    {
        $mocks = array_values($this->_mocks);
        $index = count($mocks) - 1;
        return $mocks[$index];
    }

    /**
<<<<<<< HEAD
     * Return a specific remembered mock according to the array index it
     * was stored to in this container instance
     *
     * @return \Mockery\Mock
=======
     * @template TMock of object
     * @template TMixed
     *
     * @param class-string<TMock> $mockName
     * @param null|array<TMixed>  $constructorArgs
     *
     * @return TMock
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
     */
    public function fetchMock($reference)
    {
        if (isset($this->_mocks[$reference])) {
            return $this->_mocks[$reference];
        }
    }

    protected function _getInstance($mockName, $constructorArgs = null)
    {
        if ($constructorArgs !== null) {
            $r = new \ReflectionClass($mockName);
            return $r->newInstanceArgs($constructorArgs);
        }

        try {
            $instantiator = new Instantiator();
            $instance = $instantiator->instantiate($mockName);
        } catch (\Exception $ex) {
            $internalMockName = $mockName . '_Internal';

            if (!class_exists($internalMockName)) {
                eval("class $internalMockName extends $mockName {" .
                        'public function __construct() {}' .
                    '}');
            }

            $instance = new $internalMockName();
        }

        return $instance;
    }

    protected function checkForNamedMockClashes($config)
    {
        $name = $config->getName();

        if (!$name) {
            return;
        }

        $hash = $config->getHash();

        if (isset($this->_namedMocks[$name])) {
            if ($hash !== $this->_namedMocks[$name]) {
                throw new \Mockery\Exception(
                    "The mock named '$name' has been already defined with a different mock configuration"
                );
            }
        }

        $this->_namedMocks[$name] = $hash;
    }

    /**
     * see http://php.net/manual/en/language.oop5.basic.php
     * @param string $className
     * @return bool
     */
    public function isValidClassName($className)
    {
        $pos = strpos($className, '\\');
        if ($pos === 0) {
            $className = substr($className, 1); // remove the first backslash
        }
        // all the namespaces and class name should match the regex
        $invalidNames = array_filter(explode('\\', $className), function ($name) {
            return !preg_match('/^[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*$/', $name);
        });
        return empty($invalidNames);
    }
}
