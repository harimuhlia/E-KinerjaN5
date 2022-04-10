<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skputama extends Model
{
    use HasFactory;
    protected $table = "skputamas";
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'tupoksi', 'jml_output', 'file_output', 'jml_waktu', 'jenis_waktu',
    ];
}
