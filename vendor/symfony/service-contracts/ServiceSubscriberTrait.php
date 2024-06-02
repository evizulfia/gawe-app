<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Contracts\Service;

use Psr\Container\ContainerInterface;
use Symfony\Contracts\Service\Attribute\SubscribedService;

trigger_deprecation('symfony/contracts', 'v3.5', '"%s" is deprecated, use "ServiceMethodsSubscriberTrait" instead.', ServiceSubscriberTrait::class);

/**
 * Implementation of ServiceSubscriberInterface that determines subscribed services
 * from methods that have the #[SubscribedService] attribute.
 *
 * Service ids are available as "ClassName::methodName" so that the implementation
 * of subscriber methods can be just `return $this->container->get(__METHOD__);`.
 *
 * @property ContainerInterface $container
 *
 * @author Kevin Bond <kevinbond@gmail.com>
 *
 * @deprecated since symfony/contracts v3.5, use ServiceMethodsSubscriberTrait instead
 */
trait ServiceSubscriberTrait
{
<<<<<<< HEAD
    /** @var ContainerInterface */
    protected $container;

    /**
     * {@inheritdoc}
     */
=======
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
    public static function getSubscribedServices(): array
    {
        static $services;

        if (null !== $services) {
            return $services;
        }

        $services = \is_callable(['parent', __FUNCTION__]) ? parent::getSubscribedServices() : [];

        foreach ((new \ReflectionClass(self::class))->getMethods() as $method) {
            if (self::class !== $method->getDeclaringClass()->name) {
                continue;
            }

            if (!$attribute = $method->getAttributes(SubscribedService::class)[0] ?? null) {
                continue;
            }

            if ($method->isStatic() || $method->isAbstract() || $method->isGenerator() || $method->isInternal() || $method->getNumberOfRequiredParameters()) {
                throw new \LogicException(sprintf('Cannot use "%s" on method "%s::%s()" (can only be used on non-static, non-abstract methods with no parameters).', SubscribedService::class, self::class, $method->name));
            }

            if (!$returnType = $method->getReturnType()) {
                throw new \LogicException(sprintf('Cannot use "%s" on methods without a return type in "%s::%s()".', SubscribedService::class, $method->name, self::class));
            }

            $serviceId = $returnType instanceof \ReflectionNamedType ? $returnType->getName() : (string) $returnType;

            if ($returnType->allowsNull()) {
                $serviceId = '?'.$serviceId;
            }

            $services[$attribute->newInstance()->key ?? self::class.'::'.$method->name] = $serviceId;
        }

        return $services;
    }

    /**
     * @required
     */
    public function setContainer(ContainerInterface $container): ?ContainerInterface
    {
        $this->container = $container;

        if (\is_callable(['parent', __FUNCTION__])) {
            return parent::setContainer($container);
        }

        return null;
    }
}
