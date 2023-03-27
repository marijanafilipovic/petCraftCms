<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pet extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'user_id', 'old', 'species', 'image', 'created_at', 'updated_at'];
    protected $table = 'pets';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
