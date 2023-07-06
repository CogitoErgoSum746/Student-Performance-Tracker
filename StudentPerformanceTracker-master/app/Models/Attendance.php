<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Attendance extends Pivot
{
    protected $table = 'attendances';

    protected $fillable = [
        'subject',
        'student_id',
        'period_id',
        'attendance_date',
        'attendance-status'
    ];
    
    public function subjects(){
        return $this->belongsTo(Subject::class,'subject');
    }

    public function students(){
        return $this->belongsTo(Student::class,'attendances');
    }

    // public function periods(){
    //     return $this->belongsTo(Period::class,'attendances');
    // }
}
