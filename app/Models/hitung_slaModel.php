<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hitung_slaModel extends Model
{
    use HasFactory;
    protected $table = "hitung_sla";
    protected $primaryKey = "id_sla";
    protected $fillable = ['id_site', 'avaibility', 'hasil_persen', 'maint', 'persen', 'total_jam', 'bulan'];
}
