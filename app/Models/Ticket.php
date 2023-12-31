<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table="tickets";
    protected $fillable=[
        'from_user',
        'to_user',
        'status',
        'message'
    ];
}
