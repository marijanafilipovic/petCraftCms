<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'user_id','old', 'species', 'image','created_at','updated_at'];

    public function users() {
        return $this->belongsTo(User::class);
    }
}
