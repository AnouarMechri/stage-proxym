<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    protected $fillable = [
        'certif_id',
        'option_id',
        'user_id',
        
    ];
    protected $table='answers';

    public function setOpAttribute($value)
    {
        $this->attributes['option_id'] = json_encode($value);
    }
    public function getOpAttribute($value)
    {
        return $this->attributes['option_id'] = json_decode($value);
    }

    public function op() {
        return $this->hasMany('\App\Models\options');
    }
    public function user() {
        return $this->belongsTo('\App\Models\User');
    }
    public function certif() {
        return $this->belongsTo('\App\Models\certif' ,'certif_id');
    }
}
