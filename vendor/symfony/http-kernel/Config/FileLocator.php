<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\Config;

use Symfony\Component\Config\FileLocator as BaseFileLocator;
use Symfony\Component\HttpKernel\KernelInterface;

/**
 * FileLocator uses the KernelInterface to locate resources in bundles.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class FileLocator extends BaseFileLocator
{
<<<<<<< HEAD
    private $kernel;

    public function __construct(KernelInterface $kernel)
    {
        $this->kernel = $kernel;

=======
    public function __construct(
        private KernelInterface $kernel,
    ) {
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
        parent::__construct();
    }

    /**
     * {@inheritdoc}
     */
    public function locate(string $file, string $currentPath = null, bool $first = true): string|array
    {
        if (isset($file[0]) && '@' === $file[0]) {
            $resource = $this->kernel->locateResource($file);

            return $first ? $resource : [$resource];
        }

        return parent::locate($file, $currentPath, $first);
    }
}
