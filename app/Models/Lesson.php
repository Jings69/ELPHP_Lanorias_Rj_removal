<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'copies',
        'price',
    ];

    public function teacher() {
        return $this->belongsTo(Teacher::class);
    }
}
