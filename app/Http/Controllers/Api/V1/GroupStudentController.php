<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupStudentController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'group_id' => 'required|exists:groups,id',
            'student_id' => 'required|exists:students,id',
        ]);
        DB::table('group_student')->insert($validatedData);
        $message = 'Group and Student successfully connected';

        return response()->json(['message' => $message], 201);
    }

    public function destroy( Request $request, $id)
    {
        $data = DB::table('group_student')->find($id);
        if($data){
            DB::table('group_student')->where('id', $id)->delete();
            return response()->json(['message' => 'Relation deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'Record not found'], 404);
        }

    }
}
