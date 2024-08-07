<?php

namespace Sovic\Common\Enum;

enum SexId: int implements SimpleTranslatableEnumInterface
{
    case Male = 1;
    case Female = 2;

    public function trans(): string
    {
        return match ($this) {
            self::Male => 'Muž',
            self::Female => 'Žena',
        };
    }
}
