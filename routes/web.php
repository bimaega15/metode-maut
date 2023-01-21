<?php

use App\Http\Controllers\Admin\AccessController;
use App\Http\Controllers\Admin\BobotUserController;
use App\Http\Controllers\Admin\DiagnosaController;
use App\Http\Controllers\Admin\GejalaController;
use App\Http\Controllers\Admin\HasilController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\KonfigurasiController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PenyakitController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\RuleController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Artisan;
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

Route::get('/clear', function () {
    Artisan::call('route:cache');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
});


Route::group(['middleware' => ['checkAlreadyLogin']], function () {
    Route::get('/', [LoginController::class, 'index']);
    Route::get('/login', [LoginController::class, 'index']);
    Route::get('/register', [RegisterController::class, 'index']);
    Route::post('/register/store', [RegisterController::class, 'store'])->name('register.store');
});

Route::group(['prefix' => 'admin/', 'as' => 'admin.', 'middleware' => ['checkNotLogin']], function () {
    Route::get('home', [HomeController::class, 'index'])->name('home.index');
    Route::resource('roles', RolesController::class);
    Route::resource('profile', ProfileController::class);
    Route::resource('users', UsersController::class);
    Route::resource('konfigurasi', KonfigurasiController::class);
    Route::resource('menu', MenuController::class)->except('show');
    Route::post('menu/{menu}/postSubMenu', [MenuController::class, 'postSubMenu'])->name('menu.postSubmenu');
    Route::get('menu/showMenu', [MenuController::class, 'showMenu'])->name('menu.showMenu');
    Route::resource('gejala', GejalaController::class)->except('show');
    Route::resource('penyakit', PenyakitController::class)->except('show');
    Route::resource('bobotUser', BobotUserController::class)->except('show');
    Route::resource('rule', RuleController::class)->except(['show']);
    Route::post('rule/saveSession', [RuleController::class, 'saveSession'])->name('rule.saveSession');
    Route::post('rule/storeSession', [RuleController::class, 'storeSession'])->name('rule.storeSession');
    Route::post('rule/destroySession', [RuleController::class, 'destroySession'])->name('rule.destroySession');
    Route::get('rule/gejala', [RuleController::class, 'gejala'])->name('rule.gejala');
    Route::resource('access', AccessController::class)->except('show');
    Route::get('access/managementMenu', [AccessController::class, 'managementMenu'])->name('access.managementMenu');
    Route::get('access/managementMenuById', [AccessController::class, 'managementMenuById'])->name('access.managementMenuById');
    Route::post('access/updateAccess', [AccessController::class, 'updateAccess'])->name('access.updateAccess');
    Route::resource('diagnosa', DiagnosaController::class)->except('show');
    Route::get('diagnosa/selectGejalaPenyakit', [DiagnosaController::class, 'selectGejalaPenyakit'])->name('diagnosa.selectGejalaPenyakit');
    Route::post('diagnosa/konsultasiGejala', [DiagnosaController::class, 'konsultasiGejala'])->name('diagnosa.konsultasiGejala');

    Route::get('hasil', [HasilController::class, 'index'])->name('hasil.index');
    Route::get('hasil/{hasil}/detail', [HasilController::class, 'show'])->name('hasil.show');
    Route::delete('hasil/{hasil}/destroy', [HasilController::class, 'destroy'])->name('hasil.destroy');
});
