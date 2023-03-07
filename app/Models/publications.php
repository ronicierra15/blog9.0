<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class publications extends Model
{
    use HasFactory;
    protected $table = 'post';
    protected $primaryKey = 'post-id';
    public function blog()
    {
        return $this->belongsTo(blog::class, 'usuario-id');
    }
}
