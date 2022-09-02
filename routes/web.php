<?php

use App\Events\SendMessage;
use BeyondCode\LaravelWebSockets\Apps\AppProvider;
use BeyondCode\LaravelWebSockets\Dashboard\DashboardLogger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Post;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function (AppProvider $appProvider) {
    $posts = Post::latest()->get();
    return view('index', compact("posts"));
});

Route::post("/chat/send", function(Request $request) {
    $message = $request->input("message", null);
    $name = $request->input("name", "Anonymous");
    $time = (new DateTime(now()))->format(DateTime::ATOM);
    if ($name == null) {
        $name = "Anonymous";
    }
    SendMessage::dispatch($name, $message, $time);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

Route::resource('festivals', App\Http\Controllers\FestivalController::class)->middleware('is_admin');

Route::resource("posts", App\Http\Controllers\PostController::class);

Route::resource("comments", App\Http\Controllers\CommentaireController::class);
