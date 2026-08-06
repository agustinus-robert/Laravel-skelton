<?php

use Illuminate\Support\Facades\Route;

Route::middleware('web')
    ->prefix('account')
    ->as('account.')
    ->group(function () {

        Route::get('/account-test', function () {
            return 'Account Module';
        })->name('index');

    });