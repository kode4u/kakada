<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Check; // Assuming you have a model named Check
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CheckController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $checks = Check::all();
        return response()->json($checks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'correct' => 'required|integer',
            'student_id' => 'required|integer',
            'user_id' => 'required|integer',
            'category_id' => 'required|integer',
        ]);

        $check = Check::create($request->all());

        return response()->json($check, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $check = Check::find($id);

        if (!$check) {
            return response()->json(['error' => 'Check not found'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($check);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'correct' => 'sometimes|required|integer',
            'student_id' => 'sometimes|required|integer',
            'user_id' => 'sometimes|required|integer',
            'category_id' => 'sometimes|required|integer',
        ]);

        $check = Check::find($id);

        if (!$check) {
            return response()->json(['error' => 'Check not found'], Response::HTTP_NOT_FOUND);
        }

        $check->update($request->all());

        return response()->json($check);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $check = Check::find($id);

        if (!$check) {
            return response()->json(['error' => 'Check not found'], Response::HTTP_NOT_FOUND);
        }

        $check->delete();

        return response()->json(['message' => 'Check deleted successfully']);
    }
}
