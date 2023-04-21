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

    <!-- Custom Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

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
    <main class="p-3 mx-auto bg-white">
        <h2 class="font-semibold text-2xl text-center py-2 mt-3">Current Work</h2>
        <div id="search" class="px-5 pt-4 pb-5 bg-slate-100 mt-2">
            <h2 class="font-semibold text-lg">Search for a Project:</h2>
            <form>
                @csrf
                <div class="form-group">
                    <label for="title">Project Title</label>
                    <input class="form-control" id="title" type="text" name="title" placeholder="Project Title"></input>
                </div>
                <div class="form-group">
                    <label for="date">Start Date</label>
                    <input class="form-control" type="date" name="start_date" id="start_date"></input>
                </div>
                <br>
                <input type="submit" class="rounded-md bg-gray-500 text-white hover:bg-black px-4 py-2 text-sm" value="Search"></input>
            </form>
        </div>

        <div name="projects-table" class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-10">
            <table class="table table-stripped">
                <thead class="thead-light">
                    <th>Project ID</th>
                    <th>Project Title</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Phase</th>
                    <th>Description</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                    <tr>
                        <td>{{$project->id}} </td>
                        <td>{{$project->title}}</td>
                        <td>{{date("d F, Y", strtotime($project->start_date))}}</td>
                        <td>{{date("d F, Y", strtotime($project->end_date))}}</td>
                        <td>{{ucfirst($project->phase)}}</td>
                        <td>{{mb_strimwidth($project->description, 0, 30, "...")}}</td>
                        <td><button onclick="window.location.href='{{route('publicProjects.view', $project)}}';" class="px-4 py-1 text-sm text-gray-600 font-semibold rounded-full border border-gray-600 hover:text-white hover:bg-gray-500 hover:border-transparent focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-offset-2 ">View Project Details</button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </main>
</body>

</html>