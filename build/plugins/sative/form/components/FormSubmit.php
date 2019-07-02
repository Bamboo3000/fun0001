<?php namespace Sative\Form\Components;

use Cms\Classes\ComponentBase;
use Input;
use Flash;
use Redirect;
use Request;
use Mail;
use Crypt;
use Validator;
use Validation;
use ValidationException;
use Sative\Form\Models\Form;
use Illuminate\Support\Facades\DB;
//use \Anhskohbo\NoCaptcha\NoCaptcha;

class FormSubmit extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'Form Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function onRun()
	{
        //$this->page['cvCaptcha'] = app('captcha')->display(['data-callback' => 'cvCaptchaCallback']);
    }
    
    /*
    *
    * Form submit script
    *
    */
    protected function onSubmit()
    {

        $form_data = array(
            'name' => Input::get('name'),
            'phone' => Input::get('phone'),
            'email' => Input::get('email'),
            'money' => Input::get('money'),
            'description' => Input::get('description'),
            'consent' => Input::get('consent'),
        );

        $rules = [
			'name'	     => 'required|min:3',
            'phone'		 => 'required|regex:/[0-9]{9}/',
            'consent'    => 'required|accepted'
        ];

        $validator = Validator::make($form_data, $rules);

        if($validator->fails()){
            throw new ValidationException($validator);
		} else {
            $form_data['consent'] = 1;
            Form::insertGetId(
                [
                    'name' => encrypt($form_data['name']),
                    'phone' => encrypt($form_data['phone']),
                    'email' => encrypt($form_data['email']),
                    'money' => $form_data['money'],
                    'description' => $form_data['description'],
                    'agree' => $form_data['consent'],
                ]
            );
            Flash::success('Dziękujemy za wysłanie zgłoszenia! Skonktujemy się z Tobą już wkrótce!');
        }
        
    }

    protected function sendMail($inputs, $subject, $template)
    {
        Mail::send('searchit.jobs::mail.'.$template, $inputs, function($message) use ($inputs, $subject){

            $message->from('info@fundit.com.pl', 'Fundit');
            $message->to($inputs['email'], $inputs['name']);
            $message->subject($subject);

        });
    }

}