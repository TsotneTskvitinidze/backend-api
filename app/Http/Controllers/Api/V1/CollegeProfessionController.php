<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CollegeProfessionController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'college_id' => 'required|exists:colleges,id',
            'profession_id' => 'required|exists:professions,id',
        ]);
        DB::table('college_profession')->insert($validatedData);
        $message = 'Teacher and Group successfully connected';

        return response()->json(['message' => $message], 201);
    }

    public function destroy( Request $request, $id)
    {
        $data = DB::table('college_profession')->find($id);
        if($data){
            DB::table('college_profession')->where('id', $id)->delete();
            return response()->json(['message' => 'Relation deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'Record not found'], 404);
        }

    }
}
