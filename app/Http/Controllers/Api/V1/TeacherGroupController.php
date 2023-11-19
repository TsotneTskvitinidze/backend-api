<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TeacherGroupController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'group_id' => 'required|exists:groups,id',
            'teacher_id' => 'required|exists:teachers,id',
        ]);
        DB::table('teacher_group')->insert($validatedData);
        $message = 'Teacher and Group successfully connected';

        return response()->json(['message' => $message], 201);
    }

    public function destroy( Request $request, $id)
    {
        $data = DB::table('teacher_group')->find($id);
        if($data){
            DB::table('teacher_group')->where('id', $id)->delete();
            return response()->json(['message' => 'Data deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'Data not found'], 404);
        }

    }
}
