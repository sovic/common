<?php

namespace Sovic\Common\Validator;

use JetBrains\PhpStorm\ArrayShape;
use libphonenumber\NumberParseException;
use libphonenumber\PhoneNumberUtil;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use UnexpectedValueException;

class PhoneConstraintValidator extends ConstraintValidator
{
    #[ArrayShape(['phone' => "mixed", 'country' => "mixed"])]
    public function validate(mixed $value, Constraint $constraint): void
    {
        if (!$constraint instanceof PhoneConstraint) {
            throw new UnexpectedTypeException($constraint, PhoneConstraint::class);
        }

        $phone = $value['phone'] ?? null;
        $country = $value['country'] ?? null;

        // custom constraints should ignore null and empty values to allow
        // other constraints (NotBlank, NotNull, etc.) to take care of that
        if (null === $phone || '' === $phone) {
            return;
        }

        if (!is_string($phone)) {
            // throw this exception if your validator cannot handle the passed type so that it can be marked as invalid
            throw new UnexpectedValueException($phone, 'string');
        }

        $phoneUtil = PhoneNumberUtil::getInstance();
        try {
            $phoneUtil->parse($phone, $country);
        } catch (NumberParseException) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ string }}', $value)
                ->addViolation();
        }
    }
}
