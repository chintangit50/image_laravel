<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageUpload extends Model
{
    use HasFactory;

    protected $table = 'image_uploads';

    protected $fillable = [
        'image',
        'created_at',
        'updated_at'
    ];
}
