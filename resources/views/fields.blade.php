@foreach ($fields as $field)
    @include('statamic-livewire-forms::fields.' . $field->type)
@endforeach

<button type="submit">Submit</button>