<?php

namespace Sovic\Common\Validator;

use Attribute;
use Symfony\Component\Validator\Constraint;

#[Attribute]
class PhoneConstraint extends Constraint
{
    public string $message = 'Neplatné telefonní číslo "{{ string }}".';
}
