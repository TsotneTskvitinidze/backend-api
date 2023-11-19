<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Teacher extends Model
{
    use HasFactory;
    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'avatar', 'visible'];
    public function groups()
    {
        return $this->belongsToMany(Group::class,  'teacher_group');
    }
    public function colleges()
    {
        return $this->belongsToMany(College::class);
    }
}
