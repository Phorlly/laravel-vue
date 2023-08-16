<?php

namespace App\Providers;


use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Validator::extend("image64", function ($attr, $val, $params, $valid) {
            $extension = explode('/', explode(':', substr($val, 0, strpos($val, ";")))[1])[1];
            if (in_array($extension, $params)) {
                return true;
            } else {
                return false;
            }
        });

        Validator::replacer('image64', function ($message, $attr, $rule, $params) {
            return str_replace(':values', join(",", $params), $message);
        });
    }
}
