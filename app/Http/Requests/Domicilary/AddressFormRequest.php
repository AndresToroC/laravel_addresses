<?php

namespace App\Http\Requests\Domicilary;

use Illuminate\Foundation\Http\FormRequest;

class AddressFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'career' => 'required|max:10',
            'street' => 'required|max:10'
        ];
    }
}
