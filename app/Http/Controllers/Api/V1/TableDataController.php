<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\College;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Group;
use App\Models\Profession;
class TableDataController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return [
            'teachersCount' => Teacher::count(),
            'studentsCount' => Student::count(),
            'groupsCount' => Group::count(),
            'professionsCount' => Profession::count(),
            'collegesCount'=> College::count()
        ];
    }
}
