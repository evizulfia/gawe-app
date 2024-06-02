<?php

namespace Illuminate\Support\Facades;

use Illuminate\Support\Testing\Fakes\MailFake;

/**
 * @method static \Illuminate\Mail\Mailer mailer(string|null $name = null)
 * @method static void alwaysFrom(string $address, string|null $name = null)
 * @method static void alwaysReplyTo(string $address, string|null $name = null)
 * @method static void alwaysReturnPath(string $address)
 * @method static void alwaysTo(string $address, string|null $name = null)
<<<<<<< HEAD
 * @method static \Illuminate\Mail\PendingMail bcc($users)
 * @method static \Illuminate\Mail\PendingMail to($users)
 * @method static \Illuminate\Support\Collection queued(string $mailable, \Closure|string $callback = null)
 * @method static \Illuminate\Support\Collection sent(string $mailable, \Closure|string $callback = null)
 * @method static \Illuminate\Mail\SentMessage|null raw(string $text, $callback)
 * @method static \Illuminate\Mail\SentMessage|null plain(string $view, array $data, $callback)
 * @method static \Illuminate\Mail\SentMessage|null html(string $html, $callback)
 * @method static \Illuminate\Mail\SentMessage|null send(\Illuminate\Contracts\Mail\Mailable|string|array $view, array $data = [], \Closure|string $callback = null)
 * @method static array failures()
=======
 * @method static \Illuminate\Mail\PendingMail to(mixed $users, string|null $name = null)
 * @method static \Illuminate\Mail\PendingMail cc(mixed $users, string|null $name = null)
 * @method static \Illuminate\Mail\PendingMail bcc(mixed $users, string|null $name = null)
 * @method static \Illuminate\Mail\SentMessage|null html(string $html, mixed $callback)
 * @method static \Illuminate\Mail\SentMessage|null raw(string $text, mixed $callback)
 * @method static \Illuminate\Mail\SentMessage|null plain(string $view, array $data, mixed $callback)
 * @method static string render(string|array $view, array $data = [])
 * @method static \Illuminate\Mail\SentMessage|null send(\Illuminate\Contracts\Mail\Mailable|string|array $view, array $data = [], \Closure|string|null $callback = null)
 * @method static \Illuminate\Mail\SentMessage|null sendNow(\Illuminate\Contracts\Mail\Mailable|string|array $mailable, array $data = [], \Closure|string|null $callback = null)
 * @method static mixed queue(\Illuminate\Contracts\Mail\Mailable|string|array $view, string|null $queue = null)
 * @method static mixed onQueue(string $queue, \Illuminate\Contracts\Mail\Mailable $view)
 * @method static mixed queueOn(string $queue, \Illuminate\Contracts\Mail\Mailable $view)
 * @method static mixed later(\DateTimeInterface|\DateInterval|int $delay, \Illuminate\Contracts\Mail\Mailable $view, string|null $queue = null)
 * @method static mixed laterOn(string $queue, \DateTimeInterface|\DateInterval|int $delay, \Illuminate\Contracts\Mail\Mailable $view)
 * @method static \Symfony\Component\Mailer\Transport\TransportInterface getSymfonyTransport()
 * @method static \Illuminate\Contracts\View\Factory getViewFactory()
 * @method static void setSymfonyTransport(\Symfony\Component\Mailer\Transport\TransportInterface $transport)
 * @method static \Illuminate\Mail\Mailer setQueue(\Illuminate\Contracts\Queue\Factory $queue)
 * @method static void macro(string $name, object|callable $macro, object|callable $macro = null)
 * @method static void mixin(object $mixin, bool $replace = true)
 * @method static bool hasMacro(string $name)
 * @method static void flushMacros()
 * @method static void assertSent(string|\Closure $mailable, callable|int|null $callback = null)
 * @method static void assertNotOutgoing(string|\Closure $mailable, callable|null $callback = null)
 * @method static void assertNotSent(string|\Closure $mailable, callable|null $callback = null)
 * @method static void assertNothingOutgoing()
 * @method static void assertNothingSent()
 * @method static void assertQueued(string|\Closure $mailable, callable|int|null $callback = null)
 * @method static void assertNotQueued(string|\Closure $mailable, callable|null $callback = null)
 * @method static void assertNothingQueued()
 * @method static void assertSentCount(int $count)
 * @method static void assertQueuedCount(int $count)
 * @method static void assertOutgoingCount(int $count)
 * @method static \Illuminate\Support\Collection sent(string|\Closure $mailable, callable|null $callback = null)
 * @method static bool hasSent(string $mailable)
 * @method static \Illuminate\Support\Collection queued(string|\Closure $mailable, callable|null $callback = null)
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
 * @method static bool hasQueued(string $mailable)
 * @method static bool hasSent(string $mailable)
 * @method static mixed later(\DateTimeInterface|\DateInterval|int $delay, \Illuminate\Contracts\Mail\Mailable|string|array $view, string $queue = null)
 * @method static mixed laterOn(string $queue, \DateTimeInterface|\DateInterval|int $delay, \Illuminate\Contracts\Mail\Mailable|string|array $view)
 * @method static mixed queue(\Illuminate\Contracts\Mail\Mailable|string|array $view, string $queue = null)
 * @method static mixed queueOn(string $queue, \Illuminate\Contracts\Mail\Mailable|string|array $view)
 * @method static void assertNotQueued(string $mailable, callable $callback = null)
 * @method static void assertNotSent(string $mailable, callable|int $callback = null)
 * @method static void assertNothingQueued()
 * @method static void assertNothingSent()
 * @method static void assertQueued(string|\Closure $mailable, callable|int $callback = null)
 * @method static void assertSent(string|\Closure $mailable, callable|int $callback = null)
 *
 * @see \Illuminate\Mail\Mailer
 * @see \Illuminate\Support\Testing\Fakes\MailFake
 */
class Mail extends Facade
{
    /**
     * Replace the bound instance with a fake.
     *
     * @return \Illuminate\Support\Testing\Fakes\MailFake
     */
    public static function fake()
    {
        static::swap($fake = new MailFake);

        return $fake;
    }

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'mail.manager';
    }
}
