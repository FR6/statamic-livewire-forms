<?php

namespace Aerni\LivewireForms\Form;

class Component
{
    protected string $theme;
    protected string $view;

    public function defaultView(): string
    {
        return config('livewire-forms.view', 'default');
    }

    public function defaultTheme(): string
    {
        return config('livewire-forms.theme', 'default');
    }

    public function view(string $view): self
    {
        $this->view = $view;

        return $this;
    }

    public function theme(string $theme): self
    {
        $this->theme = $theme;

        return $this;
    }

    public function getView(string $view): string
    {
        $themeView = "livewire.forms.{$this->theme}.{$view}";
        $fallback = "livewire-forms::{$view}";

        return view()->exists($themeView) ? $themeView : $fallback;
    }
}