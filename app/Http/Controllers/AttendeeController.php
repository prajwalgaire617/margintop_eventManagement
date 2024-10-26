<?php

namespace App\Http\Controllers;

use App\Models\AttendeeModel;
use App\Rules\UniqueRegistration;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
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
        // Validate input data
        $request->validate([
            'email' => 'required|email',
            'event_id' => ['required', 'exists:attendee_models,event_id', new UniqueRegistration($request->event_id)],
        ]);

        try {
            // Create new attendee record
            AttendeeModel::create([
                'name' => Auth::user()->name,
                'email' => Auth::user()->email,
                'event_id' => $request->event_id,
            ]);

            return redirect()->route('home.index')->with('success', 'Successfully registered!');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['error' => $th->getMessage()]);
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
