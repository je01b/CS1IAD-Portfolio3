<head>

</head>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create a New Project
        </h2>
    </x-slot>
    <div id="content" class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-10">
        <form method="POST" action="{{ route('projects.store') }}">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input class="form-control" type="text" name="title" placeholder="Title"> </input>
            </div>
            <br>
            <div class="form-group">
                <label for="start_date">Start Date</label>
                <input class="form-control" type="date" name="start_date"> </input>
            </div>
            <br>
            <div class="form-group">
                <label for="end_date">End Date</label>
                <input class="form-control" type="date" name="end_date"> </input>
            </div>
            <br>
            <div class="form-group">
                <label for="phase">Phase</label>
                <input type="text" readonly class="form-control-plaintext" id="phase" name="phase" value="Design">
                <small id="phaseHelpBlock" class="form-text text-muted">
                    Phase set to "Design" by default. This can be changed after creation.
                </small>
            </div>
            <br>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" rows="5" cols="30" placeholder="Description"></textarea>
            </div>
            <br>
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
            <div class="mt-4 space-x-2">
                <x-primary-button>{{ __('Create') }}</x-primary-button>
                <a href="{{ route('dashboard') }}">{{ __('Cancel') }}</a>
            </div>

        </form>
    </div>



</x-app-layout>