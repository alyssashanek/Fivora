<?php

if (! function_exists('route_or')) {
    function route_or(string $name, $parameters = [], string $fallback = '#'): string
    {
        return \Illuminate\Support\Facades\Route::has($name)
            ? route($name, $parameters)
            : $fallback;
    }
}