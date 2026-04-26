<?php

use Illuminate\Support\Facades\Route;
use League\CommonMark\Extension\CommonMark\Node\Inline\Strong;

//http://belajarlaravel2.test/halo
Route::get('/halo', function () {
    return "Halo, Selamat datang di Loris Laravel";
});
//http://belajarlaravel2.test/halo/lori
Route::get('/abouth', function () {
    return "Ini adalah halaman About Lori";
});
//post nuntuk mengirim data
Route::post('/kirim', function () {
    return "Data Lori berhasil dikirim";
});
//put untuk memperbaharui data
Route::put('/update', function () {
    return "Data Lori berhasil diperbaharui!";
});
//delete untuk menghapus data
Route::delete('/hapus', function () {
    return "Data Lori berhasil dihapus";
});
//route dengan parameter
Route::get('/dashbord', function () {
    echo "Lori Selamat Belajar Laravel";
});
//route dengan parameter id
Route::get("/profile", function () {
   $user = [
    "name" => "Lori Febriady", 
    "pekerjaan" => "Mahasiswa", 
    "alamat" => "Praya"
    ];
    return response ()->json($user);
});
//route dengan controller
Route::get("/home", [App\Http\Controllers\HomeController::class,"index"])->name('home');

//route untuk redirect
Route::get("/redirect", function () {
    return redirect("/home");
});
//route untuk menampilkan views blade
Route::get('/welcome', function () {
    return view('welcome');
});
//route untuk menampilkan data JSON
Route::get("/profil", function () {
    return response ()->json([
        "name" => "Lori Febriady", 
        "pekerjaan" => "PNS", 
        "hoby"=> "Ngelamang"
    ]); 
});
//route dengan controller
Route::get('/tentang', [App\Http\Controllers\PageController::class,"about"]);
//route dengan parameter id
Route::get('/usert/{id}', function ($id) {
    return 'Ini adalah Halaman dengan User Id: ' . $id;
});
//route dengan kategori dan id
Route::get('/produk/{kategori}/{id}', function ($kategori, $id) {
    return 'Halaman Kategori: ' . $kategori . ' Dengan Nomer Id: ' . $id;
});
//route dengan parameter nama dan apabila tidak diisi maka akan menampilkan default Lori
Route::get('userk/{name?}', function ($name = "Guest") {
    return 'Selamat Datang: ' . $name;
});
//menampilkan halaman order dengan id angka saja
Route::get('/order/{id}', function ($id) {
    return 'Order Id: ' . $id;
})->where('id', '[0-9]+');
//menampilkan halaman slug dengan
Route::get('/blog/{slug}', function ($slug) {
    return 'Judul Artikel: ' . $slug;
})->where('slug', '[A-Za-z0-9-]+');
//jika id tidak dditulis maka akan menangpilkan defauld Guest
Route::get('/customer/{id?}', function ($id = 'Guest') {
    return ('Customer Id: ' . $id);
});
//menggunakan user id angka saja
Route::get('/invoice/{id}', function ($id) {
    return 'Menampilkan info invoice dengan nomer: ' . $id;
})->where('id', '[0-9]+');
//membatasi user id dengan 2 huruf (besar/kecil) pertama dan 2 angka terakhir
Route::get('userm/{id}', function ($id) {
    return 'User yang benar adalah 2 huruf(besar/kecil) 3 angka: ' . $id;
})->where('id', '[a-zA-Z]{2}[0-9]{3}');
//route grouping prefix
Route::group(['prefix' => 'admin'], function () {
    Route::get('/dashboard', function () {
        return 'Ini Halaman Dashboard Admin';
    });
    Route::get('/user', function () {
        return 'Daftar Pengguna';
    });
});
//menggunakan middleware dalam route group
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return 'Dashboard untuk user yang sudah login';
    });
    Route::get('/profile', function () {
        return 'Halaman Profil pengguna';
    });
});
//mengelompokkan route berdasarkan namespace dan controller
Route::namespace('App\Http\Controllers\Admin')->group(function () {
    Route::get('/dashboard', 'DashboardController@index');
    Route::get('/users', 'UserController@index');
});

//route dengan name()untuk memberikan nama pada route
Route::name('admin.')->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    Route::get('/user', function () {
        return view('admin.user');
    })->name('user');
});

Route::get('/redirect-home', function () {
    return redirect()->route('home');
});
//tugas praktik hal 48
//route /profile/{id}
// Profile (kirim data ke blade)
Route::get('/profileku/{id}', function ($id) {
    return view('profileku', ['id' => $id]);
})->name('profile.show');

// Dashboard
Route::get('/dashboardku', function () {
    return view('dashboardku');
})->name('dashboard');

// Redirect
Route::get('/old-dashboardku', function () {
    return redirect()->route('dashboard');
});

Route::resource('posts', App\Http\Controllers\PostController::class);

Route::middleware(['auth'])->prefix('admin')->group(function () {
        Route::resource('posts', PostController::class);
    });

    Route::get('/latihan', function () {
        $nama = "Lori Febriady";
        $nilai = 95;
        return view('latihan', compact('nama', 'nilai'));
    });



    
