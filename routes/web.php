<?php

use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;

Route::get('/test', [ChatController::class, 'test']);

// Route::get('/another',[ChatController::class,'broadcast']);


Route::get('/',[ChatController::class,'index']);

Route::get('/LoginForm',[ChatController::class,'login']);

Route::post('/login/check',[ChatController::class,'confirmlogin']);

Route::get('/login/{token}',[ChatController::class,'checkforlogin']);

Route::post('/login/{token}',[ChatController::class,'firstloginwithtoken']);

Route::get('/RegisterForm',[ChatController::class,'register']);

Route::post('/register/store',[ChatController::class,'store']);

Route::get('/Home/{current}',[ChatController::class,'home']);

Route::get('/friends/{current}',[ChatController::class,'displayfriends']);

Route::get('/sendrequest/{sender}/{receiver}',[ChatController::class,'sendrequest']);

Route::get('/Notification/{current}',[ChatController::class,'notification']);

Route::get('/accept/{current}/{receivedfrom}',[ChatController::class,'addtofriends']);

Route::get('/rejectrequest/{current}/{receivedfrom}',[ChatController::class,'rejectrequest']);

Route::get('/userfriends/{current}',[ChatController::class,'displaycurrentfriends']);

Route::get('/removefriend/{current}/{receivedfrom}',[ChatController::class,'removefriends']);

Route::get('/chat/{current}/{with}',[ChatController::class,'startchat']);


Route::post('/test',[ChatController::class,'test']);
Route::post('/ytchat',[ChatController::class,'ytchat']);

Route::post('/broadcast',[ChatController::class,'broadcast']);