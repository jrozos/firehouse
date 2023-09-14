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
            'name'=> 'required|min:4|max:255',
            'last_name'=> 'required|min:4|max:255',
            'email'=> 'unique:artists,email|required|min:4|max:255',
            'phone_number'=> 'min:4|max:255',
            'description'=> 'min:4|max:255',
        ];
    }
}
