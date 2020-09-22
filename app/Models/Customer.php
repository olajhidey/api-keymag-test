<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'phone', 'email', 'address', 'uid'
    ];

    public function customeractivities()
    {
        return $this->hasMany('App\Models\CustomerActivity', 'foreign_key', 'local_key');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'foreign_key', 'other_key');
    }
}
