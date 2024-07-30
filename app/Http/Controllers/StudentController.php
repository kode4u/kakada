<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Support\Facades\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return response()->json([
            'items' => Student::query()
                ->when(Request::input('search'), function ($query, $search) {
                    $query->Where('candid', '=', $search )
                    ->OrWhere('letternumber', '=', $search)
                    ->Orwhere('name', 'like', "%" . $search . "%");
                })->distinct()->paginate(50)
                ->withQueryString(),
            'filters' => Request::only(['search'])
        ]);


        $search = $request->input('search');
        $query = Student::query();

        // Check if search term is numeric
        if (is_numeric(Request::input('search'))) {
            return response()->json([
                'items' => Student::query()
                    ->when(Request::input('search'), function ($query, $search) {
                        $query->Where('candid', '=', $search )
                        ->OrWhere('letternumber', '=', $search);
                    })->distinct()->paginate(50)
                    ->withQueryString(),
                'filters' => Request::only(['search'])
            ]);
        } else {
            return response()->json([
                'items' => Student::query()
                    ->when(Request::input('search'), function ($query, $search) {
                        $query->where('name', 'like', "%" . $search . "%");
                    })->distinct()->paginate(50)
                    ->withQueryString(),
                'filters' => Request::only(['search'])
            ]);
        }


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
