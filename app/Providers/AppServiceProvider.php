<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Form::component('simpleInput', 'components.form.simple-input', ['name', 'value', 'attributes']);

        \Form::component('numberInput', 'components.form.number-input', ['name', 'value', 'attributes']);

        //\Form::component('dateInput', 'components.form.date-input', ['name', 'value', 'attributes']); 
        
        \Form::component('textAreaInput', 'components.form.textArea-input', ['name', 'value', 'attributes']);        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
