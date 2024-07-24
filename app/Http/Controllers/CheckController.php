<?php

namespace App\Http\Controllers;

use App\Models\Check;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CheckController extends Controller
{
    public function index()
    {
        $checks = Check::all();
        return response()->json($checks);
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|integer',
            'category_id' => 'required|integer',
            'user_id' => 'required|integer',
        ]);

        $check = Check::create($request->all());

        return response()->json($check, Response::HTTP_CREATED);
    }

    public function show($id)
    {
        $check = Check::find($id);

        if (!$check) {
            return response()->json(['error' => 'Check not found'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($check);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'student_id' => 'sometimes|required|integer',
            'category_id' => 'sometimes|required|integer',
            'user_id' => 'sometimes|required|integer',
        ]);

        $check = Check::find($id);

        if (!$check) {
            return response()->json(['error' => 'Check not found'], Response::HTTP_NOT_FOUND);
        }

        $check->update($request->all());

        return response()->json($check);
    }

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
