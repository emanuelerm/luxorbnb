<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePropertyRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255|min:3',
            'description' => 'required|min:10',
            'rooms' => 'required|min:1',
            'beds' => 'required|min:1',
            'bathrooms' => 'required|min:1',
            'square_meters' => 'required|integer|min:2',
            'address' => 'required|min:5',
            'visible' => 'boolean'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Il titolo è obbligatorio',
            'title.min' => 'Il titolo deve contenere almeno 3 caratteri',
            'title.max' => 'Il titolo deve contenere massimo 255 caratteri',
            'rooms.required' => 'Il campo rooms è obbligatorio',
            'roomns.min' => 'L\' appartamento deve avere almeno 1 stanza',
            'beds.required' => 'Il campo beds è obbligatorio',
            'beds.min' => 'L\' appartamento deve avere almeno 1 letto',
            'bathrooms.required' => 'Il campo bathrooms è obbligatorio',
            'bathrooms.min' => 'L\' appartamento deve avere almeno 1 bagno',
            'square_meters.required' => 'Il campo square meters è obbligatorio',
            'square_meters.min' => 'L\'appartamento deve essere almeno di 50 metri quadri',
            'addess.required' => 'Il campo address è obbligatorio',
            'address.min' => 'L\'address deve contenere almeno 5 caratteri',
        ];
    }
}
