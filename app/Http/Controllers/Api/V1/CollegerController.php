<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\College;
use App\Http\Requests\StoreCollegeRequest;
use App\Http\Requests\UpdateCollegeRequest;
use App\Http\Resources\CollegeResource;
class CollegerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CollegeResource::collection(College::all());

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCollegeRequest $request)
    {
        $data = $request->validated();
        $college = College::create($data);
        return CollegeResource::make($college);
    }

    /**
     * Display the specified resource.
     */
    public function show(College $college)
    {
        return CollegeResource::make($college);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCollegeRequest $request, College $college)
    {
        // $college -> update()
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(College $college)
    {
        $college -> delete();
        return response()->noContent(204);
    }
}
