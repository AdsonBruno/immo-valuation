<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagesModel extends Model
{
    use HasFactory;

    protected $table = 'report_images';

    protected $fillable = [
        'report_id',
        'image_path',
        'description'
    ];

    public function report()
    {
        return $this->belongsTo(ReportModel::class);
    }
}
