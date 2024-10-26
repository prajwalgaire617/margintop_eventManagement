@extends('layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('body')
    <div class="container py-5">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <!-- Display Error Messages -->
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center mb-4">Multi-Step Form</h3>

                        <div class="button-container">
                            <button class="btn btn-primary" onclick="showForm('form1')">Category</button>
                            <button class="{{ $event != null ? 'btn btn-primary ' : 'btn btn-primary btn-sm disabled' }}"
                                onclick="showForm('form2')">Attendee</button>
                            <button
                                class="{{ $event_categories != null ? 'btn btn-primary btn-sm' : 'btn btn-primary btn-sm disabled' }}"
                                onclick="showForm('form3')">Event</button>
                        </div>

                        <div id="form3" class="form-container">
                            <form action="{{ route('events.store') }}" method="POST">
                                @csrf
                                @method('POST')
                                <div class="form-group">
                                    <label class="form-label">Event title</label>
                                    <input type="text" class="form-control" name="event_title" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Description</label>
                                    <textarea name="event_description" class="form-control" placeholder="Describe about the events" id="floatingTextarea"
                                        cols="30" rows="10"></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Date</label>
                                    <input type="date" class="form-control" name="event_date" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Location</label>
                                    <input type="text" class="form-control" name="event_location" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Category</label>

                                    <select class="form-control" name="event_category" required>
                                        <option value="">Select Category</option>
                                        @foreach ($event_categories as $values)
                                            <option value="{{ $values['id'] }}">{{ $values['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success w-100">Post</button>
                            </form>
                        </div>

                        <div id="form2" class="form-container">
                            <form action="{{ route('attendee.store') }}" method="POST">
                                @csrf
                                @method('POST')
                                <div class="form-group">
                                    <label class="form-label">Email Address</label>
                                    <input type="email" class="form-control" name="email" required>
                                </div>

                                <div class="form-group">
                                    <select class="form-control" name="event_category" required>
                                        <option value="">Select Event</option>
                                        @foreach ($event as $values)
                                            <option value="{{ $values['id'] }}">{{ $values['title'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success w-100">Submit Contact Details</button>
                            </form>
                        </div>

                        <div id="form1" class="form-container">
                            <form action="{{ route('category.store') }}" method="POST">
                                @csrf
                                @method('POST')
                                <div class="form-group">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" id="newsletter" name="category_name">
                                </div>
                                <button type="submit" class="btn btn-success w-100">Submit Additional Info</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('/js/index.js') }}"></script>
@endsection
