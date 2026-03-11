<?php

namespace Sovic\Common\Validator;

use Attribute;
use Symfony\Component\Validator\Constraint;

#[Attribute]
class IcoConstraint extends Constraint
{
    public string $message = 'Neplatná hodnota IČO "{{ string }}".';
    public string $mode = 'strict';
}
