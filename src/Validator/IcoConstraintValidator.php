<?php

namespace Sovic\Common\Validator;

use Sovic\Common\Enum\CountryId;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use UnexpectedValueException;

class IcoConstraintValidator extends ConstraintValidator
{
    public function validate(mixed $value, Constraint $constraint): void
    {
        if (!$constraint instanceof IcoConstraint) {
            throw new UnexpectedTypeException($constraint, IcoConstraint::class);
        }

        // custom constraints should ignore null and empty values to allow
        // other constraints (NotBlank, NotNull, etc.) to take care of that
        if (null === $value || '' === $value) {
            return;
        }

        if (!is_string($value)) {
            // throw this exception if your validator cannot handle the passed type so that it can be marked as invalid
            throw new UnexpectedValueException($value, 'string');
        }

        if ('strict' === $constraint->mode) {
            $isValid = (new CompanyIdentificationNumberValidator())->validate($value, CountryId::CZ);
        } else {
            // just number check
            $isValid = preg_match('#^\d{8}$#', $value);
        }

        if ($isValid) {
            return;
        }

        // the argument must be a string or an object implementing __toString()
        $this->context->buildViolation($constraint->message)
            ->setParameter('{{ string }}', $value)
            ->addViolation();
    }
}
