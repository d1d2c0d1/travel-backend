<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;

abstract class CustomRequest extends Request
{
    /**
     * Create rules validate
     *
     * @var array|string[]
     */

    public array $validate;
    /**
     * Return param
     *
     * @var array
     */
    public array $message;

    /**
     * Create Exception or get Request
     */

    public function __construct()
    {
        $validate = Validator::make(parent::all(), $this->validate);
        if ($validate->fails()) {
            $this->message = [
                'status' => false,
                'error' => 'Validation. Credintails is wrong',
                'fields_error' => $validate->getMessageBag()
            ];
        } else {
            $this->message = ['status' => 'true', 'data' => parent::all()];
        }
    }

    public function input($value, $default = null)
    {
        return parent::input($value, $default);
    }

}
