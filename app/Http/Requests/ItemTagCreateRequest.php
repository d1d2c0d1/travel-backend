<?php

namespace App\Http\Requests;


class ItemTagCreateRequest extends CustomRequest
{
    public array $validate = ['title' => 'required'];
}
