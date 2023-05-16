<?php

namespace Validators;

use Src\Validator\AbstractValidator;

class RegionValidator extends AbstractValidator
{
    protected string $message = 'Field :field is region';

    public function rule(): bool
    {
        return preg_match("/^(\b([а-яА-ЯЁё]+)\b(\s|$|[-]))+$/u", $this->value);
    }
}
