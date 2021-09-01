<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Ptest extends Model
{
    use HasFactory;
    protected $fillable = [
        'score',
    ];

    protected $table='ptests';
    public function cer() {
        return $this->belongsTo('\App\Models\certif','certif_id');
    }
    public function puser() {
        return $this->belongsTo('\App\Models\User', 'user_id');
    }
}
