<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Project {{ $project->id }}
        </h2>
    </x-slot>
    <div id="content" class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-10">
        <form method="POST" action="{{ route('projects.update', $project) }}">
            @csrf
            {{ method_field('PATCH') }}
            <div class="form-group">
                <label for="title">Title</label>
                <input class="form-control" id="title" type="text" name="title" value="{{ old('title', $project->title) }}"> </input>
            </div>
            <br>
            <div class="form-group">
                <label for="startdate">Start Date</label>
                <input type="date" class="form-control" id="startdate" name="startdate" value="{{ old('start_date', $project->start_date) }}"> </input>
            </div>
            <br>
            <div class="form-group">
                <label for="enddate">End Date</label>
                <input type="date" class="form-control" id="enddate" name="enddate" value="{{ old('end_date', $project->end_date) }}"> </input>
            </div>
            <br>
            <div class="form-group">
                <label for="phase">Phase</label>
                <select id="phase" class="form-control" name="phase">
                    <option value="design">Design</option>
                    <option value="development">Development</option>
                    <option value="testing">Testing</option>
                    <option value="deployment">Deployment</option>
                </select>
            </div>
            <br>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="5" cols="50">{{ old('description', $project->description) }}</textarea>
            </div>
            <br>
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
            <div class="mt-4 space-x-2">
                <x-primary-button>{{ __('Save') }}</x-primary-button>
                <a href="{{ route('dashboard') }}">{{ __('Cancel') }}</a>
            </div>
        </form>
    </div>

</x-app-layout>