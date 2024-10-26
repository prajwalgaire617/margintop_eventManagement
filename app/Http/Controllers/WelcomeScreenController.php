<?php

namespace App\Http\Controllers;

use App\Models\AttendeeModel;
use App\Models\CategoryModel;
use App\Models\EventModel;
use Illuminate\Http\Request;

class WelcomeScreenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $allEvents = EventModel::all();
        $eventData = [];
        foreach ($allEvents as $key => $value) {
            $category_name = CategoryModel::find($value['category_id'])->name;
            $attendee = AttendeeModel::where('event_id', $value['id'])->count();
            $data = [
                'id' => $value['id'],
                'title' => $value['title'],
                'description' => $value['description'],
                'date' => $value['date'],
                'location' => $value['location'],
                'category' => $category_name,
                'attendee' => $attendee,
            ];
            array_push($eventData, $data);
        }
        return view('pages.welcome.index', compact('eventData'));
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
