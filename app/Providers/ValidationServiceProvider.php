<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class ValidationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Validator::extend('images', function ($attribute, $value, $parameters, $validator) {
            if (!is_array($value)) {
                return false;
            }

            foreach ($value as $file) {
                if (!$file->isValid() || $file->isImage()) {
                    return false;
                }
            }

            return true;
        });
    }
}
