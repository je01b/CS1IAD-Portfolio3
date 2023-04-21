<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;
use App\Models\Project;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Public Routes

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('currentwork', function(){

    $title = request('title');
    $date = request('start_date');

    if (request('start_date')) {
        $projects = Project::where('title', '=', $title)
        ->where('start_date' , '=', $date)
        ->get();
    } else {
        $projects = Project::all();
    }

    return view('publicProjects')->with('projects', $projects);
})->name('publicProjects');

Route::get('currentwork/view/{id}', 'App\Http\Controllers\ProjectController@publicView')->name('publicProjects.view');


// Member Dashboard
Route::get('/dashboard', function () {
    return view('dashboard', [
        'projects' => Project::with('user')->orderBy('id')->get(),
    ]);
})->middleware('auth')->name('dashboard');


//  Profile/User Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// Project Routes
Route::resource('projects', ProjectController::class)
    ->only(['index', 'store', 'edit', 'update', 'destroy', 'create'])
    ->middleware('auth');

Route::get('projects/{id}/view', 'App\Http\Controllers\ProjectController@view')->middleware('auth')->name('projects.view');


