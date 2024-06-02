<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Mailer\Exception;

use Symfony\Component\Mailer\Bridge;
use Symfony\Component\Mailer\Transport\Dsn;

/**
 * @author Konstantin Myakshin <molodchick@gmail.com>
 */
class UnsupportedSchemeException extends LogicException
{
    private const SCHEME_TO_PACKAGE_MAP = [
<<<<<<< HEAD
=======
        'azure' => [
            'class' => Bridge\Azure\Transport\AzureTransportFactory::class,
            'package' => 'symfony/azure-mailer',
        ],
        'brevo' => [
            'class' => Bridge\Brevo\Transport\BrevoTransportFactory::class,
            'package' => 'symfony/brevo-mailer',
        ],
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
        'gmail' => [
            'class' => Bridge\Google\Transport\GmailTransportFactory::class,
            'package' => 'symfony/google-mailer',
        ],
        'mailgun' => [
            'class' => Bridge\Mailgun\Transport\MailgunTransportFactory::class,
            'package' => 'symfony/mailgun-mailer',
        ],
        'mailjet' => [
            'class' => Bridge\Mailjet\Transport\MailjetTransportFactory::class,
            'package' => 'symfony/mailjet-mailer',
        ],
        'mandrill' => [
            'class' => Bridge\Mailchimp\Transport\MandrillTransportFactory::class,
            'package' => 'symfony/mailchimp-mailer',
        ],
        'postmark' => [
            'class' => Bridge\Postmark\Transport\PostmarkTransportFactory::class,
            'package' => 'symfony/postmark-mailer',
        ],
<<<<<<< HEAD
=======
        'resend' => [
            'class' => Bridge\Resend\Transport\ResendTransportFactory::class,
            'package' => 'symfony/resend-mailer',
        ],
        'scaleway' => [
            'class' => Bridge\Scaleway\Transport\ScalewayTransportFactory::class,
            'package' => 'symfony/scaleway-mailer',
        ],
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
        'sendgrid' => [
            'class' => Bridge\Sendgrid\Transport\SendgridTransportFactory::class,
            'package' => 'symfony/sendgrid-mailer',
        ],
        'sendinblue' => [
            'class' => Bridge\Sendinblue\Transport\SendinblueTransportFactory::class,
            'package' => 'symfony/sendinblue-mailer',
        ],
        'ses' => [
            'class' => Bridge\Amazon\Transport\SesTransportFactory::class,
            'package' => 'symfony/amazon-mailer',
        ],
        'ohmysmtp' => [
            'class' => Bridge\OhMySmtp\Transport\OhMySmtpTransportFactory::class,
            'package' => 'symfony/oh-my-smtp-mailer',
        ],
    ];

    public function __construct(Dsn $dsn, string $name = null, array $supported = [])
    {
        $provider = $dsn->getScheme();
        if (false !== $pos = strpos($provider, '+')) {
            $provider = substr($provider, 0, $pos);
        }
        $package = self::SCHEME_TO_PACKAGE_MAP[$provider] ?? null;
        if ($package && !class_exists($package['class'])) {
            parent::__construct(sprintf('Unable to send emails via "%s" as the bridge is not installed; try running "composer require %s".', $provider, $package['package']));

            return;
        }

        $message = sprintf('The "%s" scheme is not supported', $dsn->getScheme());
        if ($name && $supported) {
            $message .= sprintf('; supported schemes for mailer "%s" are: "%s"', $name, implode('", "', $supported));
        }

        parent::__construct($message.'.');
    }
}
