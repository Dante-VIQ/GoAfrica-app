<?php


use App\Livewire\AboutCard;
use App\Livewire\AnalysisDashboard;
use Illuminate\Support\Facades\Route;


Route::get('/Analysis', AnalysisDashboard::class);

// // Show Edit Form
Route::get('/abouts/{about}/edit', [AboutCard::class, 'edit']);

// // Update blog
Route::put('/abouts/{about}', [AboutCard::class, 'update']);
