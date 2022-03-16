<?php

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
    return redirect('https://boroafterprom.com');
});

Route::get('/tickets', function () {
    return view('tickets');
});

Route::get('/tickets/success', function (Request $request) {
    $orderId = $request->get('orderId');

    $student = Student::with('guest')->where('id', 'like', $orderId.'-%')->firstOrFail();


    return view('tickets.success', ['student' => $student]);
})->name('tickets.success');

Route::get('/tickets/pickup', function () {
    return view('ticket_pickup');
});
