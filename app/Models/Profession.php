<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'identifier'];
    public function colleges()
    {
        return $this->belongsToMany(College::class);
    }
}
