<?php

use App\Http\Controllers\Api\LeadController;
use App\Http\Controllers\API\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/projects/{slug}', [ProjectController::class, 'show']);
Route::get('/latest_projects', [ProjectController::class, 'latest']);

Route::post('/contacts', [LeadController::class, 'store']);

// Download Route
Route::get('/download/{filename}', function ($filename) {
    // dd($filename);
    if (Storage::exists('file/'.$filename)) {
        return response()->download("storage/file/$filename", $filename);
    } else {
        // dd(__DIR__);
        exit('Requested file does not exist on our server!');
    }
})->where('filename', '[A-Za-z0-9\-\_\.]+');
