<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadBeatRequest extends FormRequest
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
            'name' => 'required|string',
            'audio' => 'required|mimes:mpga,wav,mp3,octet-stream',
            'price' => 'required|numeric',
            'genre' => 'required|exists:genres,name',
            'image' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'license_type' => 'required|string',
            'available_copies' => 'required|numeric',
           
        ];
    }
}
