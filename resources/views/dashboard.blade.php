<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Your Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 text-gray-900 font-semibold">
                Your Projects
            </div>
            <section name="projects-table" class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <table class="table table-stripped">
                    <thead class="thead-light">
                        <th>Project ID</th>
                        <th>Project Title</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Phase</th>
                        <th>Description</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                        @if ($project->user_id==(auth()->user()->id))
                        <tr>
                            <td>{{$project->id}} </td>
                            <td>{{$project->title}}</td>
                            <td>{{date("d F, Y", strtotime($project->start_date))}}</td>
                            <td>{{date("d F, Y", strtotime($project->end_date))}}</td>
                            <td>{{ucfirst($project->phase)}}</td>
                            <td>{{mb_strimwidth($project->description, 0, 20, "...")}}</td>
                            <td>
                                <x-dropdown>
                                    <x-slot name="trigger">
                                        <button>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                            </svg>
                                        </button>
                                    </x-slot>
                                    <x-slot name="content">
                                        <x-dropdown-link :href="route('projects.view', $project)">
                                            {{ __('View Project') }}
                                        </x-dropdown-link>
                                        <x-dropdown-link :href="route('projects.edit', $project)">
                                            {{ __('Edit') }}
                                        </x-dropdown-link>
                                        <form method="POST" action="{{ route('projects.destroy', $project) }}">
                                            @csrf
                                            @method('delete')
                                            <x-dropdown-link :href="route('projects.destroy', $project)" onclick="event.preventDefault(); this.closest('form').submit();">
                                                {{ __('Delete') }}
                                            </x-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-dropdown>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>



</x-app-layout>