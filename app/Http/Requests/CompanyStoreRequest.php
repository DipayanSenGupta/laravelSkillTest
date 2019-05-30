<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyStoreRequest extends FormRequest
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
    public function rules(){
        return [
            'name' => 'required|min:10|max:50',
            'email' => 'required|email',
            'website' =>'required|min:10|max:50',
            // 'filename' => 'required'  
        ];
    }

    public function messages(){
        return [
        'name.min' => 'have a bigger name !',
        'name.max' => 'to big name bro',
        'email.email' => 'comply with the format',
        'website.min' => 'have a bigger name !',
        'website.max' => 'to big name bro',
        // 'filename' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }
}
