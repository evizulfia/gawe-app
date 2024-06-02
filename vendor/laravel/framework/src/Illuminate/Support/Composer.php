<?php

namespace Illuminate\Support;

use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Process\PhpExecutableFinder;
use Symfony\Component\Process\Process;

class Composer
{
    /**
     * The filesystem instance.
     *
     * @var \Illuminate\Filesystem\Filesystem
     */
    protected $files;

    /**
     * The working path to regenerate from.
     *
     * @var string|null
     */
    protected $workingPath;

    /**
     * Create a new Composer manager instance.
     *
     * @param  \Illuminate\Filesystem\Filesystem  $files
     * @param  string|null  $workingPath
     * @return void
     */
    public function __construct(Filesystem $files, $workingPath = null)
    {
        $this->files = $files;
        $this->workingPath = $workingPath;
    }

    /**
<<<<<<< HEAD
=======
     * Determine if the given Composer package is installed.
     *
     * @param  string  $package
     * @return bool
     *
     * @throw \RuntimeException
     */
    protected function hasPackage($package)
    {
        $composer = json_decode(file_get_contents($this->findComposerFile()), true);

        return array_key_exists($package, $composer['require'] ?? [])
            || array_key_exists($package, $composer['require-dev'] ?? []);
    }

    /**
     * Install the given Composer packages into the application.
     *
     * @param  array<int, string>  $packages
     * @param  bool  $dev
     * @param  \Closure|\Symfony\Component\Console\Output\OutputInterface|null  $output
     * @param  string|null  $composerBinary
     * @return bool
     */
    public function requirePackages(array $packages, bool $dev = false, Closure|OutputInterface|null $output = null, $composerBinary = null)
    {
        $command = collect([
            ...$this->findComposer($composerBinary),
            'require',
            ...$packages,
        ])
        ->when($dev, function ($command) {
            $command->push('--dev');
        })->all();

        return 0 === $this->getProcess($command, ['COMPOSER_MEMORY_LIMIT' => '-1'])
            ->run(
                $output instanceof OutputInterface
                    ? function ($type, $line) use ($output) {
                        $output->write('    '.$line);
                    } : $output
            );
    }

    /**
     * Remove the given Composer packages from the application.
     *
     * @param  array<int, string>  $packages
     * @param  bool  $dev
     * @param  \Closure|\Symfony\Component\Console\Output\OutputInterface|null  $output
     * @param  string|null  $composerBinary
     * @return bool
     */
    public function removePackages(array $packages, bool $dev = false, Closure|OutputInterface|null $output = null, $composerBinary = null)
    {
        $command = collect([
            ...$this->findComposer($composerBinary),
            'remove',
            ...$packages,
        ])
        ->when($dev, function ($command) {
            $command->push('--dev');
        })->all();

        return 0 === $this->getProcess($command, ['COMPOSER_MEMORY_LIMIT' => '-1'])
            ->run(
                $output instanceof OutputInterface
                    ? function ($type, $line) use ($output) {
                        $output->write('    '.$line);
                    } : $output
            );
    }

    /**
     * Modify the "composer.json" file contents using the given callback.
     *
     * @param  callable(array):array  $callback
     * @return void
     *
     * @throw \RuntimeException
     */
    public function modify(callable $callback)
    {
        $composerFile = $this->findComposerFile();

        $composer = json_decode(file_get_contents($composerFile), true, 512, JSON_THROW_ON_ERROR);

        file_put_contents(
            $composerFile,
            json_encode(
                call_user_func($callback, $composer),
                JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
            )
        );
    }

    /**
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
     * Regenerate the Composer autoloader files.
     *
     * @param  string|array  $extra
     * @return int
     */
    public function dumpAutoloads($extra = '')
    {
        $extra = $extra ? (array) $extra : [];

        $command = array_merge($this->findComposer(), ['dump-autoload'], $extra);

        return $this->getProcess($command)->run();
    }

    /**
     * Regenerate the optimized Composer autoloader files.
     *
     * @return int
     */
    public function dumpOptimized()
    {
        return $this->dumpAutoloads('--optimize');
    }

    /**
     * Get the composer command for the environment.
     *
     * @return array
     */
    protected function findComposer()
    {
        if ($this->files->exists($this->workingPath.'/composer.phar')) {
            return [$this->phpBinary(), 'composer.phar'];
        }

        return ['composer'];
    }

    /**
     * Get the PHP binary.
     *
     * @return string
     */
    protected function phpBinary()
    {
        return ProcessUtils::escapeArgument((new PhpExecutableFinder)->find(false));
    }

    /**
     * Get a new Symfony process instance.
     *
     * @param  array  $command
     * @return \Symfony\Component\Process\Process
     */
    protected function getProcess(array $command)
    {
        return (new Process($command, $this->workingPath))->setTimeout(null);
    }

    /**
     * Set the working path used by the class.
     *
     * @param  string  $path
     * @return $this
     */
    public function setWorkingPath($path)
    {
        $this->workingPath = realpath($path);

        return $this;
    }
}
