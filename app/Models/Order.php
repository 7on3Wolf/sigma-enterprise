<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'name',
        'address',
        'phone',
        'notes',
        'status',
        'progress_status', // Tambahkan kolom baru
        'order_date',
    ];


    // Relasi ke Service
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
