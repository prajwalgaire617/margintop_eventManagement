@extends('layouts.master')

@section('body')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <!-- Event Card -->
                <div class="card shadow-lg">
                    <!-- Event Banner Image -->
                    <img src="https://img.freepik.com/free-photo/corporate-businessman-giving-presentation-large-audience_53876-101865.jpg?t=st=1729882793~exp=1729886393~hmac=11b91217e0760ae164250b53f2ff695a660643bb0717ab3fdf30f8ed735640ad&w=1060"
                        class="card-img-top" alt="Event Banner">

                    <div class="card-body">
                        <!-- Event Title and Description -->
                        <div class="d-flex align-items-center mb-3">
                            <img src="https://img.freepik.com/free-vector/culture-logo-design-template_23-2149884164.jpg?t=st=1729883002~exp=1729886602~hmac=b83a1a653926499d62050dd363d8b781f8648eb2180f09acfabe4f540957bdbf&w=740"
                                alt="Event Icon" class="rounded-circle mr-3" style="width: 60px; height: 60px;">
                            <div>
                                <h2 class="card-title text-primary">{{ $data->title }}</h2>
                                <p class="card-text text-muted">{{ $data->description }}</p>
                            </div>
                        </div>

                        <!-- Event Details -->
                        <div class="mb-4">
                            <strong class="d-block mb-2"><i class="fas fa-calendar-alt text-info"></i>
                                Date:</strong>
                            {{ \Carbon\Carbon::parse($data->date)->format('M d, Y') }}</li>
                            <strong class="d-block mb-2"><i class="fas fa-map-marker-alt text-danger"></i>
                                Location:</strong> {{ $data->location }}
                            <strong class="d-block mb-2"><i class="fas fa-tags text-warning"></i>Event type</strong>
                            {{ $data->category->name }}
                            <strong class="d-block mb-2"><i class="fas fa-users text-success"></i> Attendees:</strong>
                            {{ is_null($data->attendees) ? 'N/A' : $data->attendees->count() }}
                        </div>

                        <!-- Call to Action Buttons -->
                        <div class="d-flex justify-content-between">
                            @if (Auth::user()->isAdmin)
                                <a href="{{ route('events.edit', $data->id) }}" class="btn btn-primary">
                                    <i class="fas fa-edit"></i> Edit Event
                                </a>
                            @endif
                            <a href="#" class="btn btn-primary">
                                <i class="fas fa-edit"></i> Register
                            </a>
                            <a href="#" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Back to Events
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
