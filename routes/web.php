<?php

use App\Http\Controllers\AduanController;
use App\Http\Controllers\BarangPakaiAduanController;
use App\Http\Controllers\BarangPakaiPermintaanController;
use App\Http\Controllers\DescAduanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\JenisBarangController;
use App\Http\Controllers\PermintaanController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SperpatController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\UserRoleController;
use App\Models\Aduan;
use Illuminate\Support\Facades\Auth;
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

// halaman awal
Route::get('/', function () {
    return view('welcome');
});
// Route::get('/',[HomeController::class,'index'])->name('home');

Auth::routes();

// halaman view
Route::get('/dashboard', function () {
    return view('views.dashboard');
});
Route::get('/aduan/search/{no_aduan}',[AduanController::class,'search']);
Route::get('/aduan/print/{no_aduan}',[AduanController::class,'print']);

Route::post('/aduan/store', [AduanController::class, 'store']);
Route::get('/view/aduan', [AduanController::class, 'viewAduan'])->name('viewAduan');
Route::get('/view/permintaan', [PermintaanController::class, 'viewPermintaan']);
Route::get('/aduan/add', [AduanController::class, 'add'])->name('aduanAdd');
Route::post('/desc-aduan/store', [DescAduanController::class, 'store']);
Route::get('/desc-aduan/get/{no_aduan}', [DescAduanController::class, 'get']);



Route::group(['middleware' => 'auth'], function () {
    // halaman view
    Route::get('/home', [HomeController::class, 'index']);
    Route::get('/aduan/view', [AduanController::class, 'view'])->name('aduan');
    Route::get('/permintaan/view', [PermintaanController::class, 'view']);
    Route::get('/aduan/report', [AduanController::class, 'view']);
    Route::get('/permintaan/report', [PermintaanController::class, 'view']);

    Route::get('/status/view', [StatusController::class, 'view'])->name('status');
    Route::get('/sperpat/view', [SperpatController::class, 'view'])->name('sperpat');
    Route::get('/inventaris/view', [InventarisController::class, 'view'])->name('inventaris');
    Route::get('/jenis-barang/view', [JenisBarangController::class, 'view'])->name('jenis-barang');
    Route::get('/user-role/view', [UserRoleController::class, 'view'])->name('user-role');
    Route::get('/role/view', [RoleController::class, 'view'])->name('role');
    Route::get('/permission/view', [PermissionController::class, 'view'])->name('permission');

    //user-management
    Route::group(['prefix'=>'userroles'],function(){
        Route::get('/', [UserRoleController::class,'index']);
        Route::get('/{id}', [UserRoleController::class,'getById']);
        Route::post('/', [UserRoleController::class,'store']);
        Route::patch('/update', [UserRoleController::class,'update']);
    });
    Route::group(['prefix'=>'role'],function(){
        Route::get('/', [RoleController::class,'get']);
        Route::get('/getById/{id}', [RoleController::class,'getById']);
        Route::post('/store', [RoleController::class,'store']);
        Route::patch('/update/{id}', [RoleController::class,'update']);
        Route::delete('/delete/{id}', [RoleController::class,'delete']);
    });
    Route::group(['prefix'=>'permissions'],function(){
        Route::get('/', [PermissionController::class,'get']);
        Route::get('/index', [PermissionController::class,'index']);
        Route::get('/getById/{id}', [PermissionController::class,'getById']);
        Route::post('/store', [PermissionController::class,'store']);
        Route::delete('/delete/{id}', [PermissionController::class,'destroy']);
        Route::get('/update/{id}', [PermissionController::class,'update']);
    });

    // Route Aduan
    Route::group(['prefix' => 'aduan'], function () {
        Route::get('/', [AduanController::class, 'index']);
        Route::get('/getById/{id}', [AduanController::class, 'getById']);
        // Route::post('/store', [AduanController::class, 'store']);
        Route::get('/updateView/{id}', [AduanController::class, 'updateView']);
        Route::post('/update/{id}', [AduanController::class, 'update']);
        Route::post('/tindakLanjut/{id}', [AduanController::class, 'tindakLanjut']);
        Route::get('/delete/{id}', [AduanController::class, 'destroy']);
    });
    Route::group(['prefix' => 'desc-aduan'], function () {
        Route::get('/', [DescAduanController::class, 'index']);
        Route::get('/getById/{id}', [DescAduanController::class, 'getById']);
        
        Route::post('/update/{id}', [DescAduanController::class, 'update']);
        Route::get('/delete/{id}', [DescAduanController::class, 'destroy']);
    });

    Route::group(['prefix' => 'permintaan'], function () {
        Route::get('/', [PermintaanController::class, 'index']);
        Route::get('/getById/{id}', [PermintaanController::class, 'getById']);
        // Route::post('/store', [PermintaanController::class, 'store']);
        Route::post('/update/{id}', [PermintaanController::class, 'update']);
        Route::get('/delete/{id}', [PermintaanController::class, 'destroy']);
    });

    Route::group(['prefix' => 'barang_pakai/aduan'], function () {
        Route::get('/', [BarangPakaiAduanController::class, 'index']);
        Route::get('/getById/{id}', [BarangPakaiAduanController::class, 'getById']);
        Route::post('/store', [BarangPakaiAduanController::class, 'store']);
        Route::post('/update/{id}', [BarangPakaiAduanController::class, 'update']);
        Route::get('/delete/{id}', [BarangPakaiAduanController::class, 'destroy']);
    });

    Route::group(['prefix' => 'barang_pakai/permintaan'], function () {
        Route::get('/', [BarangPakaiPermintaanController::class, 'index']);
        Route::get('/getById/{id}', [BarangPakaiPermintaanController::class, 'getById']);
        Route::post('/store', [BarangPakaiPermintaanController::class, 'store']);
        Route::post('/update/{id}', [BarangPakaiPermintaanController::class, 'update']);
        Route::get('/delete/{id}', [BarangPakaiPermintaanController::class, 'destroy']);
    });

    Route::group(['prefix' => 'inventaris'], function () {
        Route::get('/', [InventarisController::class, 'index']);
        Route::get('/getById/{id}', [InventarisController::class, 'getById']);
        Route::post('/store', [InventarisController::class, 'store']);
        Route::post('/update/{id}', [InventarisController::class, 'update']);
        Route::get('/delete/{id}', [InventarisController::class, 'destroy']);
    });

    Route::group(['prefix' => 'jenis-barang'], function () {
        Route::get('/', [JenisBarangController::class, 'index']);
        Route::get('/getById/{id}', [JenisBarangController::class, 'getById']);
        Route::post('/store', [JenisBarangController::class, 'store']);
        Route::post('/update/{id}', [JenisBarangController::class, 'update']);
        Route::get('/delete/{id}', [JenisBarangController::class, 'destroy']);
    });

    Route::group(['prefix' => 'sperpat'], function () {
        Route::get('/', [SperpatController::class, 'index']);
        Route::get('/getById/{id}', [SperpatController::class, 'getById']);
        Route::post('/store', [SperpatController::class, 'store']);
        Route::post('/update/{id}', [SperpatController::class, 'update']);
        Route::get('/delete/{id}', [SperpatController::class, 'destroy']);
    });

    Route::group(['prefix' => 'status'], function () {
        Route::get('/', [StatusController::class, 'index']);
        Route::get('/getById/{id}', [StatusController::class, 'getById']);
        Route::post('/store', [StatusController::class, 'store']);
        Route::post('/update/{id}', [StatusController::class, 'update']);
        Route::get('/delete/{id}', [StatusController::class, 'destroy']);
    });
});
