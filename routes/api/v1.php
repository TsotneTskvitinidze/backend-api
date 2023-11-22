<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\CollegerController;
use App\Http\Controllers\Api\V1\TeacherController;
use App\Http\Controllers\Api\V1\StudentController;
use App\Http\Controllers\Api\V1\GroupController;
use App\Http\Controllers\Api\V1\ModuleController;
use App\Http\Controllers\Api\V1\ProfessionController;
use App\Http\Controllers\Api\V1\TeacherGroupController;
use App\Http\Controllers\Api\V1\TableDataController;
Route::prefix('v1') -> group(function () {
    Route::apiResources([
        'colleges' =>    CollegerController::class,
        'teachers' =>    TeacherController::class,
        'students' =>    StudentController::class,
        'groups' =>      GroupController::class,
        'modules' =>     ModuleController::class,
        'professions' => ProfessionController::class,
    ]);
    Route::post('/store_teacher', [TeacherController::class, 'storeTeacher']);
    /* add or remove teacher-group connection*/
    Route::post('/teacher-group', [TeacherGroupController::class, 'store']);
    Route::delete('/teacher-group/:id', [TeacherGroupController::class, 'destroy']);
    Route::get('/tables-data', TableDataController::class);
});

