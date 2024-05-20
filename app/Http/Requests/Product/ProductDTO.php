<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use App\Core\Entities\categories;

class ProductDTO extends FormRequest
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
        return [
            'name' => 'required|string|max:255|unique:products',
            'price' => 'required|string|max:255',
            'stock' => 'required|string',
            'category' => ['required', 'string', 'max:255', function ($attribute, $value, $fail) {
                $category = categories::find($value); 
    
                if (!$category) {
                    $fail('El campo category debe ser un ID válido de una categoría existente, si no las conoce favor valida el endpoint /categories bajo el metodo GET');
                }
            }],
        ];
    }

    /**
     * Messages with description for users.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function messages()
    {
        return [            
            'name.required' => 'El campo name es obligatorio y no puede ser enviado como vacío.', 
            'name.string' => 'El campo name debe ser una cadena de texto.',
            'name.max' => 'El campo name no debe exceder los 255 caracteres.',
            'name.unique' => 'El campo name suministrado ya se encuentra registrado previamente en el sistema.',
            'price.required' => 'El campo precio es obligatorio y no puede ser enviado como vacío.',
            'stock.required' => 'El campo stock es obligatorio y no puede ser enviado como vacío.',
            'category.required' => 'El campo category es obligatorio y no puede ser enviado como vacío.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        throw new HttpResponseException(
            response()->json([
                'status' => 'fail',
                'data' => $errors,
            ], 422)
        );
    }
}
