<?php

use App\Http\Controllers\LinkController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return to_route('links.index');
});

Route::resource('links', LinkController::class)->except(['create', 'edit', 'destroy']);
