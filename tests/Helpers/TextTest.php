<?php

namespace Sovic\Common\Tests\Helpers;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Sovic\Common\Helpers\Text;

final class TextTest extends TestCase
{
    #[DataProvider('provider')]
    public function testIsUppercasePrevailing($value, $length, $expected): void
    {
        $this->assertSame($expected, Text::isUppercasePrevailing($value, $length));
    }

    public static function provider(): array
    {
        return [
            ['Novák', 50, false],
            ['ŘEMPĚLKOVÁ', 90, true],
            ['ŘEMPĚLKOvá', 90, false],
            ['PetR', 50, true],
            ['PeteR', 50, false],
        ];
    }
}
