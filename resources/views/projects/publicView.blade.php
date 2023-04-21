<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="sticky fixed p-9">
        <div class="sm:fixed sm:top-0 sm:left-0 p-6 text-left">
            <a href="{{ url('/') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-50"> Home </a>
            <a href="{{ url('/currentwork') }}" class="px-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-50"> Current Work </a>
    
        @if (Route::has('login'))
        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
            @auth
            <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Member Dashboard</a>

            @else
            <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
            @endif
            @endauth
        </div>
        @endif
    </div>
    <main class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-10">
        <h3 class="text-3xl font-semibold py-3">Key Details of Project {{$project->id}}</h3>
        <strong> Project Title: </strong> {{ $project->title}}
           <br>
           <strong> Start Date: </strong> {{date("d F, Y", strtotime($project->start_date))}}
           <br>
           <strong> End Date: </strong> {{date("d F, Y", strtotime($project->end_date))}}
           <br>
           <strong>Current Phase: </strong> {{  ucfirst($project->phase) }}
           <br>
           <strong>Description: </strong> {{ $project->description }}
           <br>
           <br>
           <h3 class="text-2xl font-semibold dark:text-white">User Details:</h3>
           <strong>Name: </strong> {{ $user->name }}
           <br>
           <strong>Email: </strong> <a href="mailto:{{ $user->email}}" class="text-blue-600 visited:text-purple-600 underline" > {{ $user->email }}</a>
    </main>
</body>

</html>