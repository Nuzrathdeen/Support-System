<?php

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\TicketsController;

// Example of a GET route with middleware
// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// Grouping API routes with a version prefix
Route::group([
    'prefix' => 'v1',
], function() {
    // Using the fully qualified class name for the controller
    Route::post('/tickets', [App\Http\Controllers\API\V1\TicketController::class, 'store']);
    Route::get('/tickets',[App\Http\Controllers\API\V1\TicketController::class,'index']);
    Route::put('/tickets/{id}/status', [App\Http\Controllers\API\V1\TicketController::class, 'updateStatus']);
    Route::post('/tickets/{id}/comment', [App\Http\Controllers\API\V1\TicketController::class, 'addComment']);
    Route::put('/tickets/{id}/assign', [App\Http\Controllers\API\V1\TicketController::class, 'assignToAgent']);
});

