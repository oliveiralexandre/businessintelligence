<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProductRequest extends FormRequest
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
        $id = $this->segment(2);

        return [
            'titulo' => "required|min:3|max:255|unique:destaques,titulo,{$id},id",
            'texto' => 'required|min:3|max:10000',
            'image' => 'nullable|image',
        ];
    }

    public function messages()
    {
        return [
            'titulo.required' => 'Nome é obrigatório',
            'titulo.min' => 'Ops! Precisa informar pelo menos 3 caracteres',
            'photo.required' => 'Ops! Precisa informar uma imagem',
        ];
    }
}
