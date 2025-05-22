<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
use Illuminate\Http\Request;

Route::post('/csp/report', function (Request $request) {
    \Log::channel('csp')->info('CSP Violation:', $request->json()->all());
    return response()->json(['status' => 'ok'], 200);
});