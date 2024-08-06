<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoltempModel extends Model
{
    use HasFactory;

    protected $table = "soltemp";
    protected $primaryKey = "id_soltemp";
    protected $fillable = ['id_soltemp', 'nama_soltemp', 'nojar_soltemp', 'pelanggan_soltemp', 'nomor_soltemp', 'status', 'updated_at'];
}
