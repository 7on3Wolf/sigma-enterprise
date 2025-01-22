<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\ContactComplaint;

class PageController extends Controller
{
    // Home page
    public function index()
    {
        // Ambil 6 layanan secara acak
        $services = Service::inRandomOrder()->take(8)->get();

        // Kirimkan data layanan ke view
        return view('home', compact('services'));
    }

    // About page
    public function about()
    {
        return view('about');
    }

    // Services page
    public function services()
    {
        // Mengambil semua layanan dengan relasi kategori, diurutkan berdasarkan category_id
        $services = Service::with('category')->orderBy('category_id')->get();

        // Mengelompokkan layanan berdasarkan category_id
        $groupedServices = $services->groupBy('category_id');

        return view('services', compact('groupedServices'));
    }


    // Menampilkan detail layanan berdasarkan ID
    public function show($id)
    {
        $service = Service::findOrFail($id); // Cari layanan berdasarkan ID
        return view('service-detail', compact('service'));
    }

    // Halaman detail layanan (duplikat dari metode 'show', tetap dipertahankan sesuai permintaan)
    public function serviceDetail($id)
    {
        $service = Service::findOrFail($id); // Cari layanan berdasarkan ID
        return view('service-detail', compact('service'));
    }

    // Menampilkan halaman formulir pemesanan
    public function order()
    {
        $services = Service::all(); // Ambil semua layanan
        return view('order', compact('services'));
    }

    // Fungsi untuk menyimpan pesanan
    public function storeOrder(Request $request)
    {
        // Validasi data
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'notes' => 'nullable|string',
        ]);

        $validated['order_date'] = now(); // Isi tanggal pesanan secara otomatis

        // Simpan data ke tabel orders
        Order::create([
            'service_id' => $request->service_id,
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'notes' => $request->notes,
            'user_id' => auth()->id(),
        ]);

        // Redirect ke halaman services dengan pesan sukses
        return redirect()->route('services')->with('success', 'Pesanan Anda sukses! Kami akan segera menghubungi Anda lewat WhatsApp. Terima kasih sudah mempercayakan layanan kami!');
    }

    // Menampilkan daftar pesanan di halaman admin
    // public function showOrders()
    // {
    //     $orders = Order::with('service')->get(); // Ambil semua pesanan beserta data layanan
    //     return view('admin.orders', compact('orders'));
    // }

    // Partners page
    public function partners()
    {
        return view('partners');
    }

    // Menampilkan form pengaduan
    public function contact()
    {
        return view('contact');
    }

    // Menyimpan pengaduan ke database
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:50',
            'phone' => 'required|string|max:15',
            'message' => 'required|string',
        ]);

        // Simpan pengaduan ke database
        ContactComplaint::create($validated);

        // Flash message success
        return redirect()->back()->with('success', 'Pesan Anda telah berhasil dikirim! Kami akan segera menghubungi Anda.');
    }
}