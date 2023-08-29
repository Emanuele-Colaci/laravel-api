<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'titolo' => 'required|max:50',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'descrizione' => 'required',
            'data' => 'required',
            'technologies' => 'required|array|exists:technologies,id'  //Verifica che le tecnologie siano un array , Ogni tecnologia deve esistere nella tabella delle tecnologie
        ];
    }
    public function messages(){
        return[
            'required'  => 'Il campo :attribute è obbligatorio.',
            'max'       => 'Il campo :attribute non può superare :max caratteri.',
            'image.mimes' => 'Il formato dell\'immagine non è valido. Si prega di caricare un\'immagine in formato JPEG, PNG, JPG, GIF o SVG.',
            'image' => 'Il tipo di file non è consentito. Si prega di caricare un\'immagine in formato JPEG, PNG, JPG, GIF o SVG.',
        ];
    }
}
