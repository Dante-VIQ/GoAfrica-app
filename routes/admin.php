<?php


use App\Livewire\Adboard;
use App\Livewire\BlogCard;
use Illuminate\Support\Facades\Route;


Route::get('/admin', Adboard::class);

// // Show Edit Form
Route::get('/blogs/{blog}/edit', [BlogCard::class, 'edit']);

// // Update blog
Route::put('/blogs/{blog}', [BlogCard::class, 'update']);

// // Delete blog
Route::delete('/blogs/{blog}', [BlogCard::class, 'destroy']);

// // // Manage blog
Route::get('/Blog/manage', [BlogCard::class, 'manage']);
