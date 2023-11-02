<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Models\Profession;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProfessionRequest;
use App\Http\Requests\UpdateProfessionRequest;
use App\Http\Resources\ProfessionResource;

class ProfessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ProfessionResource::collection(Profession::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProfessionRequest $request)
    {
        $data = $request->validated();
        $profession = Profession::create($data);
        return ProfessionResource::make($profession);
    }

    /**
     * Display the specified resource.
     */
    public function show(Profession $profession)
    {
        return ProfessionResource::make($profession);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfessionRequest $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profession $profession)
    {
        $profession->delete();
        return response()->noContent(204);
    }
}
