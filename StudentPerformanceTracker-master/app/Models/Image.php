<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = 'images';
    protected $fillable = [
        'name',
        'certificate_id'
    ];

    public function certificate(){
        return $this->belongsTo(Certificate::class,'certificate_id');
    }
}
