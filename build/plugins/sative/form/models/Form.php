<?php namespace Sative\Form\Models;

use Model;

/**
 * Model
 */
class Form extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'sative_form_form';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
