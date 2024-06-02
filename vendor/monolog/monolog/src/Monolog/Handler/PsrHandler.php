<?php declare(strict_types=1);

/*
 * This file is part of the Monolog package.
 *
 * (c) Jordi Boggiano <j.boggiano@seld.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Monolog\Handler;

use Monolog\Logger;
use Psr\Log\LoggerInterface;
use Monolog\Formatter\FormatterInterface;

/**
 * Proxies log messages to an existing PSR-3 compliant logger.
 *
 * If a formatter is configured, the formatter's output MUST be a string and the
 * formatted message will be fed to the wrapped PSR logger instead of the original
 * log record's message.
 *
 * @author Michael Moussa <michael.moussa@gmail.com>
 */
class PsrHandler extends AbstractHandler implements FormattableHandlerInterface
{
    /**
     * PSR-3 compliant logger
     *
     * @var LoggerInterface
     */
    protected $logger;

<<<<<<< HEAD
    /**
     * @var FormatterInterface|null
     */
    protected $formatter;
=======
    protected FormatterInterface|null $formatter = null;
    private bool $includeExtra;
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec

    /**
     * @param LoggerInterface $logger The underlying PSR-3 compliant logger to which messages will be proxied
     */
<<<<<<< HEAD
    public function __construct(LoggerInterface $logger, $level = Logger::DEBUG, bool $bubble = true)
=======
    public function __construct(LoggerInterface $logger, int|string|Level $level = Level::Debug, bool $bubble = true, bool $includeExtra = false)
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
    {
        parent::__construct($level, $bubble);

        $this->logger = $logger;
        $this->includeExtra = $includeExtra;
    }

    /**
     * {@inheritDoc}
     */
    public function handle(array $record): bool
    {
        if (!$this->isHandling($record)) {
            return false;
        }

<<<<<<< HEAD
        if ($this->formatter) {
            $formatted = $this->formatter->format($record);
            $this->logger->log(strtolower($record['level_name']), (string) $formatted, $record['context']);
        } else {
            $this->logger->log(strtolower($record['level_name']), $record['message'], $record['context']);
        }
=======
        $message = $this->formatter !== null
            ? (string) $this->formatter->format($record)
            : $record->message;

        $context = $this->includeExtra
            ? [...$record->extra, ...$record->context]
            : $record->context;

        $this->logger->log($record->level->toPsrLogLevel(), $message, $context);
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec

        return false === $this->bubble;
    }

    /**
     * Sets the formatter.
     *
     * @param FormatterInterface $formatter
     */
    public function setFormatter(FormatterInterface $formatter): HandlerInterface
    {
        $this->formatter = $formatter;

        return $this;
    }

    /**
     * Gets the formatter.
     *
     * @return FormatterInterface
     */
    public function getFormatter(): FormatterInterface
    {
        if (!$this->formatter) {
            throw new \LogicException('No formatter has been set and this handler does not have a default formatter');
        }

        return $this->formatter;
    }
}
