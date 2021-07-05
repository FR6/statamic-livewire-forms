<?php

namespace Aerni\LivewireForms;

use Aerni\LivewireForms\Facades\Captcha;

class BladeDirectives
{
    /**
     * Get the rendered captcha head view.
     */
    public static function captchaHead(): string
    {
        return Captcha::head();
    }

    /**
     * Get the captcha's key.
     */
    public static function captchaKey(): string
    {
        return Captcha::key();
    }

    /**
     * Get the unique ID of this captcha.
     */
    public static function captchaId(): string
    {
        return "{{ \$_instance->id }}";
    }
}
