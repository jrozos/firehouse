<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArtistRequest extends FormRequest
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
            'name'=> 'required|min:2|max:20',
            'last_name'=> 'required|min:2|max:20',
            'email'=> '',
            'sort'=> '',
            'instagram'=> '',
            'phone_number'=> '',
            'description'=> 'max:1200',
        ];
    }
}
