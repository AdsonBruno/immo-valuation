<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportModel extends Model
{
    use HasFactory;

    protected $table = 'reports';

    protected $fillable = [
        'user_id',
        'city',
        'state',
        'interested',
        'interested_type',
        'document_number_interested_party',
        'purpose',
        'property_owner',
        'owner_document',
        'registration_number',
        'city_hall_license_number',
        'property_description',
        'property_location',
        'total_area',
        'constructed_area',
        'floors_quantity',
        'condition',
        'context',
        'methodology',
        'inspection_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function report()
    {
        return $this->hasMany(ImagesModel::class);
    }

    public function images()
    {
        return $this->hasMany(ImagesModel::class, 'report_id');
    }
}
