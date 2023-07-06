<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id'
    ];

    public function period(){
        return $this->hasMany(Period::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
