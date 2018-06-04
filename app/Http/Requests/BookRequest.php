<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $book = $this->route('book');
        if($book) {
            return $this->user()->id == $book->user_id;
        }
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $book= $this->route('book');
        $id = (isset($book->id))? $book->id: null;
        return [
            'title' => "required|max:255|unique:books,title,$id",
            'subtitle' => 'required|max:255',
            'price' => 'required|numeric'
        ];
    }

    public function attributes()
    {
        return [
            'subtitle' => 'Descrição',
            'price' => 'Preço'
        ];
    }
}
