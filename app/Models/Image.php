<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

protected $fillable = [
    'image',
    'pet_id',
];
public function pets() {
    return$this->belongsTo(Pet::class);
}
}
