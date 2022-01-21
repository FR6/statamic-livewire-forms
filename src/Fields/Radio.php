<?php

namespace Aerni\LivewireForms\Fields;

use Aerni\LivewireForms\Facades\Component;
use Aerni\LivewireForms\Fields\Properties\WithCastBooleans;
use Aerni\LivewireForms\Fields\Properties\WithInline;
use Aerni\LivewireForms\Fields\Properties\WithInstructions;
use Aerni\LivewireForms\Fields\Properties\WithOptions;

class Radio extends Field
{
    use WithCastBooleans;
    use WithInline;
    use WithInstructions;
    use WithOptions;

    public function viewProperty(): string
    {
        return Component::getView('fields.radio');
    }

    public function defaultProperty(): ?string
    {
        $default = $this->field->defaultValue();
        $options = $this->optionsProperty();

        // A default is only valid if it exists in the options.
        return collect($options)->only($default ?? [])->keys()->first();
    }
}
