<?php

namespace Aerni\LivewireForms\Fields\Properties;

use Statamic\Support\Str;

trait WithCastBooleans
{
    public function castBooleansProperty(): bool
    {
        return Str::toBool($this->field->get('cast_booleans'));
    }
}