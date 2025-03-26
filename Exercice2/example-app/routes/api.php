<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// routes/api.php

use App\Http\Controllers\FileController;



Route::post('/upload', [FileController::class, 'upload']);
Route::get('/files', [FileController::class, 'getFiles']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
