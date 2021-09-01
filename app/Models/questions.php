<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\options;
class questions extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',  
    ];

    protected $table='questions';
    public function options() {
        return $this->hasMany('\App\Models\options');
    }
    public function certif() {
        return $this->belongsTo('\App\Models\certif');
    }
}
