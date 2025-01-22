<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Order;
use Symfony\Component\HttpFoundation\Response;

class NotificationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Menghitung jumlah pesanan berdasarkan status
        $newOrdersCount = Order::where('status', 'pending')->count(); // Pesanan baru
        $failedOrdersCount = Order::where('status', 'rejected')->count(); // Pesanan gagal
        $completedOrdersCount = Order::where('status', 'completed')->count(); // Pesanan selesai
        $acceptedOrdersCount = Order::where('status', 'accepted')->count(); // Pesanan diterima

        // Menambahkan variabel untuk tampilan (view) supaya bisa digunakan di blade
        view()->share([
            'newOrdersCount' => $newOrdersCount,
            'failedOrdersCount' => $failedOrdersCount,
            'completedOrdersCount' => $completedOrdersCount,
            'acceptedOrdersCount' => $acceptedOrdersCount,
        ]);

        return $next($request);
    }
}
