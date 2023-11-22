<?php

namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Group;
use App\Models\Profession;
use App\Models\College;
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
