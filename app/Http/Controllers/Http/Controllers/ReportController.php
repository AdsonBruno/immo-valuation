<?php

namespace App\Http\Controllers\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ReportModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReportController extends Controller
{
    public function createReport(Request $request)
    {
        $validator = Validator::make($request->all(), [
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
        ]);

        if ($validator->fails()) {
            return response()->json([
                'messages' => 'Validation failed',
                'errors' => $validator->errors(),
                'statusCode' => 422
            ], 422);
        }

        $report = ReportModel::create([
            'user_id' => auth()->id,
            'interested' => $request->interested,
            'interested_type' => $request->interested_type,
            'document_number_interested_party' => $request->document_number_interested_party,
            'purpose' => $request->purpose,
            'property_owner' => $request->property_owner,
            'owner_document' => $request->owner_document,
            'registration_number' => $request->registration_number,
            'city_hall_license_number' => $request->city_hall_license_number,
            'property_description' => $request->property_description,
            'property_location' => $request->property_location,
            'total_area' => $request->total_area,
            'constructed_area' => $request->constructed_area,
            'floors_quantity' => $request->floors_quantity,
            'condition' => $request->condition,
            'context' => $request->context,
            'methodology' => $request->methodology,
            'inspection_date' => $request->inspection_date,
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('report_images', 'public');

                $report->images()->create([
                    'image_path' => $path,
                    'description' => $request->description
                ]);
            }
        }

        return response()->json([
            'message' => 'Report created_successfully',
            'report' => $report->load('images'),
            'statusCode' => 201
        ], 201);
    }
}
