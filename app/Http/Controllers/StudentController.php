<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

    // Log the search term
    Log::info("Search Term: " . $search);

    $query = Student::query()
        ->when($search, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('candid', '=', $search)
                      ->orWhere('letternumber', '=', $search)
                      ->orWhere('name', 'like', '%' . $search . '%');
            });
        });

    // Log the raw SQL query for debugging
    Log::info("SQL Query: " . $query->toSql(), $query->getBindings());

    $students = $query->distinct()->paginate(50)->withQueryString();

    return response()->json([
        'items' => $students,
        'filters' => $request->only(['search'])
    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
