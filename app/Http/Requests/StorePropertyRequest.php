<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePropertyRequest extends FormRequest
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
            'user_id' => 'required',
            'title' => 'required|max:100|min:3',
            'description' => 'required|max:3000|min:10',
            'rooms' => 'required|numeric|integer|min:1',
            'beds' => 'required|numeric|integer|min:1',
            'bathrooms' => 'required|numeric|integer|min:1',
            'square_meters' => 'required|numeric|integer|min:2',
            'address' => 'required',
            'services' => 'required',
            // 'images' => 'required',
            'latitude' => 'nullable',
            'longitude' => 'nullable',
            'visible' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Il titolo è obbligatorio',
            'title.min' => 'Il titolo deve contenere almeno 3 caratteri',
            'title.max' => 'Il titolo deve contenere massimo 255 caratteri',
            'description.required' => 'La description è obbligatorio',
            'description.min' => 'La description deve avere almeno 10 caratteri',
            'description.min' => 'La description deve avere massimo 3000 caratteri',
            'rooms.required' => 'Il campo rooms è obbligatorio',
            'roomns.min' => 'L\' appartamento deve avere almeno 1 stanza',
            'beds.required' => 'Il campo beds è obbligatorio',
            'beds.min' => 'L\' appartamento deve avere almeno 1 letto',
            'bathrooms.required' => 'Il campo bathrooms è obbligatorio',
            'bathrooms.min' => 'L\' appartamento deve avere almeno 1 bagno',
            'square_meters.required' => 'Il campo square meters è obbligatorio',
            'square_meters.min' => 'L\'appartamento deve essere almeno di 70 metri quadri',
            'address.required' => 'Il campo address è obbligatorio',
            'address.min' => 'L\'address deve contenere almeno 5 caratteri',
            'services.required' => 'È richiesto almeno un servizio',
        ];
    }
}
