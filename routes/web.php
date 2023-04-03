<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Mail\TicketConfirmationEmail;

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

Route::get('/test', function(Request $request) {
    $ticketId = $request->get('ticketId');
    $chargeInfo = null;

    $ticket = Ticket::with('attendee')->where('uuid', 'like', $ticketId . '-%')->firstOrFail();

    if($ticket->payment_id != null) {
        $stripe = new \Stripe\StripeClient(config('services.stripe.secret_key'));

        $chargeInfo = $stripe->charges->retrieve($ticket->payment_id);
    }
    if($request->get('sendTicket')){
        Mail::to('bretterer@gmail.com')->send(new TicketConfirmationEmail($ticket->attendee, $chargeInfo));
    }
    return new App\Mail\TicketConfirmationEmail($ticket->attendee, $chargeInfo);
});

Route::get('/tickets', function () {
    return view('tickets');
});

Route::get('/tickets/success', function (Request $request) {
    $ticketId = $request->get('ticketId');
    $chargeInfo = null;

    $ticket = Ticket::with('attendee')->where('uuid', 'like', $ticketId . '-%')->firstOrFail();

    if($ticket->payment_id != null) {
        $stripe = new \Stripe\StripeClient(config('services.stripe.secret_key'));

        $chargeInfo = $stripe->charges->retrieve($ticket->payment_id);
    }
    if($request->get('sendTicket')){
        Mail::to($ticket->attendee->email)->send(new TicketConfirmationEmail($ticket->attendee, $chargeInfo));
    }
    return view('tickets.success', ['attendee' => $ticket->attendee, 'paymentInfo' => $chargeInfo]);


})->name('tickets.success');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return redirect(route('attendees'));
    })->name('dashboard');

    Route::get('/attendees', function () {
        return view('admin.attendees');
    })->name('attendees');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])
->prefix('admin')
->group(function () {
    Route::get('/tickets', function () {
        return view('admin.tickets');
    })->name('tickets');
});
