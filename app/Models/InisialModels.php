<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InisialModels extends Model
{
    use HasFactory;
    protected $table = "inisial";
    protected $primaryKey = "id_inisial";
    protected $fillable = ['inisial', 'nama'];
}
