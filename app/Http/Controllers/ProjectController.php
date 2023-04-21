<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;
use Illuminate\View\View;
use App\Models\Project;
use App\Models\User;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('projects.index', array('projects' => Project::all()));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projects.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:100',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'description' => 'required|string|max:500'
        ]);

        $request->user()->projects()->create($validated);

        return redirect(route('dashboard'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Project::find($id);
        return view('project', array('project' => $project));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project): View
    {
        $this->authorize('update', $project);

        return view('projects.edit', [
            'project' => $project,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project): RedirectResponse
    {
        $this->authorize('update', $project);

        $validated = $request->validate([
            'title' => 'string|max:100',
            'start_date' => 'date',
            'end_date' => 'date',
            'phase' => '',
            'description' => 'string|max:500'
            
        ]);

        $project->update($validated);

        return redirect(route('dashboard'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $this->authorize('delete', $project);

        $project->delete();

        return redirect(route('dashboard'));
    }

    public function view(string $id): View
    {
        $project = Project::find($id);
        $user = User::find($project->user_id);
        return view('projects.view', [
            'project' => $project, 'user' => $user
        ]);
    }

    public function publicView(string $id): View 
    {
        $project=Project::find($id);
        $user = User::find($project->user_id);
        return view('projects.publicView', ['project' => $project, 'user' => $user]);
    }
}
