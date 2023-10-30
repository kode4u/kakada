<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use DB;
use Request;
use Inertia\Inertia;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Teacher', [
            'items' => Teacher::query()
                ->when(Request::input('search'), function ($query, $search) {
                    $query->where('name', 'like', '%' . $search . '%')
                        ->OrWhere('gender', 'like', '%' . $search . '%');
                })->paginate(6)
                ->withQueryString(),
            'filters' => Request::only(['search'])
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
