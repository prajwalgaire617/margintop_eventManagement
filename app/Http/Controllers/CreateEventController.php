<?php

namespace App\Http\Controllers;

use App\Models\AttendeeModel;
use App\Models\CategoryModel;
use App\Models\EventModel;
use Illuminate\Http\Request;
use Auth;

class CreateEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $event_categories = CategoryModel::all();
        $event = EventModel::all();

        return view('pages.events.index', compact('event_categories', 'event'));
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
        $validate = $request->validate([
            'event_title' => 'required',  // Specify table and column name
            'event_description' => 'required',  // Specify table and column name
            'event_date' => 'required',  // Specify table and column name
            'event_location' => 'required',  // Specify table and column name
            'event_category' => 'required',  // Specify table and column name
        ]);

        try {
            EventModel::create([
                'title' => $validate['event_title'],
                'description' => $validate['event_description'],
                'date' => $validate['event_date'],
                'location' => $validate['event_location'],
                'category_id' => $validate['event_category']
            ]);

            return redirect()->route('events.index')->with('success', 'event created successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors([
                'title' => 'title cannot be empty',
                'description' => 'description cannot be empty',
                'date' => 'date field cannot be empty',
                'location' => 'location field cannot be empty',
                'category_id' => 'please select atleast one category',
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = EventModel::with(['category', 'attendees'])->findOrFail($id);
        return view('pages.events.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //

        $event_data = EventModel::with(['category', 'attendees'])->findOrFail($id);
        $categories = CategoryModel::all();

        return view('pages.events.edit', compact('event_data', 'categories'));
    }

    /** Update the specified resource in storage. */
    //

    public function update(Request $request, $id)
    {
        $event = EventModel::findOrFail($id);

        $request->validate([
            'event_title' => 'required|string|max:255',
            'event_description' => 'nullable|string',
            'event_date' => 'required|date',
            'event_location' => 'required|string|max:255',
            'event_category' => 'required|exists:category_models,id',  // Assuming categories table exists
        ]);

        $event->title = $request->input('event_title');
        $event->description = $request->input('event_description');
        $event->date = $request->input('event_date');
        $event->location = $request->input('event_location');
        $event->category_id = $request->input('event_category');

        $event->save();

        return redirect()->route('events.index')->with('success', 'Event updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $event = EventModel::find($id);

        $event->delete();
        return redirect()->back()->with('success', 'Event deleted successfully.');
    }
}
