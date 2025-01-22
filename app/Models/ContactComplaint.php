<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactComplaint extends Model
{
    use HasFactory;

    protected $table = 'contact_complaints';

    protected $fillable = [
        'name',
        'phone',
        'message',
    ];

    public $timestamps = true;
}