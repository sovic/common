<?php

namespace Sovic\Common\Validator;

use Attribute;
use Symfony\Component\Validator\Constraint;

#[Attribute]
class DicConstraint extends Constraint
{
    public string $message = 'Neplatná hodnota DIČ "{{ string }}".';
}
