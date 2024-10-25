@extends('layouts.master')

@php
    $events = [
        (object) [
            'id' => 1,
            'title' => 'Tech Conference 2024',
            'description' => 'A conference about the latest in tech innovations and startups.',
            'event_date' => '2024-11-01',
            'location' => 'San Francisco, CA',
            'category' => (object) ['name' => 'Conference'],
            'attendees' => collect([(object) ['name' => 'John Doe'], (object) ['name' => 'Jane Smith']]),
        ],
        (object) [
            'id' => 2,
            'title' => 'ReactJS Workshop',
            'description' => 'An intensive workshop on mastering ReactJS and building modern web apps.',
            'event_date' => '2024-12-10',
            'location' => 'New York, NY',
            'category' => (object) ['name' => 'Workshop'],
            'attendees' => collect([(object) ['name' => 'Alex Johnson']]),
        ],
        (object) [
            'id' => 3,
            'title' => 'Business Seminar',
            'description' => 'A seminar focusing on entrepreneurship and scaling businesses.',
            'event_date' => '2024-09-25',
            'location' => 'Chicago, IL',
            'category' => (object) ['name' => 'Seminar'],
            'attendees' => collect([(object) ['name' => 'Emily Davis'], (object) ['name' => 'Michael Brown']]),
        ],

        (object) [
            'id' => 4,
            'title' => 'Tech Conference 2024',
            'description' => 'A conference about the latest in tech innovations and startups.',
            'event_date' => '2024-11-01',
            'location' => 'San Francisco, CA',
            'category' => (object) ['name' => 'Conference'],
            'attendees' => collect([(object) ['name' => 'John Doe'], (object) ['name' => 'Jane Smith']]),
        ],
        (object) [
            'id' => 5,
            'title' => 'ReactJS Workshop',
            'description' => 'An intensive workshop on mastering ReactJS and building modern web apps.',
            'event_date' => '2024-12-10',
            'location' => 'New York, NY',
            'category' => (object) ['name' => 'Workshop'],
            'attendees' => collect([(object) ['name' => 'Alex Johnson']]),
        ],
        (object) [
            'id' => 6,
            'title' => 'Business Seminar',
            'description' => 'A seminar focusing on entrepreneurship and scaling businesses.',
            'event_date' => '2024-09-25',
            'location' => 'Chicago, IL',
            'category' => (object) ['name' => 'Seminar'],
            'attendees' => collect([(object) ['name' => 'Emily Davis'], (object) ['name' => 'Michael Brown']]),
        ],
    ];
@endphp

@section('body')
    <div class="container my-5">
        <!-- Page Title -->
        <div class="text-center mb-5">
            <h1 class="display-4">Upcoming Events</h1>
            <p class="lead text-muted">Browse through all upcoming events and manage them as an admin.</p>
            <a href="{{ route('logout') }}" class="btn btn-primary btn-lg">Admin Logout</a>
        </div>

        <!-- Event Cards Section -->
        <div class="row g-4">
            @foreach ($events as $event)
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <!-- Card Header with Event Title -->
                        <div class="card-body">
                            <h5 class="card-title text-primary">{{ $event->title }}</h5>
                            <p class="card-text text-muted">{{ Str::limit($event->description, 100) }}</p>
                        </div>

                        <!-- Card Footer with Details -->
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Date:</strong>
                                {{ \Carbon\Carbon::parse($event->event_date)->format('M d, Y') }}</li>
                            <li class="list-group-item"><strong>Location:</strong> {{ $event->location }}</li>
                            <li class="list-group-item"><strong>Category:</strong> {{ $event->category->name }}</li>
                            <li class="list-group-item"><strong>Attendees:</strong> {{ $event->attendees->count() }}</li>
                        </ul>

                        <!-- View Details Button -->
                        <div class="card-footer text-center">
                            <a href="#" class="btn btn-outline-info btn-sm">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
