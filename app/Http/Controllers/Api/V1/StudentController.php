<?php

namespace App\Http\Controllers\Api\V1;
use Ramsey\Uuid\Uuid;
use App\Http\Controllers\Controller;
use App\Models\Profession;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Http\Resources\StudentResource;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return StudentResource::collection(Student::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        $data = $request->validated();
        $avatarName = join('.', [Uuid::uuid4(), $data['avatar']->extension()]);
        $uploadPath = 'images/students';
        $data['avatar']->move(public_path($uploadPath), $avatarName);
        $storeData = [
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'identifier' => $data['identifier'],
            'avatar' => $avatarName
        ];
        $student = Student::create($storeData);
        return StudentResource::make($student);
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return StudentResource::make($student);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        // $student -> update()
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return response()->noContent(204);
    }
}
