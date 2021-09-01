<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class options extends Model
{  protected $fillable = [
    'title', 
    'o_status' ,
];
    use HasFactory;
    protected $table='options';
    public function question() {
        return $this->belongsTo('\App\Models\questions');
    }
}
