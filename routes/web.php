<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Models\Order;

// Home Route
Route::get('/', [PageController::class, 'index'])->name('home');

// Other Pages
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/services/{id}', [PageController::class, 'show'])->name('services.show');

// Order Routes
Route::get('/order', [PageController::class, 'order'])->name('order');
Route::post('/order', [PageController::class, 'storeOrder'])->name('order.store');

// Admin Routes
Route::get('/admin/orders', [PageController::class, 'showOrders'])->name('admin.orders.index');

// Additional Pages
Route::get('/partners', [PageController::class, 'partners'])->name('partners');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');


// Rute untuk halaman login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');

// Rute untuk logout
// Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
});

// Pastikan Anda memiliki route untuk admin dashboard
Route::middleware(['auth', 'isAdmin'])->get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::get('/service', [AdminController::class, 'service'])->name('admin.service');
Route::get('/admin/categories', [AdminController::class, 'categories'])->name('admin.categories');

// Rute untuk menampilkan layanan
// Route::get('/admin/services', [AdminController::class, 'services'])->name('admin.services');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/categories', [AdminController::class, 'categories'])->name('categories'); // List kategori
    Route::get('/categories/create', [AdminController::class, 'create'])->name('categories.create'); // Halaman tambah kategori
    Route::post('/categories', [AdminController::class, 'store'])->name('categories.store'); // Simpan kategori baru
    Route::get('/categories/{id}/edit', [AdminController::class, 'edit'])->name('categories.edit'); // Halaman edit kategori
    Route::put('/categories/{id}', [AdminController::class, 'update'])->name('categories.update'); // Update kategori
    Route::delete('/categories/{id}', [AdminController::class, 'destroy'])->name('categories.destroy'); // Hapus kategori
});


// Rute untuk menambahkan layanan baru
Route::get('/admin/services/create', [AdminController::class, 'createService'])->name('admin.service.create');
Route::post('/admin/services', [AdminController::class, 'storeService'])->name('admin.service.store');

// Rute untuk mengedit layanan
Route::get('/admin/services/{id}/edit', [AdminController::class, 'editService'])->name('admin.service.edit');
Route::put('/admin/services/{id}', [AdminController::class, 'updateService'])->name('admin.service.update');

// Rute untuk menghapus layanan
Route::delete('/admin/services/{id}', [AdminController::class, 'deleteService'])->name('admin.service.delete');

// Route untuk admin orders
Route::get('/admin/orders', [AdminController::class, 'orders'])->name('admin.orders');

Route::put('/admin/orders/{id}/accept', [AdminController::class, 'acceptOrder'])->name('admin.orders.accept');
Route::put('/admin/orders/{id}/reject', [AdminController::class, 'rejectOrder'])->name('admin.orders.reject');

Route::get('/admin/accepted-orders', [AdminController::class, 'acceptedOrders'])->name('admin.accepted-orders');
Route::post('/admin/accepted-orders/{id}/complete', [AdminController::class, 'markAsCompleted'])->name('admin.orders.complete');

Route::get('/admin/completed-orders', [AdminController::class, 'completedOrders'])->name('admin.completed-orders');

Route::post('/admin/orders/complete/{id}', [AdminController::class, 'markAsComplete'])->name('admin.orders.complete');

Route::get('/admin/completed-orders', [AdminController::class, 'completedOrders'])->name('admin.completed-orders');

Route::get('/admin/completed-orders/{order}/receipt', [AdminController::class, 'generateReceipt'])->name('admin.generateReceipt');
Route::post('/order/{order}/send-receipt-whatsapp', [AdminController::class, 'sendReceiptViaWhatsApp'])->name('order.sendReceiptViaWhatsApp');
Route::get('/orders/{id}/send-receipt-whatsapp', [AdminController::class, 'sendReceiptViaWhatsApp'])->name('order.sendReceiptViaWhatsApp');

Route::get('/admin/failed-orders', [AdminController::class, 'failedOrders'])->name('admin.failedOrders');

Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'store']);