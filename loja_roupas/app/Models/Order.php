<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['client_id', 'total_amount', 'status'];

    protected $casts = ['total_amount' => 'decimal:2'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
