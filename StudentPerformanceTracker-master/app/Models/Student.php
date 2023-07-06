<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'division',
        'user_id',
        'roll_number'
    ];

    public function period(){
        return $this->belongsToMany(period::class,'attendances','student_id','period_id')
                                    ->withTimestamps()
                                    ->withPivot(['subject', 'attendance_status'])
                                    ->using(Attendance::class);
    }

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function certificate(){
        return $this->hasmany(Certificate::class,'student_id');
    }

    public function marks() 
    {
        return $this->hasOne(Marks::class,'student_id');
    }
}
