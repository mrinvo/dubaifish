<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\AdController;

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

Route::get('/', function () {
    return redirect()->route('dashboard');
})->middleware('admin');

  Route::get('/dashboard/home', function () {
      return view('admin.index');
 })->middleware(['admin'])->name('dashboard');



Route::prefix('/dashboard')->name('admin.')->group(function (){


    Route::middleware('admin')->group(function () {

        Route::get('/logout',[AdController::class,'destroy'])->name('logout');
        Route::get('/profile',[AdController::class,'profile'])->name('profile');
        Route::get('/edit-profile',[AdController::class,'edit_profile'])->name('profile.edit');
        Route::post('/update-profile',[AdController::class,'update_profile'])->name('profile.update');
        Route::get('/change-password',[AdController::class,'change_password'])->name('password.change');
        Route::post('/update-password',[AdController::class,'update_password'])->name('password.update');
        Route::get('/gov' , [AdController::class,'gov'])->name('gov');
        Route::get('/person' , [AdController::class,'person'])->name('person');
        Route::get('/com' , [AdController::class,'com'])->name('com');
        Route::get('/bank' , [AdController::class,'bank'])->name('bank');
        Route::get('delete/{id}',[AdController::class,'delete'])->name('delete');
        Route::get('/adduser',[AdController::class,'adduser'])->name('adduser');
        Route::post('/storeuser',[AdController::class,'storeuser'])->name('storeuser');
        Route::get('/edituser/{id}',[AdController::class,'edituser'])->name('edituser');
        Route::post('updateuser',[AdController::class,'updateuser'])->name('updateuser');


    });
    require __DIR__.'/admin_auth.php';

});


//  require __DIR__.'/auth.php';
