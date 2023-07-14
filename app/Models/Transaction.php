<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transaction';

    protected $fillable = [
        'total_price',
        'startdate',
        'enddate',
        'status',
        'cardname',
        'cardnumber',
        'cardexp',
        'cardcvv',
        'cardtype',
        'properties_id',
        'users_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function properties()
    {
        return $this->belongsTo(Properties::class, 'properties_id');
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
