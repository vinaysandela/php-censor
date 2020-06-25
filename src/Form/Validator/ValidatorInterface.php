<?php

declare(strict_types=1);

namespace PHPCensor\Form\Validator;

interface ValidatorInterface
{
    public function __invoke($value);
}
