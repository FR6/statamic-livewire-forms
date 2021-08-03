<?php

namespace Aerni\LivewireForms;

use Livewire\Livewire;
use Illuminate\Support\Facades\Blade;
use Aerni\LivewireForms\BladeDirectives;
use Aerni\LivewireForms\Facades\Captcha;
use Illuminate\Support\Facades\Validator;
use Aerni\LivewireForms\Http\Livewire\Form;
use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{
    protected $commands = [
        Commands\MakeLivewireForm::class,
    ];

    protected $fieldtypes = [
        Fieldtypes\Captcha::class,
    ];

    public function boot()
    {
        parent::boot();

        $this->registerTranslations();
        $this->registerPublishables();
        $this->registerBladeDirectives();
        $this->registerValidators();
        $this->registerLivewireComponents();
    }

    protected function registerTranslations()
    {
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'livewire-forms');
        $this->loadJsonTranslationsFrom(__DIR__.'/../resources/lang');
    }

    protected function registerPublishables()
    {
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/livewire-forms'),
        ], 'livewire-forms-views');
    }

    protected function registerBladeDirectives()
    {
        Blade::directive('captchaKey', [BladeDirectives::class, 'captchaKey']);
    }

    protected function registerValidators()
    {
        Validator::extend('captcha', function ($attribute, $value) {
            return Captcha::verifyResponse($value, request()->getClientIp());
        }, __('livewire-forms::validation.captcha_challenge'));
    }

    protected function registerLivewireComponents()
    {
        Livewire::component('form', Form::class);
    }
}
