<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'string',
            'status' => 'integer',
            'phone' => 'integer',
            'address' => 'string',
            'price' => 'integer',
            'code' => 'integer',
            'description' => 'string',
            'type_id' => 'integer',
            'city_id' => 'integer',
            'images' => 'array',
            'seo_title' => 'string',
            'seo_description' => 'string',
        ];
    }

    public function messages()
    {

        return [
            'name.string' => 'Field name is not string',
            'description.name' => 'Field description is not string',
            'images.array' => 'Field images is not array',
            'type_id.integer' => 'Field type_id is not integer',
            'city_id.integer' => 'Field city_id is not integer',
            'price.integer' => 'Field price is not integer',
            'phone.string' => 'Field phone is not string',
            'address.string' => 'Field address is not string',
            'seo_title' => 'Field seo_title is not string',
            'seo_description' => 'Field seo_description is not string'
        ];
    }
}

