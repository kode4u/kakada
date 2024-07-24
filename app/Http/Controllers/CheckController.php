<?php

namespace App\Http\Controllers;

use App\Models\Check;
use App\Models\CheckTable;
use Illuminate\Http\Request;

class CheckController extends Controller
{
    public function index(Request $request)
    {
        $query = Check::with(['user', 'category', 'student']);

        if ($request->has('category_id')) {
            $query->where('category_id', $request->input('category_id'));
        }

        $checkTables = $query->get();
        return response()->json($checkTables);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
            'student_id' => 'required|exists:students,id',
            'correct' => 'required|boolean',
        ]);

        $checkTable = Check::create($request->all());

        return response()->json($checkTable, 201);
    }

    public function show($id)
    {
        $checkTable = Check::with(['user', 'category', 'student'])->findOrFail($id);
        return response()->json($checkTable);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
            'student_id' => 'required|exists:students,id',
            'correct' => 'required|boolean',
        ]);

        $checkTable = Check::findOrFail($id);
        $checkTable->update($request->all());

        return response()->json($checkTable);
    }

    public function destroy($id)
    {
        $checkTable = Check::findOrFail($id);
        $checkTable->delete();

        return response()->json(null, 204);
    }
}
