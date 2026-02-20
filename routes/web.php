<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\AdminController;



Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('guest')->group(function () {
  Route::get('/register', [RegisterController::class, 'register'])->name('register');
  Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
  Route::get('/login', [LoginController::class, 'login'])->name('login');
  Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
});

Route::middleware('auth')->group(function () {
  Route::get('/notifications/{id}/read', function ($id) {
    $notification = auth()->user()->notifications()->findOrFail($id);
    $notification->markAsRead();

    return redirect($notification->data['url'] ?? route('dashboard'));
  })->name('notifications.read');

  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
  Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

  Route::get('/bookmarks', [BookmarkController::class, 'index'])->name('bookmarks.index');
  Route::post('/bookmarks/{job}', [BookmarkController::class, 'store'])->name('bookmarks.store');
  Route::delete('/bookmarks/{job}', [BookmarkController::class, 'destroy'])->name('bookmarks.destroy');

  Route::middleware('role:employer')->group(function () {
    Route::get('/jobs/create', [JobController::class, 'create'])->name('jobs.create');
    Route::post('/jobs', [JobController::class, 'store'])->name('jobs.store');
    Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->name('jobs.edit');
    Route::put('/jobs/{job}', [JobController::class, 'update'])->name('jobs.update');
    Route::delete('/jobs/{job}', [JobController::class, 'destroy'])->name('jobs.destroy');
    Route::get('/employer/dashboard', [DashboardController::class, 'employer'])->name('employer.dashboard');
    Route::get('/jobs/{job}', [JobController::class, 'show'])->name('jobs.show');
    Route::patch('/applicants/{applicant}/status',[ApplicantController::class, 'updateStatus'])->name('applicant.status.update');
    Route::delete('/applicants/{applicant}', [ApplicantController::class, 'destroy'])->name('applicant.destroy');
  });

  Route::middleware('role:user')->group(function () {
    Route::post('/jobs/{job}/apply', [ApplicantController::class, 'store'])->name('applicant.store');
  });

});

Route::middleware(['auth', 'role:admin'])->group(function () {
  Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
  Route::get('/admin/users/{user}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit');
  Route::put('/admin/users/{user}', [AdminController::class, 'updateUser'])->name('admin.users.update');
  Route::delete('/admin/users/{user}', [AdminController::class, 'deleteUser'])->name('admin.users.delete');
  Route::patch('/admin/jobs/{job}/reject', [AdminController::class, 'rejectJob'])->name('admin.jobs.reject');
  Route::get('/admin/jobs/{job}', [AdminController::class, 'showJob'])->name('admin.jobs.show');
  Route::put('/admin/jobs/{job}/status', [AdminController::class, 'updateStatus'])->name('admin.jobs.status');
});


Route::get('/jobs/search', [JobController::class, 'search'])->name('jobs.search');
Route::resource('jobs', JobController::class)->only(['index', 'show']);
Route::get('/employers/{user}', [EmployerController::class, 'show'])->name('employers.show');
