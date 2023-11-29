<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'identifier', 'avatar', 'college_id','visible'];
    public function groups()
    {
        return $this->belongsToMany(Group::class,  'group_student');
    }
    public function college()
    {
        return $this->belongsTo(College::class);
    }
}
