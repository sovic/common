<?php

namespace Sovic\Common\Tests\Validator;

use PHPUnit\Framework\Attributes\DataProvider;
use Sovic\Common\Validator\DicConstraint;
use Sovic\Common\Validator\DicConstraintValidator;
use Symfony\Component\Validator\ConstraintValidatorInterface;
use Symfony\Component\Validator\Test\ConstraintValidatorTestCase;

final class DicValidatorTest extends ConstraintValidatorTestCase
{
    #[DataProvider('provider')]
    public function testValidateIco(?string $value): void
    {
        $constraint = new DicConstraint(['message' => 'myMessage']);

        $this->validator->validate($value, $constraint);

        $this->buildViolation('myMessage')
            ->setParameter('{{ string }}', $value)
            ->assertRaised();
    }

    protected function createValidator(): ConstraintValidatorInterface
    {
        return new DicConstraintValidator();
    }

    public static function provider(): array
    {
        return [
            ['12345678'], // just digits
            ['CZ'], // just CZ
            ['CZ1234567'], // 7 digits
            ['CZ12345678901'], // 11 digits
        ];
    }
}
