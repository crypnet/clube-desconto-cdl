<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

/**
 * Class UserUpdate
 *
 * @author Andre Luis
 * @package App\Http\Requests
 */
class UserUpdate extends FormRequest
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
     * @param  \Illuminate\Http\Request  $request
     *
     * @return array
     */
    public function rules(Request $request)
    {
        return [
            'name'     => 'required|unique:users,id,'.$request->segment(3),
            'email'    => 'required|email|unique:users,id,'.$request->segment(3),
            'password' => 'required|confirmed',
        ];
    }
}
