<?php

namespace Sovic\Common\Sentry;

use Psr\Log\LoggerInterface;
use Sentry\Event;
use Sentry\EventHint;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class Sentry
{
    private LoggerInterface $notFoundLogger;

    public function __construct(LoggerInterface $notFoundLogger)
    {
        $this->notFoundLogger = $notFoundLogger;
    }

    /** @var string[] */
    private static array $ignoreNotFoundPaths = [
        '/\/(wordpress|wp|wp-content|wp-includes|wp-admin)/', // WordPress
        '/(_ignition|_profiler|phpdebugbar|ajax)/', // developer tools
        '/\/(admin|cms)/', // cms
        '/(phpinfo)/', // system
        '/\/(old|new|blog|old_files|oldwebsite|backup|sitemap|test_404_page)/', // generic
        '/\.(git|aws|gitignore)/',
    ];

    public function beforeSend(Event $event, ?EventHint $hint): ?Event
    {
        $report = true;
        if ($hint && is_object($hint->exception)) {
            $className = $hint->exception ? get_class($hint->exception) : null;
            $message = mb_strtolower($hint->exception->getMessage());

            if ($className === NotFoundHttpException::class) {
                $message = mb_strtolower($hint->exception->getMessage());
                foreach (self::$ignoreNotFoundPaths as $pathRegExp) {
                    preg_match($pathRegExp, $message, $matches);
                    if (!empty($matches)) {
                        $report = false;
                        break;
                    }
                }

                if ($report) {
                    // write to log file
                    $referrer = !empty($_SERVER['HTTP_REFERER']) ? ' (' . $_SERVER['HTTP_REFERER'] . ')' : '';
                    $addr = !empty($_SERVER['REMOTE_ADDR']) ? ' (' . $_SERVER['REMOTE_ADDR'] . ')' : '';
                    $this->notFoundLogger->info('404: ' . $message . $referrer . $addr);
                }

                // skip sentry logging
                return null;
            }

            if (str_contains($message, 'highlight_file')) {
                $report = false;
            }

            // optionally alert someone about admin access attempt?
            if ($className === AccessDeniedException::class || $className === AccessDeniedHttpException::class) {
                $report = false;
            }

            // do not report not-allowed http methods used
            if ($className === MethodNotAllowedException::class
                || $className === MethodNotAllowedHttpException::class) {
                $report = false;
            }
        }

        if (!$report) {
            return null;
        }

        return $event;
    }
}
