<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TokenController;
use App\Models\User;
use App\Models\Message;

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
Route::post('/sanctum/token', TokenController::class);

Route::middleware(['auth:sanctum'])->group(function () {
  Route::post('/users/{id}', function ($id) {
    return User::findOrFail($id);
  });
  // store a message
  Route::post('/messages', function(Request $request) {
      $request->validate([
        'message' => 'required|max:255',
      ]);
      $message = new Message;
      $message->message = $request->message;
      $message->user_id = $request->user()->id;
      $message->save();
  });

  // get all messages
  Route::get('/messages', function() {
    return new \Illuminate\Http\JsonResponse(Message::with('user')->get());
  });

  // get all messages from author
  Route::get('/messages/author/{user}', function(Request $request) {
    return $request->user()->messages();
  });
});

