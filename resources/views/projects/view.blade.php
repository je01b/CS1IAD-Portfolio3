<x-app-layout>

    <head>
        <title>View Project</title>
    </head>

    <body>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Project {{ $project->id }} - {{ $project->title }}
            </h2>
        </x-slot>
        <div id="content" class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-10">
            <h3 class="text-2xl font-semibold dark:text-white">Key Details:</h3>
            <br>
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
           <h3 class="text-2xl font-semibold dark:text-white">Assigned User Details:</h3>
           <strong>User ID: </strong> {{ $project->user_id }}
           <br>
           <strong>Name: </strong> {{ $user->name }}
           <br>
           <strong>Email: </strong> <a href="mailto:{{ $user->email}}" class="text-blue-600 visited:text-purple-600 underline" > {{ $user->email }}</a>
        </div>
    </body>
</x-app-layout>