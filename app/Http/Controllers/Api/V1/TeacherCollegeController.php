<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeacherCollegeController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'college_id' => 'required|exists:colleges,id',
            'teacher_id' => 'required|exists:teachers,id',
        ]);
        DB::table('college_teacher')->insert($validatedData);
        $message = 'Teacher and College successfully connected';

        return response()->json(['message' => $message], 201);
    }

    public function destroy( Request $request, $id)
    {
        $data = DB::table('college_teacher')->find($id);
        if($data){
            DB::table('college_teacher')->where('id', $id)->delete();
            return response()->json(['message' => 'Relation deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'Record not found'], 404);
        }

    }
}
