<?php

namespace Sovic\Common\Tests\Validator;

use PHPUnit\Framework\Attributes\DataProvider;
use Sovic\Common\Validator\IcoConstraint;
use Sovic\Common\Validator\IcoConstraintValidator;
use Symfony\Component\Validator\ConstraintValidatorInterface;
use Symfony\Component\Validator\Test\ConstraintValidatorTestCase;

final class IcoValidatorTest extends ConstraintValidatorTestCase
{
    #[DataProvider('provider')]
    public function testValidateIco(?string $value): void
    {
        $constraint = new IcoConstraint('strict', 'myMessage');

        $this->validator->validate($value, $constraint);

        $this->buildViolation('myMessage')
            ->setParameter('{{ string }}', $value)
            ->assertRaised();
    }

    protected function createValidator(): ConstraintValidatorInterface
    {
        return new IcoConstraintValidator();
    }

    public static function provider(): array
    {
        return [
            ['12345678'],
            ['CZ12345678'],
        ];
    }
}
