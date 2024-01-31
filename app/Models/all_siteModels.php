<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class all_siteModels extends Model
{
    use HasFactory;
    protected $table = "all_site";
    protected $fillable = [
        'site'
    ];
}
