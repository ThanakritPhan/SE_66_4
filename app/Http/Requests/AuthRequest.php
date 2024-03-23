<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if(request()->isMethod('post')){
            return [
                //'memberID' => 'required|string',
                'name' => 'required|string',
                'surname' => 'required|string',
                'address' => 'required|string',
                //'rank'=> 'required|',
                'userID' => 'required|string|',
                'password' => 'required|string',
                //'PV'=> 'required|',
                'uplineID' => 'required|string'
            ];
        }
        else {
            return [
              
               //'memberID' => 'required|string',
               'name' => 'required|string',
               'surname' => 'required|string',
               'address' => 'required|string',
               //'rank'=> 'required|',
               'userID' => 'required|string|',
               'password' => 'required|string',
               //'PV'=> 'required|',
               'uplineID' => 'required|string'
        ];
        }
        
    }

    public function messages(){
        if(request() -> isMethod('post')){
            return [
                //'memberID.required' => 'memberID is required',
                'name.required' => 'surname is required',
                'surname.required' => 'address is required',
                'address.required' => 'userID is required',
                //'rank.required' => 'rank is required',
                'userID.required' => 'loginID is required',
                'password.required' => 'loginPass is required',
                //'PV.required' => 'PV is required',
                'uplineID.required' => 'upline is required'
            ];
        }else{
            return[
                 //'memberID.required' => 'memberID is required',
                 'name.required' => 'surname is required',
                 'surname.required' => 'address is required',
                 'address.required' => 'userID is required',
                 //'rank.required' => 'rank is required',
                 'userID.required' => 'loginID is required',
                 'password.required' => 'loginPass is required',
                 //'PV.required' => 'PV is required',
                 'uplineID.required' => 'upline is required'
            ];
        }
    }
}
