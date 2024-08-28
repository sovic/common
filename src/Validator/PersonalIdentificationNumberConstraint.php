<?php

namespace Sovic\Common\Validator;

use Symfony\Component\Validator\Constraint;

class PersonalIdentificationNumberConstraint extends Constraint
{
    public string $message = 'Neplatné rodné číslo "{{ string }}".';
}
