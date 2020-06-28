<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        \Form::component('bsText', 'components.form.text', ['name', 'value' => null, 'attributes' => []]);
        \Form::component('bsTextArea', 'components.form.textarea', ['name', 'value' => null, 'attributes' => []]);
        \Form::component('bsEmail', 'components.form.email', ['name', 'value' => null, 'attributes' => []]);
        \Form::component('bsPassword', 'components.form.password', ['name', 'help']);
        \Form::component('bsSelect', 'components.form.select', ['name', 'options' => [], 'value' => null, 'attributes' => []]);
        \Form::component('bsDate', 'components.form.date', ['name', 'value' => null, 'attributes' => []]);
    }
}
