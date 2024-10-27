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
                            <button class="{{ 'btn btn-primary btn-sm' }}" onclick="showForm('form3')">Event</button>
                        </div>

                        <div id="form3" class="form-container">
                            <form action="{{ route('events.update', $event_data->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label class="form-label">Event title</label>
                                    <input type="text" class="form-control" name="event_title"
                                        value="{{ $event_data->title }}" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Description</label>
                                    <textarea name="event_description" class="form-control" placeholder="Describe about the events" id="floatingTextarea"
                                        cols="30" rows="10">{{ $event_data->description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Date</label>
                                    <input type="date" class="form-control" value="{{ $event_data->date }}"
                                        name="event_date" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Location</label>
                                    <input type="text" class="form-control" value="{{ $event_data->location }}"
                                        name="event_location" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Category</label>

                                    <select class="form-control" name="event_category" required>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $category->id == $event_data->category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success w-100">Post</button>
                            </form>
                        </div>

                        <div id="form1" class="form-container">
                            <form action="{{ route('category.update', $event_data->category_id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" id="newsletter" name="category_name"
                                        value="{{ $event_data->category->name }}">
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
