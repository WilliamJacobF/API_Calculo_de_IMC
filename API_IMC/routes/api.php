<?php

use App\Http\Controllers\ImcController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/calcular', [ImcController::class, 'calcularIMC']);
