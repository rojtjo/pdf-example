<?php

use App\Pdf\WelcomePdf;
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

$pdf = new WelcomePdf('Hello');

Route::get('/', fn () => $pdf);
Route::get('html', fn () => $pdf->toHtml());
