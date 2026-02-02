<?php

use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Karyawan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::controller(UserController::class)->group(function(){
    Route::get('/profil', 'profil')->name('profil');
    Route::patch('/profil', 'upload')->name('upload foto');
});

Route::controller(JabatanController::class)->group(function(){
    Route::get('/jabatan', 'tampil')->name('jabatan');
    Route::get('/jabatan/tambah', 'tambah')->name('tambah jabatan');
    Route::get('/jabatan/{jabatan}/edit', 'edit')->name('edit jabatan');
    Route::post('/jabatan', 'simpan')->name('simpan jabatan');
    Route::delete('jabatan/{jabatan}', 'hapus')->name('hapus jabatan');
    Route::put('/jabatan/{jabatan}', 'update')->name('update jabatan');
});

Route::resource('karyawan', KaryawanController::class);

Route::get('/test', function(){
    $respon = HTTP::get("https://dev.farizdotid.com/api/daerahindonesia/provinsi")['provinsi'];
    dd($respon);
});

Route::get('/gaji', function(){
    $karyawan = DB::table('karyawan')->where('user_id', auth()->user()->id)->first();
    $presensi = DB::table('presensi')->orderBy('tanggal')
                                    ->where('karyawan_id', $karyawan->id)
                                    ->where('bulan', '08')
                                    ->where('keterangan', 'masuk')
                                    ->get();
    $absen = $presensi->pluck('jam', 'tanggal');
    // dd($absen);
    return view('gaji.performa', ['absen' => $absen]);
});

Route::post('/gaji', function(){
    $tanggal = date('d');
    $bulan= date('m');
    $tahun = date('Y');
    $karyawan = Karyawan::where('nik', request('nik'))->select('id')->first();

    $jam = date('H.i');
    DB::table('presensi')->insert([
        'tanggal' => $tanggal,
        'bulan' => $bulan,
        'tahun' => $tahun,
        'karyawan_id' => $karyawan->id,
        'jam' => $jam,
        'keterangan' => request('keterangan'),
    ]);

    return redirect('/')->with('pesan', 'Berhasil Absen ');
});