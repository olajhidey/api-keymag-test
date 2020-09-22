<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_of_service', 'type_of_key', 'name_of_key', 'key_owner', 'key_owner_phone', 'key_owner_email', 'key_owner_address', 'type_of_car', 'engine_no', 'vehicle_no', 'driver_license', 'reason', 'quantity', 'price', 'uid', 'customer_id'
    ];

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer', 'foreign_key', 'other_key');
    }
}
