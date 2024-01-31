<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SLAModel extends Model
{
    use HasFactory;
    protected $table = "sla";
    protected $primaryKey = "id";
    protected $fillable = ['nama_site', 'tiket', 'problem', 'status', 'mulai', 'akhir'];
    #protected $appends = ['status_label'];
}
