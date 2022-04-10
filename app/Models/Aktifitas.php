<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aktifitas extends Model
{
    use HasFactory;
    protected $table = "aktifitas";
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'aktifitas', 'keterangan', 
    ];
}
