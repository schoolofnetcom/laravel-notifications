<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/notify', function () {
    $users = App\User::all();
    $message = filter_input(\INPUT_GET, 'm');
    //$runIn = now()->addSeconds(30);
    //\Notification::send($users, (new App\Notifications\TextNotification($message))->delay($runIn));
    \Notification::send($users, (new App\Notifications\TextNotification($message)));
    return 'Notificados';
})->middleware('auth');

Route::get('/me', function () {
    $user = Auth::user();

    return view('notifications', compact('user'));
})->middleware('auth');

Route::get('/readed/{id}', function ($id) {
    $user = Auth::user();

    $user->notifications->find($id)->markAsRead();

    return redirect('/me');
})->middleware('auth');

Route::get('/contact', function () {
    \Notification::route('mail', 'qwe@ewq.com')
        ->route('nexmo', '5511900000000')
        ->notify(new App\Notifications\TextNotification('qwejasuhdasud'));

    return 'Notificados';
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
