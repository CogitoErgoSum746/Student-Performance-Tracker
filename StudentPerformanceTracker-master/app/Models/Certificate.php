<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $table = 'certificates';
    protected $primaryKey = 'id';
    protected $fillable = [
        'domain',
        'tier',
        'approved',
        'student_id'
    ];

    public function image(){
        return $this->hasOne(Image::class,'certificate_id');
    }

    public function student(){
        return $this->belongsTo(Student::class,'student_id');
    }
}
