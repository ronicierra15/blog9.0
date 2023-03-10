<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class publications extends Model
{
    use HasFactory;
    protected $table = 'post';
    public function users()
    {
        return $this->belongsTo(Users::class, 'id');
    }
}
