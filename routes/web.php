<?php


use App\Livewire\AboutPage;
use App\Livewire\DoctorPage;
use App\Livewire\ContactPage;
use App\Livewire\ServiceList;
use App\Livewire\ServicePage;
use App\Livewire\AppontmentPage;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Livewire\BlogCard;
use App\Livewire\BlogPage;
use App\Livewire\CreateServiceBox;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/service', ServicePage::class);

Route::get('/destination', DoctorPage::class);

Route::get('/about', AboutPage::class);

Route::get('/appointment', AppontmentPage::class);

Route::get('/contact', ContactPage::class);

Route::get('/test-me', CreateServiceBox::class);

// Route::get('/blog-lay', function () {
//     return view('blog-lay');
// })->name('blog-lay');

// Route::get('/blogs/{blog}', BlogPage::class, 'show');
Route::get('/blogs/{blog}', BlogPage::class);
Route::post('/main', BlogCard::class);
Route::get('/blogs/{blog}', [BlogCard::class, 'show']);


// App\Models\Blog::create([10]);

// Route::get('/dashboard', function () {
//     return view('index');
// })->name('index');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});




// Route::get('admin/pages', function () {
//     return view('adminlte::page');
// });

// Route::get('admin/blog', function () {
//     return view('adminlte::page');
// });
