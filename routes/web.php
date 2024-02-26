<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransectionController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

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

    // Artisan::call("migrate:fresh");
    // Artisan::call("db:seed");
    return redirect()->route("dashboard");
});

Route::middleware(["auth","verified"])->prefix("/dashboard")->group(function (){
    Route::get("/", function (){
        return redirect()->route("jobs.all");})->name("dashboard");
    Route::get("/jobs", [JobController::class,'index'])->name("jobs.all");
    Route::get("/job/history", [JobController::class,'history'])->name("jobs.history");
    Route::get("/job/yesterday", [JobController::class,'yesterday'])->name("jobs.yesterday");
    Route::get("/job/add", [JobController::class,'create'])->name("jobs.add");
    Route::get("/job/{customer}/add", [JobController::class,'store'])->name("job.step2");
    Route::post("/customer/add", [CustomerController::class,'store'])->name("customer.add");
    Route::post("/job/save", [JobController::class,'save'])->name("job.save");
    Route::get("/job/{job}/done",[JobController::class,'updateStatus'])->name("job.update.status");
    Route::get("/job/{job}/edit",[JobController::class,'edit'])->name("job.edit");
    Route::post("/job/{job}/edit",[JobController::class,'update'])->name("job.update");

    Route::get("/jobs/{id}/show", [JobController::class,'detail'])->name("job.detail");
    Route::get("/jobs/{job}/delete", [JobController::class,'destroy'])->name("job.delete");
    Route::get("/jobs/{job}/detail", [JobController::class,'job_detail'])->name("job.detail.open");
    Route::get("/customers",[CustomerController::class,"index"])->name("customer.all");
    Route::get("/ledger",[TransectionController::class,'index'])->name("transection.all");
    Route::get("/pdf/{job}",[TransectionController::class,'pdf'])->name("print.pdf");
    Route::post("/pay/{customer}/now",[TransectionController::class,'pay'])->name("udhar.pay");

});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/template.php';
