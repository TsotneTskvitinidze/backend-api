<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $fillable = ['college_id', 'profession_id', 'number'];
    public function profession()
    {
        return $this->belongsTo(Profession::class);
    }
    public function college()
    {
        return $this->belongsTo(College::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'group_student');
    }
}
