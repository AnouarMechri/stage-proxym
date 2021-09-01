<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\question;

class certif extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'questions_id',
        'status',
        'phone',
        'value_status',
        'user_id',
        'deleted_at',
        
    ];


    protected $table='certifs';
    public function questions() {
        return $this->hasMany('\App\Models\questions');
    }
    public function test() {
        return $this->hasMany('\App\Models\Ptest');
    }
    
    public function user() {
        return $this->belongsTo('\App\Models\User');
    }

}
