<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Service;
use App\Models\Category;
use Carbon\Carbon;
use Dompdf\Dompdf;


class AdminController extends Controller
{
    public function index()
    {
        // Ambil semua data pemesanan dari database
        $orders = Order::with('service')->get(); // Relasi dengan tabel jasa

        // Ambil pesanan yang baru masuk (misalnya yang statusnya 'new' atau 'pending')
        $newOrdersCount = Order::where('status', 'pending')->count(); // Sesuaikan status 'new' dengan status yang sesuai di tabel Anda

        // Kirim data ke view
        return view('admin.dashboard', compact('orders'));
    }


    public function categories()
    {
        // Ambil semua data kategori dari tabel categories
        $categories = Category::all();

        // Tampilkan view dengan data kategori
        return view('admin.categories', compact('categories'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.categories')->with('success', 'Category berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.categories')->with('success', 'Category berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.categories')->with('success', 'Category berhasil dihapus.');
    }



    // Tampilkan daftar service
    public function service()
    {
        $services = Service::with('category')->get();
        return view('admin.service', compact('services'));
    }

    // Menampilkan form untuk menambah service
    public function createService()
    {
        $categories = Category::all();
        return view('admin.create-service', compact('categories'));
    }

    // Menyimpan service baru
    public function storeService(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'icon' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $iconName = time() . '.' . $request->icon->extension();
        $request->icon->move(public_path('images'), $iconName);

        Service::create([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'icon' => $iconName,
        ]);

        return redirect()->route('admin.service')->with('success', 'Service berhasil ditambahkan');
    }

    // Menampilkan form untuk edit service
    public function editService($id)
    {
        $service = Service::findOrFail($id);
        $categories = Category::all();
        return view('admin.edit-service', compact('service', 'categories'));
    }

    // Menyimpan perubahan service
    public function updateService(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'icon' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $service->name = $request->name;
        $service->description = $request->description;
        $service->category_id = $request->category_id;

        if ($request->hasFile('icon')) {
            $iconName = time() . '.' . $request->icon->extension();
            $request->icon->move(public_path('images'), $iconName);
            $service->icon = $iconName;
        }

        $service->save();

        return redirect()->route('admin.service')->with('success', 'Service berhasil diperbarui');
    }

    // Menghapus service
    public function deleteService($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('admin.service')->with('success', 'Service berhasil dihapus');
    }


    public function orders()
    {
        // Ambil semua pesanan dengan relasi 'service'
        $orders = Order::with('service')->get();

        // Ambil pesanan baru
        $newOrdersCount = Order::where('status', 'pending')->count();

        // Kirim data pesanan dan jumlah pesanan baru ke view
        return view('admin.orders', compact('orders'));
    }



    public function acceptOrder(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'accepted';
        $order->save();

        // Mengambil nomor WhatsApp customer dari kolom 'phone'
        $customerPhone = $order->phone;

        // Ubah nomor telepon ke format internasional (Indonesia: +62)
        $customerPhone = ltrim($customerPhone, '0'); // Hapus angka '0' di awal
        $customerPhone = '62' . $customerPhone;

        // Mengambil nama layanan dari tabel services
        $serviceName = $order->service->name; // Pastikan relasi dengan tabel 'services' telah didefinisikan di model Order

        // Pesan WhatsApp dengan nama layanan
        $message = "Terima kasih telah memilih Sigma Enterprise. Kami dengan senang hati akan melayani kebutuhan Anda.\n\nPesanan Anda:\nLayanan: *$serviceName*.\n\nMohon hubungi kami untuk mengatur jadwal yang sesuai. Kami siap membantu Anda kapan saja!";
        $whatsappUrl = "https://wa.me/" . $customerPhone . "?text=" . urlencode($message);

        // Redirect ke WhatsApp customer
        return redirect()->away($whatsappUrl);
    }


    public function rejectOrder($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'rejected';
        $order->save();

        return redirect()->route('admin.orders')->with('success', 'Pesanan berhasil ditolak.');
    }

    // Menampilkan pesanan yang diterima
    public function acceptedOrders()
    {
        $orders = Order::where('status', 'accepted') // Pesanan yang diterima
            ->where('progress_status', 'on going') // Masih dalam proses
            ->get();

        return view('admin.accepted-orders', compact('orders'));
    }

    // Menandai pesanan sebagai selesai
    public function markAsComplete(Request $request, $id)
    {
        // Validasi input harga
        $request->validate([
            'price' => 'required|numeric|min:0',
        ]);

        // Cari pesanan berdasarkan ID
        $order = Order::findOrFail($id);

        // Update status menjadi 'completed' dan simpan harga
        $order->progress_status = 'completed';
        $order->price = $request->input('price');
        $order->save();

        // Redirect dengan pesan sukses
        return redirect()->route('admin.accepted-orders')->with('success', 'Pesanan berhasil diselesaikan.');
    }

    public function completedOrders()
    {
        // Ambil data pesanan yang sudah selesai (contoh: progress_status = 'completed')
        $orders = Order::where('progress_status', 'completed')->get();

        // Kirim data ke view
        return view('admin.completed-orders', compact('orders'));
    }

    public function generateReceipt($id)
    {
        // Cari pesanan berdasarkan ID
        $order = Order::findOrFail($id);

        // Format harga menjadi format yang mudah dibaca
        $formatted_price = number_format($order->price, 0, ',', '.');

        // Dapatkan tanggal pesanan dan konversi ke format yang diinginkan
        $order_date = Carbon::parse($order->order_date)->format('d-m-Y');

        // Buat PDF menggunakan DomPDF
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('admin.receipt', compact('order', 'formatted_price', 'order_date'))->render());
        $dompdf->setPaper('A4');
        $dompdf->render();

        // Simpan PDF di server
        $fileName = 'receipt-' . $order->id . '.pdf';
        $pdfFilePath = storage_path('app/public/' . $fileName);  // Menyimpan di storage/app/public

        // Pastikan folder public ada dan dapat ditulis
        if (!file_exists(storage_path('app/public'))) {
            mkdir(storage_path('app/public'), 0755, true);
        }

        // Menyimpan konten PDF ke dalam file
        $pdfContent = $dompdf->output();
        file_put_contents($pdfFilePath, $pdfContent);

        // Simpan nama file ke kolom receipt di tabel orders
        $order->receipt = $fileName; // Menyimpan nama file saja
        $order->save(); // Update data di database

        // Setelah menyimpan, pastikan file bisa diakses melalui URL publik
        // URL untuk akses file: public/storage/receipt-{order_id}.pdf
        $pdfUrl = url('storage/' . $fileName);

        // Kirimkan URL file ke WhatsApp atau media lain (misalnya, Twilio API)
        // $this->sendReceiptLinkViaWhatsApp($order, $pdfUrl);

        // Unduh file PDF secara langsung ke pengguna dan hapus setelah dikirim
        return response()->download($pdfFilePath)->deleteFileAfterSend(true);
    }


    public function sendReceiptViaWhatsApp($id)
    {
        // Cari pesanan berdasarkan ID
        $order = Order::findOrFail($id);

        // Periksa apakah nomor telepon pelanggan tersedia
        if (!$order->phone) {
            return redirect()->back()->with('error', 'Nomor telepon pelanggan tidak tersedia.');
        }

        // Format nomor telepon sesuai dengan standar internasional
        $customerPhone = $order->phone;
        if (strpos($customerPhone, '+62') !== 0) {
            $customerPhone = '+62' . ltrim($customerPhone, '0'); // Pastikan nomor pelanggan dalam format +62
        }

        // Buat pesan yang akan dikirim
        $message = 'Halo, terima kasih telah menggunakan layanan Sigma Enterprise. Berikut adalah detail pembayaran untuk pesanan Anda dengan nomor pesanan: ' . $order->id . '. Jika ada pertanyaan lebih lanjut, silakan hubungi kami. Kami siap membantu Anda!';

        // Link WhatsApp yang mengarah ke chat pelanggan
        $whatsappLink = 'https://wa.me/' . $customerPhone . '?text=' . urlencode($message);

        // Redirect ke link WhatsApp
        return redirect($whatsappLink);
    }

    // public function failedOrders()
    // {
    //     // Ambil data pesanan dengan status 'failed'
    //     $failedOrders = Order::where('status', 'rejected')->select('id', 'service_id', 'name', 'phone', 'notes', 'address', 'status')->get();

    //     return view('admin.failed-orders', compact('failedOrders'));
    // }

    public function failedOrders()
    {
        // Ambil data pesanan dengan status 'rejected' (gagal)
        $failedOrders = Order::where('status', 'rejected')
            ->select('id', 'service_id', 'name', 'phone', 'notes', 'address', 'status')
            ->get();

        // Hitung jumlah pesanan yang gagal
        $failedOrdersCount = $failedOrders->count();

        // Kirim data pesanan gagal dan jumlah pesanan gagal ke view
        return view('admin.failed-orders', compact('failedOrders', 'failedOrdersCount'));
    }






    // Halaman Pesanan Gagal
    // public function failedOrders()
    // {
    //     return view('admin.failed-orders'); // Mengarah ke file resources/views/admin/failed-orders.blade.php
    // }

    // Halaman Laporan
    public function reports()
    {
        return view('admin.reports'); // Mengarah ke file resources/views/admin/reports.blade.php
    }

    // Halaman Layout
    public function layout()
    {
        return view('admin.layout'); // Mengarah ke file resources/views/admin/layout.blade.php
    }
}
