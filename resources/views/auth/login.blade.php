@extends('layouts.master')

@php
    $hideNav = true;
@endphp

@section('body')
    <div class="container d-flex justify-content-center align-items-center vh-90">
        <div class="card p-4 shadow" style="max-width: 400px; width: 100%;">
            <!-- Lottie Animation Container -->
            <div id="lottieAnimation" class="text-center mb-4"></div>

            <h3 class="text-center mb-3">Login</h3>

            <!-- Display error messages -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- Login Form -->
            <form method="POST" action="{{ route('login.submit') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter email"
                        required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password"
                        required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var animation = lottie.loadAnimation({
            container: document.getElementById('lottieAnimation'), // The animation container
            renderer: 'svg',
            loop: true,
            autoplay: true,
            path: 'https://assets10.lottiefiles.com/packages/lf20_jcikwtux.json' // URL to the Lottie animation JSON file
        });
    </script>
@endsection
