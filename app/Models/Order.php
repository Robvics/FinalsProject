<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'address',
        'contact_number',
        'payment_mode',
        'total_amount'
    ];

    public function items()
{
    return $this->hasMany(OrderItem::class);
}

}
