<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'division',
        'teacher_id'
    ];

    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }

    // public function student($div){
    //     return Student::class->where('division', '=',$div);
    // }

    public function student(){
        return $this->belongsToMany(Student::class,'attendances','period_id','student_id')
                                    ->withTimestamps()
                                    ->withPivot(['subject', 'attendance_status'])
                                    ->using(Attendance::class);
    }
}
