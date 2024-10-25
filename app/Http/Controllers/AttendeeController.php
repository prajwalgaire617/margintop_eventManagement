<?php

namespace App\Http\Controllers;

use App\Models\AttendeeModel;
use Illuminate\Http\Request;
use Auth;

class AttendeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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

        $validate = $request->validate([
            'email' => 'required',  // Specify table and column name
            'event_category' => 'required',  // Specify table and column name
        ]);

        try {
            AttendeeModel::create([
                'name' => Auth::user()->name,
                'email' => $validate['email'],
                'event_id' => $validate['event_category'],
            ]);

            return redirect()->route('events.index')->with('success', 'successfully registered!');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors([
                'name' => 'name cannot be empty',
                'email' => 'email field cannot be empty',
            ]);
        }
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
