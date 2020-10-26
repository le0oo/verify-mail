<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Exports\MailsExport;
use App\Http\Controllers\TableMailController;
use App\Http\Livewire\Mail;


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
    return view('auth.login');
});


Route::get('/verify/mail/{hash}', [MailController::class, 'confirmarMail']);

Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    
    /* Mail Table */
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    /* Mail Table */
    Route::get('/mail/mailtable', [TableMailController::class, 'index'])->name('mail.table');

    Route::get('/mail/export', function(){
        return Excel::download(new MailsExport, 'mails.xlsx');
    })->name('mail.export');

});

