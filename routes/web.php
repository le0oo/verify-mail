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

Route::get('/', function (){

});

Route::get('/app/verifica', function () {
    return view('auth.login');
});

Route::get('/verify/mailmorecis/{hash}', [MailController::class, 'confirmarMail']);

Route::get('/verify/mail/{hash}', [MailController::class, 'confirmarMailsincis']);

Route::get('/verify/verifymail/{hash}', [MailController::class, 'confirmarFormRegMail']);

Route::get('/verify/mailsys/morecis/{user}/{pass}/{cis}/{varmail}/{hash}', [MailController::class, 'registerMail']);

Route::get('/verify/mailsys/{user}/{pass}/{varmail}/{hash}', [MailController::class, 'registerMailsincis']);

Route::get('/verify/registermail', function(){
    return view('mail.register-mail');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    
    /* Dashboard */
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    /* Inicio */
    Route::get('/inicio', function () {
        return view('inicio');
    })->name('inicio');

    /* Mail Table */
    Route::get('/mail/mailtable', [TableMailController::class, 'index'])->name('mail.table');

    // Route::get('/mail/export/excel/{vardatos}', function(){
    //     return Excel::download($vardatos, 'mails.xlsx');
    // })->name('mail.export.excel');

    // Route::get('/mail/export/csv', function(){
    //     return Excel::download(new MailsExport, 'mails.csv');
    // })->name('mail.export.csv');

});