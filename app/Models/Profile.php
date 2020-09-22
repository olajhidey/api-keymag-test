<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_name', 'address', 'state', 'photoUrl', 'phone', 'office_phone', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'foreign_key', 'other_key');
    }
}
