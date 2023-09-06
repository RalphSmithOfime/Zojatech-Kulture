<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Cartrequest extends FormRequest
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
     * @return array<string>
     */
    public function rules(): array
    {
        return [
            //
            'user_id'=> 'required|exists:user,uuid',
            'beat_id'=> 'required|exists:beats,id',
            'cart_id'=> 'required|exists:cart,id',
            'quantity'=>'required|integer|min:1',
            'price'=>'required|integer|min:100',
        ];
    }
}
