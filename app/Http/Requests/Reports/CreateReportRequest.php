<?php

namespace App\Http\Requests\Reports;

use Illuminate\Foundation\Http\FormRequest;

class CreateReportRequest extends FormRequest
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
            'user_id' => 'required|string', // Remover após implementar a autenticação
            'interested' => 'required|string',
            'interested_type' => 'required|in:cpf,cnpj',
            'document_number_interested_party' => 'required|string',
            'purpose' => 'required|in:Financiamento bancário, Processos judiciais, Compra de imóveis, Venda de imóveis, 
            Divisão de herança,
            outros',
            'property_owner' => 'required|string',
            'owner_document' => 'required|string',
            'registration_number' => 'required|string',
            'city_hall_license_number' => 'required|string',
            'property_description' => 'required|string',
            'property_location' => 'required|string',
            'total_area' => 'required|numeric',
            'constructed_area' => 'required|numeric',
            'floors_quantity' => 'required|integer',
            'condition' => 'required|in:good,bad,excellent',
            'context' => 'required|in:urban,rural',
            'methodology' => 'required|string',
            'inspection_date' => 'required|date|before_or_equal:today',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:30720',
            'description' => 'nullable|string'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'The :attribute é obrigatório',
            'in' => 'The value selected for :attribute is invalid',
            'numeric' => 'The value :attribute must be a number',
            'image' => 'Each file in :attribute must be an image.',
            'date' => 'The :attribute field must be a valid date.',
            'before_or_equal' => 'The :attribute field must be a date before or equal to today.',
        ];
    }
}
