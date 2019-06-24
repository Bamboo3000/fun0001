<?php namespace Sative\Form;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            'Sative\Form\Components\FormSubmit' => 'form'
        ];
    }

    public function registerSettings()
    {
    }
}
