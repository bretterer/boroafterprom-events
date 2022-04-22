<?php

use App\Models\Student;
use Illuminate\Http\Request;
use App\Mail\TicketRefundedEmail;
use Illuminate\Support\Facades\Mail;
use App\Mail\TicketConfirmationEmail;
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

Route::get('/tickets/secret', function () {
    return view('tickets_secret');
})->middleware('auth.basic');

Route::get('/tickets/success', function (Request $request) {
    $orderId = $request->get('orderId');

    $student = Student::with('guest')->where('id', 'like', $orderId . '-%')->firstOrFail();

    Mail::to($student->email)->send(new TicketConfirmationEmail($student));

    return view('tickets.success', ['student' => $student]);
})->name('tickets.success');

Route::get('/tickets/pickup', function () {
    return view('ticket_pickup');
})->middleware('auth.basic');


Route::get('/report', function () {
    $students = Student::with('guest')->orderBy('last_name')->get();
    $fileName = 'students.csv';
    $headers = array(
        "Content-type"        => "text/csv",
        "Content-Disposition" => "attachment; filename=$fileName",
        "Pragma"              => "no-cache",
        "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
        "Expires"             => "0"
    );
    $columns = array('Student First Name', 'Student Last Name', 'Student Phone Number', 'Guest First Name', 'Guest Last Name', 'Guest Phone Number', 'Payment Method');
    $callback = function() use($students, $columns) {
        $file = fopen('php://output', 'w');
        fputcsv($file, $columns);

        foreach ($students as $student) {
            fputcsv($file, [
            $student->first_name,
            $student->last_name,
            $student->phone,
            $student->guest?->first_name,
            $student->guest?->last_name,
            $student->guest?->phone,
            $student->payment_type,
            ]);
        }
        fclose($file);
    };
    return response()->stream($callback, 200, $headers);
})->middleware('auth.basic');
