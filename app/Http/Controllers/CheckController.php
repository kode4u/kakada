<?php

namespace App\Http\Controllers;

use App\Models\Check;
use App\Models\CheckTable;
use Illuminate\Http\Request;

class CheckController extends Controller
{
    // public function index(Request $request)
    // {
    //     $query = Check::with(['user', 'category', 'student']);

    //     // Filter by category_id if present
    //     if ($request->has('category_id')) {
    //         $query->where('category_id', $request->input('category_id'));
    //     }

    //     // Filter by correct if specified in the request
    //     if ($request->has('correct')) {
    //         $query->where('correct', $request->input('correct'));
    //     }

    //     // Paginate results
    //     $perPage = $request->input('per_page', 15); // Default to 15 items per page
    //     $currentPage = $request->input('page', 1); // Default to the first page

    //     $checkTables = $query->paginate($perPage, ['*'], 'page', $currentPage);

    //     // Count records with correct=1 and correct=0
    //     $countCorrect = $query->where('correct', 1)->count();
    //     $countIncorrect = $query->where('correct', 0)->count();

    //     return response()->json([
    //         'check_tables' => $checkTables,
    //         'count_correct' => $countCorrect,
    //         'count_incorrect' => $countIncorrect,
    //         'current_page' => $checkTables->currentPage(),
    //         'total_pages' => $checkTables->lastPage(),
    //         'total_items' => $checkTables->total(),
    //     ]);
    // }

    public function index(Request $request)
    {
        $query = Check::with(['user', 'category', 'student']);

        // Filter by category_id if present
        if ($request->has('category_id')) {
            $query->where('category_id', $request->input('category_id'));
        }

        // Filter by correct if specified in the request
        if ($request->has('correct')) {
            $query->where('correct', $request->input('correct'));
        }

        // Clone the query before paginating
        $countQuery = clone $query;

        // Paginate results
        $perPage = $request->input('per_page', 15); // Default to 15 items per page
        $currentPage = $request->input('page', 1); // Default to the first page

        $checkTables = $query->paginate($perPage, ['*'], 'page', $currentPage);

        // Count records with correct=1 and correct=0 using the cloned query
        $countCorrect = $countQuery->where('correct', 1)->count();
        $countIncorrect = $countQuery->count();

        return response()->json([
            'check_tables' => $checkTables,
            'count_correct' => $countCorrect,
            'count_incorrect' => $countIncorrect,
            'current_page' => $checkTables->currentPage(),
            'total_pages' => $checkTables->lastPage(),
            'total_items' => $checkTables->total(),
        ]);
    }



    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
            'student_id' => 'required|exists:students,id',
            'correct' => 'required|integer', // Validate as integer
        ]);

        // Check if the record already exists
        $checkTable = Check::where('user_id', $request->input('user_id'))
            ->where('category_id', $request->input('category_id'))
            ->where('student_id', $request->input('student_id'))
            ->first();

        if ($checkTable) {
            // Update the existing record
            $checkTable->update([
                'correct' => $request->input('correct'),
            ]);
        } else {
            // Create a new record
            $checkTable = Check::create($request->all());
        }

        return response()->json($checkTable, 200);
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
            'correct' => 'required',
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
