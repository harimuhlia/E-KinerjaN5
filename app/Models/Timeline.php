<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timeline extends Model
{
    use HasFactory;
    protected $table = "timelines";
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'judul', 'deskripsi', 'gambar'
    ];
}
