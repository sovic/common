<?php

namespace Sovic\Common\Sentry;

class SentryFactory
{
    public static function createBeforeSendCallable(Sentry $sentry): callable
    {
        return [$sentry, 'beforeSend'];
    }
}
