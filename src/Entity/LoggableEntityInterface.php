<?php

namespace Sovic\Common\Entity;

interface LoggableEntityInterface
{
    public function setOperator(mixed $operator): void;

    public function getOperator(): mixed;
}
