<?php

namespace Sovic\Common\Tests\Validator;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Sovic\Common\Validator\EmailValidator;

final class EmailValidatorTest extends TestCase
{
    public static function emailProvider(): array
    {
        $data = [];
        $data[] = ['', false];
        $data[] = ['test@example.com', true];
        $data[] = ['user@subdomain.domain.co', true];
        $data[] = ['invalid-email', false];
        $data[] = ['email@.com', false];
        $data[] = ['@example.com', false];
        $data[] = ['lenka,terbr@zstskostelec.cz', false];
        $data[] = ['burdova.karla01g.ys-ricanz.cz', false];
        $data[] = ['damianpk7o2.pl', false];
        $data[] = ['Rudolf33', false];
        $data[] = ['michal.kotlar11@email.cz.', false];
        $data[] = ['míchal.podesva92@gmail.com', true];

        return $data;
    }

    #[DataProvider('emailProvider')]
    public function testValidateEmail(string $input, bool $expected): void
    {
        $result = EmailValidator::validate($input);

        $actual = $result === true;
        self::assertEquals($expected, $actual, $input);
    }
}
