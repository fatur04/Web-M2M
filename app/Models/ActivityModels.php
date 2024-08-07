<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityModels extends Model
{
    use HasFactory;
    protected $table = "logactivity";
    protected $primaryKey = "id_log";
    protected $fillable = ['nama', 'initial', 'cluster', 'start','end', 'activity', 'updated_at'];
}
