<?php

namespace Sovic\Common\Validator;

use Attribute;
use Symfony\Component\Validator\Constraint;

#[Attribute]
class IcoConstraint extends Constraint
{
    public string $message = 'Neplatná hodnota IČO "{{ string }}".';
    public string $mode = 'strict';

    // all configurable options must be passed to the constructor
    public function __construct(?string $mode = null, ?string $message = null, ?array $groups = null, $payload = null)
    {
        parent::__construct([], $groups, $payload);

        $this->mode = $mode ?? $this->mode;
        $this->message = $message ?? $this->message;
    }
}
