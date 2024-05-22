<?php

use App\Http\Controllers\DeviceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SaklarController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

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


Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('dashboard');
    Route::get('/dokumentasi', 'dokumentasi')->name('dokumentasi');
});
Route::controller(UserController::class)->group(function () {
    Route::get('/user', 'index')->name('user');
});
Route::controller(DeviceController::class)->group(function () {
    Route::get('/device', 'index')->name('device');
});
Route::controller(SaklarController::class)->group(function () {
    Route::get('/saklar', 'index')->name('saklar');
    Route::get('/custom/{code}', 'custom')->name('custom');
});
Route::controller(AuthController::class)->group(function () {
    Route::get('/', 'index')->name('login');
});

Route::get("belajar-database",function(){
    // $users = DB::table('users')

    // ->select('id', 'name', 'email')
    // ->where('name', '=', 'Arkatama')
    // ->get();
    // echo '<table border="1">';
    // echo '<thead>';
    // echo '<tr>';
    // echo '<th>No</th>';
    // echo '<th>ID</th>';
    // echo '<th>Name</th>';
    // echo '<th>Email</th>';
    // echo '</tr>';
    // echo '</thead>';
    // echo '<tbody>';
    // foreach ($users as $i => $user) {
    //     echo '<tr>';
    //     echo '<td>' . $i + 1 . '</td>';
    //     echo '<td>' . $user->id . '</td>';
    //     echo '<td>' . $user->name . '</td>';
    //     echo '<td>' . $user->email . '</td>';
    //     echo '</tr>';
    // }
    // echo '</tbody>';
    // echo '</table>';

    $users = DB::table('users')->get();
    echo '<table border="1">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>No</th>';
    echo '<th>ID</th>';
    echo '<th>Name</th>';
    echo '<th>Email</th>';
    echo '<th>password</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    foreach ($users as $i => $user) {
        echo '<tr>';
        echo '<td>' . $i + 1 . '</td>';
        echo '<td>' . $user->id . '</td>';
        echo '<td>' . $user->name . '</td>';
        echo '<td>' . $user->email . '</td>';
        echo '<td>' . $user->password . '</td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
});